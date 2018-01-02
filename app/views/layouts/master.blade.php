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
        <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,900,900italic|Raleway:400,800,700,600,500,900'
              rel='stylesheet' type='text/css'>
        <link rel="stylesheet" name="text/css" href="{{url(public_path().'css/font-awesome.min.css')}}"/>
        <link rel="stylesheet" name="text/css" href="{{url(public_path().'css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" name="text/css" href="{{url(public_path().'css/animate.css')}}"/>
        <link rel="stylesheet" name="text/css" href="{{url(public_path().'css/custom.css')}}"/>
    @show
    @section('js')
        <script name="text/javascript" src="{{url(public_path().'js/jquery-2.1.4.min.js')}}"></script>
        <script name="text/javascript" src="{{url(public_path().'js/bootstrap.min.js')}}"></script>
        <script name="text/javascript" src="{{url(public_path().'js/viewportchecker.js')}}"></script>
        <script name="text/javascript" src="{{url(public_path().'js/SmoothScroll.js')}}"></script>
        <script name="text/javascript" src="{{url(public_path().'js/jquery.easing.min.js')}}"></script>
        <script name="text/javascript">
            $(document).ready(function () {
                var navMain = $("#navbar-main");
                navMain.on("click", "a", null, function () {
                    navMain.collapse('hide');
                });
                $('#banners, #imposto-renda, #quem-somos, #parceiros, #servicos, #noticias, #contato').addClass("hiddenSection").viewportChecker({
                    classToAdd: 'animated visibleSection fadeIn',
                    classToRemove: 'hiddenSection',
                    classToAddForFullView: '',
                    offset: '20%',
                    invertBottomOffset: false,
                });

                $('a.page-scroll').bind('click', function (event) {
                    var $anchor = $(this);
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top - 50
                    }, 1000, 'easeInOutExpo');
                    event.preventDefault();
                });
                $("#formNewsletter").on('submit', function (ev) {
                    ev.preventDefault();
                    $.post('/ajax/newsletter_save', {
                        'email': $('#formNewsletter input[name="email"]'),
                        'nome': $('#formNewsletter input[name="nome"]')
                    }).val()
                }, function (data) {
                    if (data == 'ja_existe') {
                        window.alert('Esse e-mail já está cadastrado em nosso sistema, por favor cadastre outro e-mail');
                    }
                    if (data == 'vazio') {
                        window.alert('Por favor insira um endereço de e-mail e pressione o botão Assinar');
                    }
                    if (data == 'salvo') {
                        window.alert('E-mail cadastrado com sucesso! Em breve você receberá novidades em seu e-mail');
                    }
                });
                $("#formContato").on('submit', function (ev) {
                    ev.preventDefault();
                    var nome = $('#formContato input[name="nome"]').val();
                    var email = $('#formContato input[name="email"]').val();
                    var assunto = $('#formContato input[name="assunto"]').val();
                    var mensagem = $('#formContato textarea[name="mensagem"]').val();
                    $.post('/ajax/email_send', {
                        'nome': nome,
                        email: email,
                        assunto: assunto,
                        mensagem: mensagem
                    }, function (data) {
                        console.log(data);
                        if (data == 'true') {
                            window.alert('E-mail enviado com sucesso, em breve entraremos em contato!');
                        } else {
                            window.alert('Ocorreu um erro ao tentar enviar o e-mail, por favor tente novamente mais tarde.');
                        }
                    }).fail(function () {
                        window.alert("Ocorreu um erro ao tentar enviar o e-mail, por favor tente novamente mais tarde.");
                    });
                })
            });
        </script>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-74363554-1', 'auto');
            ga('send', 'pageview');
            setTimeout(ga('send', 'event', {eventCategory: '30 seconds on page', eventAction: 'Read'}), 30000);
            var runned = false;
            $(window).scroll(function () {
                if ($(document).scrollTop() >= 800 && runned == false) {
                    ga('send', 'event', {eventCategory: 'Scrolled 800px', eventAction: 'Scroll'});
                    runned = true;
                }
            });
        </script>
    @show
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="400">
<section id="navbar">
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header">
            <a href="http://www.i9ge.com.br" class="navbar-brand"><img
                        src="{{url(public_path().'images/navbar-logo.png')}}"/></a>
            <button class="navbar-toggle btn btn-primary" name="button" data-toggle="collapse"
                    data-target="#navbar-main">
                <span class="fa fa-bars"></span> Menu
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav {{Request::is('/') ? '' : "nav-home"}}">
                @if(!Request::is('/'))
                    <li>
                        <a href="http://www.i9ge.com.br" class="page-scroll">home</a>
                    </li>
                @endif
                <li>
                    <a href="#quem-somos" class="page-scroll">quem somos</a>
                </li>

                <li>
                    <a href="#servicos" class="page-scroll">serviços</a>
                </li>
                <li>
                    <a href="#imposto-renda" class="page-scroll highlight">enviar declaração IR</a>
                </li>
                <li>
                    <a href="#noticias" class="page-scroll">notícias</a>
                </li>
                <li>
                    <a href="#parceiros" class="page-scroll">parceiros</a>
                </li>
                <li>
                    <a href="#contato" class="page-scroll">contato</a>
                </li>
            </ul>
        </div>
    </div>
</section>
@if(Request::is('/noticias') || Request::is('noticia*'))
    <section id='page_description'>
        <div class='container-fluid'>
            <h1>@yield('page_description')</h1>
        </div>
    </section>
@endif
@section('banners')
    @if (count($banners)> 0)
        <section id='banners'>
            <div id="carousel" class="carousel slide" data-ride="carousel">


                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php $bannerCnt = 0; ?>
                    @foreach($banners as $banner)
                        <div class="item {{$bannerCnt == 0 ? 'active':''}}">
                            <a href="{{$banner->url}}">
                                {{ HTML::image('uploads/'.$banner->imagem, $banner->titulo, array('alt'=>$banner->titulo, 'data-url'=>$banner->url)) }}
                            </a>
                        </div>
                        <?php $bannerCnt++; ?>
                    @endforeach

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                    <span class="fa fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
        </section>
    @endif
@show
@yield('content')
@section('footer')
    <section id='contato'>
        <div class='container-fluid bg-dark'>
            <div class='box'>
                <h2>Contato</h2>
            </div>
            <div class='container'>
                <div class="col-md-4 col-xs-12">
                    <div class="mini_border">
                        <h2>mensagem</h2>
                    </div>
                    <form class="form" id="formContato">
                        <div class="form-group">
                            <input type="text" class="form-control" name="assunto" placeholder="Assunto" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nome" placeholder="Nome" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Informe seu e-mail"
                                   required=""/>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="mensagem" placeholder="Mensagem"
                                      required=""></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Enviar Mensagem"/>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="mini_border">
                        <h2>Contato</h2>
                    </div>
                    <div id="telefone">
                        <div class="col-xs-12">
                            <span class="glyphicon glyphicon-phone"></span>
                            <div class="info">(47) 9745-2138</div>
                        </div>
                        <div class="col-xs-12">
                            <span class="glyphicon glyphicon-user"></span>
                            <div class="info">Silmara Batista Baseggio</div>
                        </div>
                        <div class="col-xs-12">
                            <address>
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <div class="info">Rua Iguaçu, 209 - Itoupava Seca <br/> Blumenau, SC <br/>Anexo à <a
                                            href="http://www.offcinacoworking.com.br/"><b>Offcina Café &
                                            Coworking</b></a></div>
                            </address>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="mini_border">
                        <h2>redes sociais</h2>
                        <div class='col-xs-12 redes-sociais'>
                            <a href='https://plus.google.com/100949839733496090559' target='_blank' class='icon-social'><span
                                        class='fa fa-google-plus'></span></a>
                            <a href='https://www.facebook.com/pages/i9GE-i9-Gest%C3%A3o-Empresarial-e-Contabilidade/717701101688981'
                               target='_blank' class='icon-social'><span class='fa fa-facebook'></span></a>
                            <div class='clearfix'></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="mini_border">
                        <h2>newsletter</h2>
                    </div>
                    <form class="form newsletter" id="formNewsletter">
                        <legend>Preencha seu nome e e-mail nos campos abaixo e fique por dentro de todas as nossas
                            novidades.
                        </legend>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nome" placeholder="Nome completo"
                                   required=""/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="E-mail" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Cadastrar"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        </div>
    </section>
@show
<section id="footer">
    <div class='container-fluid'>
        <div class="col-xs-12 text-center">
            Desenvolvido por Aldir Baseggio Junior
        </div>
    </div>
</section>

</body>

</html>
