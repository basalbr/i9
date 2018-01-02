@extends('layouts.master')
@section('page_description')
{{$noticia->nome}}
@stop
@section('og')
<meta property="og:title" content="{{Str::limit($noticia->nome, 50)}}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:image" content="{{url(public_path().'uploads/'.$noticia->thumb)}}" />
<meta property="og:image:url" content="{{url(public_path().'uploads/'.$noticia->thumb)}}" />
<meta property="og:description" content="{{Str::limit(strip_tags($noticia->descricao, 120))}}" />
<meta property="og:site_name" content="i9 Gestão Empresarial" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@stop
@section('banners')
@stop
@section('js')
@parent
<script type="text/javascript">var switchTo5x = true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "6b873cc3-777d-491c-a8e7-20f1f79f28bb",doneScreen:false,onhover:false, doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
@stop
@section('content')
<section id='noticia'>
    <div class='container-fluid bg-white'>

        <div class='container'>
            <div class='col-xs-12 text-center'>
                <img style="max-height: 400px; margin-bottom: 10px" src='{{url(public_path().'uploads/'.$noticia->imagem)}}'>
            </div>
            <div class='col-xs-12' style="margin-bottom:30px;">
                {{$noticia->descricao}}

            </div>
            <div class="mini_border">
                <h2>Gostou? Compartilhe!</h2>
            </div>
            <div class='col-xs-12'>
                <span class='st_sharethis_large' displayText='ShareThis'></span>
                <span class='st_facebook_large' displayText='Facebook'></span>
                <span class='st_twitter_large' displayText='Tweet'></span>
                <span class='st_linkedin_large' displayText='LinkedIn'></span>
                <span class='st_pinterest_large' displayText='Pinterest'></span>
                <span class='st_email_large' displayText='Email'></span>
            </div>
        </div>
    </div>
</section>
<section id='noticias'>
    <div class='container-fluid bg-white'>

        <div class='container'>
            <div class="mini_border">
                <h2>últimas notícias</h2>
            </div>
            @if(count($noticias) > 0)
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

            @endif
        </div>
    </div>
</section>

@stop