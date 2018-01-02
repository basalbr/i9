@extends('central_cliente.layouts.master')
@extends('central_cliente.imposto_renda.menu')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{url(public_path().'css/bootstrap-datepicker3.min.css')}}"/>
@stop
@section('js')
    @parent
    <script type="text/javascript" src="{{url(public_path().'js/mask.js')}}"></script>
    <script type="text/javascript" src="{{url(public_path().'js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{url(public_path().'js/bootstrap-datepicker.pt-BR.min.js')}}"></script>

    <script type="text/javascript">
        var dependenteIndex = 0;
        var documentoIndex = 0;
        var replaceable = null;

        function setEvents() {
            $('#alerta-modal').modal('show');
            $('.money-mask').mask("#.##0,00", {reverse: true});
            $('[name=data_nascimento]').mask("00/00/0000", {placeholder: '__/__/____'});
            $('[name=data_nascimento]').datepicker({
                language: 'pt-BR',
                autoclose: true,
                format: 'dd/mm/yyyy',
                todayBtn: 'linked'
            });
            $('form').on('click', 'button.upload-button', function (e) {
                replaceable = $(this);
                e.preventDefault();
                $(this).next('input[type="file"]').click();
                console.log($(this).next('input[type="file"]'))
            });
            $('#imposto-renda-form input.auto-load-file[type=file]').change(function () {
                uploadFile($(this));
                $(this).val(null);
            });
            $('#send-documentos').on('click', function (e) {
                e.preventDefault();
                sendDocumentos();
            });
            $('#dependente-form input.auto-load-file[type=file]').change(function () {
                var fileName = 'dependente[' + dependenteIndex + '][' + $(this).attr('name') + ']';
                uploadFile($(this), fileName, 'dependente');
                $(this).val(null);
            });
            $('#add-dependente').click(function (e) {
                e.preventDefault();
                addDependente();
            });
            $('input[name="fez_declaracao"]').on('click', function () {
                changeHasDeclaracaoAnoAnterior($(this));
            });
            $('#show-dependente-modal').on('click', function () {
                showAddDependenteModal();
            });

            $('#close-erro-modal').on('click', function () {
                closeErroModal();
            });

            $('.lista-dependentes').on('click', '.remove-dependente', function (e) {
                e.preventDefault();
                removeDependente($(this).parent().parent(), $(this).data('dependente'));
            });

            $('#imposto-renda-form .table').on('click', '.remove-documento', function (e) {
                e.preventDefault();
                removeDocumento($(this), 'contribuinte');
            });

            $('#dependente-form .table').on('click', '.remove-documento', function (e) {
                e.preventDefault();
                removeDocumento($(this), 'dependente');
            });

            $('#imposto-renda-form').on('change', 'input.anexar[type=file]', function (e) {
                e.preventDefault();
                addDocumento($(this).prev('button').data('tipo'));
            });
            $('#dependente-form').on('change', 'input.anexar[type=file]', function (e) {
                e.preventDefault();
                addDocumento($(this).prev('button').data('tipo'), 'dependente');
            });

            $('#imposto-renda-form').on('click', 'button.anexar', function (e) {
                e.preventDefault();
                addDocumento($(this).data('tipo'));
            });
            $('#dependente-modal').on('hidden.bs.modal', function () {
                clearDependenteForm();
            })
        }

        function clearDependenteForm() {
            $('#dependente-form')[0].reset();
            $('.replaceable').replaceWith('<button class="btn btn-primary upload-button"><span class="fa fa-upload"></span> Enviar Documento</button>');
            $('#dependente-form tbody tr').each(function () {
                if ($(this).hasClass('nenhum')) {
                    $(this).show();
                } else {
                    $(this).remove();
                }
            });
        }

        function setErrosModalData(data) {
            clearErrosModal();
            if (data.length > 0) {
                for (i in data) {
                    $('#lista-erros').append('<p>' + data[i] + '</p>');
                }
            }
        }

        function showErrosModal() {
            $('#erro-modal').show();
        }

        function clearErrosModal() {
            $('#lista-erros').empty();
        }

        function sendDocumentos() {
            //apagar dados que não são documentos
            $('#contribuinte-data [name="termo"]').remove();
            $('#contribuinte-data [name="ocupacao"]').remove();
            $('#contribuinte-data [name="ocupacao_descricao"]').remove();
            //migrar dados restantes do formulario de imposto de renda para contribuinte-data
            var termo = $('[name="termo"]:checked').val();
            var ocupacao = $('[name="ocupacao"]').val();
            var ocupacao_descricao = $('[name="ocupacao_descricao"]').val();
            $('#contribuinte-data').append("<input type='hidden' value='" + (ocupacao ? ocupacao : '') + "' name='ocupacao' />");
            $('#contribuinte-data').append("<input type='hidden' value='" + ( termo ? termo : '') + "' name='termo' />");
            $('#contribuinte-data').append("<input type='hidden' value='" + (ocupacao_descricao ? ocupacao_descricao : '') + "' name='ocupacao_descricao' />");
            //validar dados
            $.ajax({
                url: $('#imposto-renda-form').data('validate-url'),
                type: 'POST',
                data: $('#contribuinte-data').serializeArray(),
                success: function (res) {
                    $('#contribuinte-data').submit();
                }, error: function (xhqr) {
                    var data = xhqr.responseJSON;
                    setErrosModalData(data.erros);
                    showErrosModal();
                }
            });
        }

        function removeDocumento(element, origin) {
            var documento = element.data('documento');
            if (origin == 'dependente') {
                removeUploadedFile($('#' + origin + '-data [name="dependente[' + dependenteIndex + '][documentos][' + documento + '][documento]"]').val());
                $('#' + origin + '-data [name^="dependente[' + dependenteIndex + '][documentos][' + documento + ']"]').remove();
            } else {
                removeUploadedFile($('#' + origin + '-data [name="documentos[' + documento + '][documento]"]').val());
                $('#' + origin + '-data [name^="documentos[' + documento + ']"]').remove();
            }
            var list = element.parent().parent().parent();
            element.parent().parent().remove();
            if (list.find('tr').length < 2) {
                list.find('.nenhum').show();
            }
        }

        function addDocumentoRow(options) {
            var form = options.origin == 'contribuinte' ? '#imposto-renda-form' : '#dependente-form';
            var descricao = options.descricao;
            $('<input type="hidden" name="' + options.descricaoFieldName + '" value="' + descricao + '" />').appendTo('#' + options.origin + '-data');
            $(form + ' .lista_' + options.tipo).append('<tr>' +
                '<td>' + options.descricao + '</td>' +
                '<td>' +
                '<button type="button" class="btn btn-danger remove-documento" data-documento="' + documentoIndex + '">Remover Documento</button>' +
                '</td>' +
                '</tr>');
            $(form + ' .lista_' + options.tipo + ' tr:last td').addClass('animated fadeInLeft');
            $(form + ' .lista_' + options.tipo + ' .nenhum').hide();
            options.documento.val(null);
            documentoIndex++;
            if (options.tipo == 'doacao' || options.tipo == 'outros') {
                $('[name="' + options.tipo + '[descricao]"]').val(null);
            }
        }

        function addDocumento(tipo, origin) {
            if (!origin) {
                origin = 'contribuinte';
            }
            var form = origin == 'contribuinte' ? '#imposto-renda-form' : '#dependente-form';
            if (!$(form + ' [name="' + tipo + '[descricao]"]').val()) {
                if (tipo == 'doacao') {
                    setErrosModalData(['É necessário informar o valor da doação.']);
                }
                if (tipo == 'outros') {
                    setErrosModalData(['É necessário informar o a descrição do documento.']);
                }
                showErrosModal();
                $(form + ' input[name="' + tipo + '[documento]"]').val(null);
                return false;
            }
            var descricao = $(form + ' [name="' + tipo + '[descricao]"]').val();
            if (tipo == 'doacao') {
                descricao = 'Doação de R$' + $(form + ' input[name="' + tipo + '[descricao]"]').val();
            }
            var documento = $(form + ' input[name="' + tipo + '[documento]"]');
            var documentoFieldName;
            var descricaoFieldName;
            if (origin == 'dependente') {
                documentoFieldName = "dependente[" + dependenteIndex + "][documentos][" + documentoIndex + "][documento]";
                descricaoFieldName = "dependente[" + dependenteIndex + "][documentos][" + documentoIndex + "][descricao]";
            } else {
                documentoFieldName = "documentos[" + documentoIndex + "][documento]";
                descricaoFieldName = "documentos[" + documentoIndex + "][descricao]";
            }
            var options = {};
            options.descricaoFieldName = descricaoFieldName;
            options.origin = origin;
            options.documento = documento;
            options.descricao = descricao;
            options.tipo = tipo;
            uploadFile(documento, documentoFieldName, origin, options, addDocumentoRow);

        }

        function closeErroModal() {
            $('#erro-modal').hide();
        }

        function moveFormDataToDependenteData() {
            $('#dependente-form').find('input[type="text"], select').each(function () {
                if ($(this).val()) {
                    $('#dependente-data').append("<input type='hidden' name='dependente[" + dependenteIndex + "][" + $(this).attr('name') + "]' value='" + $(this).val() + "' />");
                }
            });
        }

        function moveDependenteDataToContribuinteData() {
            $('#dependente-data input').each(function () {
                $('#contribuinte-data').append("<input type='hidden' name='" + $(this).attr('name') + "' value='" + $(this).val() + "' />");
            });
            $("#dependente-data").empty();
        }

        function addDependenteRow() {
            $('.nenhum-dependente-row').hide();
            $('.lista-dependentes').append('<tr><td>' + $("#dependente-form [name=nome]").val() + '</td><td><button type="button" class="btn btn-danger remove-dependente" data-dependente="' + dependenteIndex + '">Remover Dependente</button></td></tr>')
        }

        function toggleNenhumDependenteRow() {
            if ($('.lista-dependentes tr').length < 2) {
                $('.nenhum-dependente-row').show();
            }
        }

        function removeUploadedFile(name) {
            $.ajax({
                url: $('#imposto-renda-form').data('remove-upload-url'),
                type: 'POST',
                data: {'fileName': name},
                success: function (res) {
                }, error: function (xhqr) {
                }
            });
        }

        function removeDependente(row, dependente) {
            removeDependenteData(dependente);
            row.remove();
            toggleNenhumDependenteRow();
        }

        function removeDependenteData(dependente) {
            $('#contribuinte-data input[name^="dependente[' + dependente + ']"]').each(function () {
                removeUploadedFile($(this).val());
                $(this).remove();
            });
        }

        function addDependente() {
            if (validateDependente()) {
                addDependenteRow();
                moveFormDataToDependenteData();
                moveDependenteDataToContribuinteData();
                closeDependenteModal();
                dependenteIndex++;
            }
        }

        function calculateAge(birthday) { // birthday is a date
            var ageDifMs = Date.now() - birthday.getTime();
            var ageDate = new Date(ageDifMs); // miliseconds from epoch
            return Math.abs(ageDate.getUTCFullYear() - 1970);
        }

        function scrollTo(body, target) {
            $(body).animate({
                scrollTop: target.offset().top - 800
            }, 1500);
        }

        function validateDependente() {
            var data_nascimento = $('#dependente-form [name="data_nascimento"]').val();
            var nome = $('#dependente-form [name=nome]').val();
            var cpf = $('#dependente-data [name="dependente[' + dependenteIndex + '][cpf]"]').val();
            var rg = $('#dependente-data [name="dependente[' + dependenteIndex + '][rg]"]').val();
            var erros = [];
            if (!nome) {
                scrollTo('.modal', $('#dependente-form [name=nome]'));
                erros.push('É necessário informar o nome do dependente.');
            }
            if (data_nascimento) {
                try {
                    var newdate = data_nascimento.split("/").reverse().join("-");
                    var idade = calculateAge(new Date(newdate));
                    if (idade >= 14) {
                        if (!cpf || !rg) {
                            scrollTo('.modal', $('#dependente-form [name=cpf]'));
                            if (erros.length == 0) {
                                erros.push('É necessário enviar uma cópia do RG e do CPF.');
                            }
                        }
                    }
                } catch (e) {
                    if (erros.length == 0) {
                        scrollTo('.modal', $('#dependente-form [name=data_nascimento]'));
                    }
                    erros.push('Data de nascimento inválida, a data de nascimento deve ser por exemplo: 01/01/1990.');
                }
            } else {
                if (erros.length == 0) {
                    scrollTo('.modal', $('#dependente-form [name=data_nascimento]'));
                }
                erros.push('É necessário informar a data de nascimento.');
            }
            if (erros.length) {
                setErrosModalData(erros);
                showErrosModal();
                return false;
            }
            return true;
        }

        function closeDependenteModal() {
            $('#dependente-form')[0].reset();
            $('#dependente-data').empty();
            $('#dependente-modal').modal('hide');
        }

        function showAddDependenteModal() {
            $('#dependente-modal').modal({'keyboard': false, 'show': true, 'backdrop': 'static'});
        }

        function changeHasDeclaracaoAnoAnterior(input) {
            if (input.val() == '1') {
                $('.declaracao-ano-anterior-group input').prop('disabled', false);
                $('.declaracao-ano-anterior-group').show('swing');
                $('.documentos-declaracao').hide('swing');
            } else {
                $('.declaracao-ano-anterior-group input').prop('disabled', true);
                $('.declaracao-ano-anterior-group').hide('swing');
                $('.documentos-declaracao').show('swing');
            }
        }

        function uploadFile(input, fieldName, origin, options, callback) {
            $('#lista-erros').empty();
            if (!fieldName) {
                fieldName = input.attr('name');
            }
            if (!origin) {
                origin = 'contribuinte';
            }
            var formData = new FormData;
            formData.append('documento', input[0].files[0]);
            $('#espere-modal').show();
            $.ajax({
                url: $('#imposto-renda-form').data('upload-url'),
                data: formData,
                type: 'POST',
                // THIS MUST BE DONE FOR FILE UPLOADING
                contentType: false,
                processData: false,
                success: function (res) {
                    if (origin == 'contribuinte') {
                        $('#contribuinte-data').append('<input type="hidden" name="' + fieldName + '" value="' + res.documento + '" />');
                    } else {
                        $('#dependente-data').append("<input type='hidden' name='" + fieldName + "' value='" + res.documento + "' />");
                    }
                    if (options !== undefined) {
                        callback(options);
                    }
                    $('#espere-modal').hide();
                    if (replaceable) {
                        if (!replaceable.data('tipo')) {
                            replaceable.replaceWith('<div class="btn btn-success replaceable"><span class="fa fa-check"></span> Documento Enviado</div>');
                        }
                        replaceable = null;
                    }

                }, error: function (xhqr) {
                    $('[name="' + fieldName + '"]').val(function () {
                        return this.defaultValue;
                    });
                    $('#espere-modal').hide();
                    var data = xhqr.responseJSON;
                    if (data !== undefined) {
                        for (i in data.erros) {
                            $('#lista-erros').append('<p>' + data['erros'][i] + '</p>');
                        }
                    } else {
                        $('#lista-erros').append('<p>Ocorreu um erro interno, tente novamente.</p>');
                    }
                    $('#erro-modal').show();
                    replaceable = null;
                }
            });
        }

        $(function () {
            setEvents();
        });
    </script>
@stop


@section('content')
    @parent
    <div class="content-fluid">
        <div class="col-xs-12">
            <div class="card">
                <h3>Enviar Documentos para Declaração</h3>
                <form id="contribuinte-data" method="post"></form>
                <form id="imposto-renda-form" class="form" method="get" enctype="multipart/form-data"
                      data-upload-url="{{route('imposto-renda-upload')}}"
                      data-validate-url="{{route('imposto-renda-validate')}}"
                      data-remove-upload-url="{{route('imposto-renda-remove-upload')}}">
                    @include('central_cliente.imposto_renda.documentos.contribuinte_form')
                </form>
            </div>
        </div>
    </div>
@stop
@section('modal')
    @parent
    <div class="modal fade" id="dependente-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Adicionar Dependente</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <form id="dependente-data"></form>
                        <form id="dependente-form">
                            @include('central_cliente.imposto_renda.documentos.dependente_form')
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span>
                        Fechar
                    </button>
                    <button type="button" class="btn btn-primary" id="add-dependente"><span class="fa fa-save"></span>
                        Salvar dependente
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="alerta-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Atenção!</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <p>Antes de anexar os documentos, certifique-se de estar com todos os documentos digitalizados, por motivo de segurança o sistema não permite editar e/ou incluir documentos após enviar a declaração.</p>
                        <p>Se tiver dúvidas de como proceder, <a href="{{route('home')}}#contato"><strong>clique aqui para entrar em contato</strong></a>.</p>
                </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span>
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="espere-modal" tabindex="-1" role="dialog">
        <div class="message">
            <p>Estamos carregando o documento em nosso servidor, por favor aguarde um instante.</p>
        </div>
    </div>

    <div id="erro-modal" tabindex="-1" role="dialog">
        <div class="message">
            <div class='alert alert-warning'>
                <p><strong>Atenção!</strong></p>
                <br/>
                <div id='lista-erros' class="text-left"></div>
            </div>
            <button id="close-erro-modal" class="btn btn-default">Fechar</button>
        </div>
    </div>

@stop