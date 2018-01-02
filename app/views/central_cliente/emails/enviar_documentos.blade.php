@extends('central_cliente.layouts.email')
@section('main')
<div class="col-xs-12">
    <div class="corpo-email">
        <h1>Recebemos seus documentos</h1>
        <hr>
        <p>Olá {{$nome}}, estamos enviando esse e-mail porque você nos enviou seus documentos para declaração de imposto de renda.</p>
        <p>Para acessar nosso sistema e acompanhar sua declaração, basta clicar <a target="_blank" href="{{route('imposto-renda-index')}}">nesse link</a>.</p>
        <p>Agradecemos sua preferência!</p>
        <div class="text-right"><a target="_blank" href="{{route('home')}}"><img src="{{url(public_path().'images/navbar-logo.png')}}" /></a></div>
    </div>
    
</div>
@stop