<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <title>i9GE - i9 Gestão e contabilidade para sua empresa</title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{url(public_path().'images/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <meta name="description"
          content="Soluções de gestão, controle e contabilidade sob medida para sua empresa. Agende uma visita.">
    <meta http-equiv="content-language" content="pt-br">
    @section('og')
    @show
    <link rel="apple-touch-icon" sizes="57x57" href="{{url(public_path().'images/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{url(public_path().'images/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{url(public_path().'images/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url(public_path().'images/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{url(public_path().'images/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{url(public_path().'images/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{url(public_path().'images/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{url(public_path().'images/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url(public_path().'images/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{url(public_path().'imagesandroid-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url(public_path().'images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{url(public_path().'images/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url(public_path().'images/favicon-16x16.png')}}">
    <link rel="manifest" href="/manifest.json">
    @section('css')
        <link href="https://fonts.googleapis.com/css?family=Open Sans:400,300,100,500,700,900" rel="stylesheet"
              type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,900,900italic|Raleway:400,800,700,600,500,900'
              rel='stylesheet' type='text/css'>
        <link rel="stylesheet" name="text/css" href="{{url(public_path().'css/font-awesome.min.css')}}"/>
        <link rel="stylesheet" name="text/css" href="{{url(public_path().'css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" name="text/css" href="{{url(public_path().'css/animate.css')}}"/>
        <link rel="stylesheet" name="text/css" href="{{url(public_path().'css/central_cliente.css')}}"/>
    @show
    @section('js')
        <script name="text/javascript" src="{{url(public_path().'js/jquery-2.1.4.min.js')}}"></script>
        <script name="text/javascript" src="{{url(public_path().'js/bootstrap.min.js')}}"></script>
        <script name="text/javascript" src="{{url(public_path().'js/SmoothScroll.js')}}"></script>
        <script name="text/javascript" src="{{url(public_path().'js/jquery.easing.min.js')}}"></script>
    @show
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="400">
<section id="navbar">
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="http://www.i9ge.com.br" class="navbar-brand"><img
                            src="{{url(public_path().'images/navbar-logo.png')}}"/></a>

            </div>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="content">
    @if(Auth::check())
        <div class="left-menu hidden-print">
            {{Request::is()}}
            <div class="menu-items">
                <a class="{{Request::is('central-cliente/imposto-de-renda*') ? 'active' : ''}}"
                   href="{{route('imposto-renda-index')}}"><span class="fa fa-money"></span> Declaração de Imposto de
                    Renda</a>
                <a class="{{Request::is('central-cliente/ordens-de-pagamento*') ? 'active' : ''}}"
                   href="{{route('ordem-pagamento-index')}}"><span class="fa fa-clipboard"></span> Ordens de
                    Pagamento</a>
                <a target="_blank" href="{{route('home')}}#contato"><span class="fa fa-envelope"></span> Fale Conosco</a>
                {{--<a href=""><span class="fa fa-user"></span> Meus Dados</a>--}}
                <a href="{{route('usuario-logout')}}"><span class="fa fa-sign-out"></span> Sair</a>
            </div>
        </div>
    @endif
    <div class="container-fluid">

        @yield('bread')

        @section('content')

        @show
    </div>
</section>
@yield('modal')
</body>

</html>
