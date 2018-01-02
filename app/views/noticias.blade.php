@extends('layouts.master')
@section('page_description')
NOTÍCIAS
@stop
@section('banners')
@stop
@section('content')

<section id='noticias'>
    <div class='container-fluid bg-white'>
    
        <div class='container'>
           
            @if(count($noticias) > 0)
            <div class="col-xs-12 text-right">
                {{$noticias->links()}}
            </div>
            @foreach ($noticias as $index => $noticia)
            <div class='col-md-4'>
                <div class="noticia-item">
                    <a href="{{URL::action('NoticiasController@ler', [$noticia->id])}}">
                        <div class="noticia-item-img">
                            {{ HTML::image(public_path().'uploads/'.$noticia->thumb) }}
                        </div>
                        <div class="noticia-item-titulo">{{ Str::limit($noticia->nome, 50) }}</div>
                    </a>
                </div>
            </div>
            @endforeach
            <div class="col-xs-12 text-right">
                {{$noticias->links()}}
            </div>
            @endif
        </div>
    </div>
</section>
<section id='contato'>
    <div class='container-fluid bg-dark'>
        <div class='box'>
            <h2>Contato</h2>
            <p>Entre em contato conosco</p>
        </div>
        <div class='container'>
            <div class="col-md-4 col-xs-12">
                <div class="mini_border">
                    <h2>mensagem</h2>
                </div>
                <form class="form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="assunto" placeholder="Assunto"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nome" placeholder="Nome"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Informe seu e-mail"/>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="assunto" placeholder="Assunto"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="btn btn-primary" value="Enviar Mensagem"/>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="mini_border">
                    <h2>telefone</h2>
                </div>
                <div id="telefone">
                    <div class="col-xs-12">
                        <span class="glyphicon glyphicon-phone"></span><div class="info">(47) 9975-2588</div>
                    </div>
                    <div class="col-xs-12">
                        <span class="glyphicon glyphicon-user"></span><div class="info">Silmara Batista Baseggio</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="mini_border">
                    <h2>redes sociais</h2>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="mini_border">
                    <h2>newsletter</h2>
                </div>
                <form class="form newsletter">
                    <legend>Preencha seu nome e e-mail nos campos abaixo e fique por dentro de todas as nossas novidades.</legend>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nome" placeholder="Nome completo"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="E-mail"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="btn btn-primary" value="Cadastrar"/>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</section>
@stop