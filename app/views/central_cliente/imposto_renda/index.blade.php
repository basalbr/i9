@extends('central_cliente.layouts.master')
@extends('central_cliente.imposto_renda.menu')
@section('js')
    @parent
    <script src="{{url(public_path().'js/print-this.js')}}"></script>
    @if(!$declaracao)
        <script type="text/javascript">
            $(function () {
                $('#imprimir-docs').on('click', function () {
                    $("#documentos-modal .modal-content").printThis({
                        debug: false,
                        importCSS: true,
                        importStyle: true,
                        printContainer: true,
                        loadCSS: ["{{public_path()}}css/bootstrap.min.css", "{{public_path()}}css/central_cliente.css"],
                        pageTitle: "Documentos a serem enviados",
                        removeInline: false,
                        printDelay: 333,
                        header: null,
                        formValues: true
                    });
                });

                $('#alerta-modal').modal('show');
            });
        </script>
    @endif
@stop
@section('content')

    @parent

    <div class="content-fluid hidden-print">
        <div class="col-xs-12">
            <div class="card">
                <h3>Imposto de Renda</h3>
                @if(!$declaracao)
                    <div class="col-xs-12">
                        <p>Olá <strong>{{Auth::user()->nome}}</strong>, pudemos verificar que você ainda não nos enviou
                            sua declaração
                            de {{$ano_anterior}}.</p>
                        <p>Abaixo estão algumas opções, caso tenha dúvidas de como proceder, <a
                                    href="{{route('home')}}#contato"><strong>entre em contato conosco clicando
                                    aqui.</strong></a></p>
                    </div>
                    <div class="clearfix"></div>
                    <br/>

                    <div class='col-md-3'>
                        <a href='{{route('imposto-renda-enviar-documentos')}}' class='shortcut blue'>
                            <div class='big-icon'><span class='fa fa-send'></span></div>
                            <h3 class='text-center'>Enviar Declaração</h3>
                        </a>
                    </div>
                    @include('central_cliente.imposto_renda.components.ajuda')
                @else
                    <div class="col-xs-12">
                        <p>Olá {{Auth::user()->nome}}, verificamos que você já enviou a sua declaração do exercício
                            de {{$ano_anterior}}</p>
                        <p>Se tiver dúvidas, <a href="{{route('home')}}#contato">entre em contato conosco</a> através
                            de
                            nossa página inicial.</p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-section">
                        <h4>Suas declarações</h4>
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    Exercício
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Pagamento
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$declaracao->exercicio}}</td>
                                <td>{{$declaracao->statusFormatado()}}</td>
                                <td>{{$declaracao->ordemPagamento()->status}}</td>
                                <td>
                                    @if($declaracao->status == 'concluido' && $declaracao->recibo && $declaracao->declaracao)
                                        <a target="_blank" download class="btn btn-primary"
                                           href="{{asset(public_path().'uploads/documentos_imposto_renda/'.$declaracao->declaracao)}}">Baixar
                                            Declaração</a>
                                        <a target="_blank" download class="btn btn-primary"
                                           href="{{asset(public_path().'uploads/documentos_imposto_renda/'.$declaracao->recibo)}}">Baixar
                                            Recibo</a>
                                    @else
                                        <a class="btn btn-primary"
                                           href="{{route('imposto-renda-visualizar',[$declaracao->id])}}">Ver
                                            Documentos</a>
                                    @endif
                                    {{$declaracao->botaoPagamento($declaracao->ordemPagamento()->id)}}
                                </td>
                            </tr>

                            </tbody>

                        </table>
                    </div>
                @endif
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    @include('central_cliente.imposto_renda.modals.informacao')
@stop
