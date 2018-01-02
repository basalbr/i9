@extends('central_cliente.layouts.master')
@section('page_description')
    Central do Cliente
@stop

@section('js')
    @parent
    <script type="text/javascript" src="{{url(public_path().'js/mask.js')}}"></script>
    <script src="{{url(public_path().'js/print-this.js')}}"></script>
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
            $(".fone-mask").mask("(00) 0000-00009");
        });

    </script>
@stop
@section('content')
    <div class='container-fluid bg-white'>
        <div class='box'>
            <h2>Acesso ao sistema</h2>
        </div>

        <div class='container'>
            <div class='col-xs-6'>
                <div class="mini_border">
                    <h2>Já possui cadastro?</h2>
                </div>
                <p>Se você já possui um cadastro em nosso sistema, digite o e-mail e a senha que você utilizou para se
                    cadastrar e clique em "Acessar".</p>
                @if($errors->login->has())
                    <div class="alert alert-warning shake animated bounce">
                        <b>Atenção</b><br/>
                        @foreach ($errors->login->all() as $error)
                            {{ $error }}<br/>
                        @endforeach
                    </div>
                @endif
                <form class="form" method="POST" action="">
                    <div class="form-group">
                        <label>E-mail *</label>
                        <input type="text" name="email" class="form-control"
                               placeholder="Digite seu e-mail de cadastro"/>
                    </div>
                    <div class="form-group">
                        <label>Senha *</label>
                        <input type="password" name="senha" class="form-control" placeholder="Digite sua senha"/>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary"><span class="fa fa-sign-in"></span> Acessar</button>
                    </div>
                </form>
                <div class="clearfix"></div>
                <div class="mini_border">
                    <h2>Dúvidas?</h2>
                </div>
                <div id="ajuda-login">
                    @include('central_cliente.components.ajuda')
                </div>
            </div>
            <div class='col-xs-6'>
                <div class="mini_border">
                    <h2>Não é cadastrado?</h2>
                </div>
                <p>Se você ainda não possui um cadastro em nosso sistema, complete as informações abaixo e clique em
                    "Cadastrar". <b>O cadastro é gratuito</b> e lhe dará acesso às perguntas e respostas frequentes
                    sobre Imposto de Renda.</p>
                @if($errors->cadastro->has())
                    <div class="alert alert-warning shake animated bounce">
                        <b>Atenção</b><br/>
                        @foreach ($errors->cadastro->all() as $error)
                            {{ $error }}<br/>
                        @endforeach
                    </div>
                @endif
                <form class="form" method="POST" action="{{route('usuario-cadastrar')}}">
                    <input type="hidden" value=" {{csrf_token()}}" name="_csrf_token"/>
                    <div class="form-group">
                        <label>Nome *</label>
                        <input type="text" name="nome" class="form-control" placeholder="Digite seu nome completo"/>
                    </div>

                    <div class="form-group">
                        <label>Telefone *</label>
                        <input type="text" name="telefone" class="form-control fone-mask"
                               placeholder="Digite um número de telefone para contato"/>
                    </div>
                    <div class="form-group">
                        <label>E-mail *</label>
                        <input type="text" name="email" class="form-control"
                               placeholder="Digite seu e-mail de cadastro"/>
                    </div>
                    <div class="form-group">
                        <label>Senha *</label>
                        <input type="password" name="senha" class="form-control" placeholder="Digite sua senha"/>
                    </div>
                    <div class="form-group">
                        <label>Confirmar Senha *</label>
                        <input type="password" name="confirmar_senha" class="form-control"
                               placeholder="Digite sua senha novamente"/>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary"><span class="fa fa-plus"></span> Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@include('central_cliente.imposto_renda.modals.informacao')
@stop