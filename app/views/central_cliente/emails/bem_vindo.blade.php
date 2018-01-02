@extends('central_cliente.layouts.email')
@section('main')
<div class="col-xs-12">
    <div class="corpo-email">
        <h1>Seja bem vindo à i9 Gestão Empresarial</h1>
        <hr>
        <p>Olá {{$nome}}, estamos enviando esse e-mail porque você se cadastrou em nosso site.</p>
        <p>Caso você não tenha se cadastrado, acesse nosso site e envie uma mensagem nos alertando sobre esse equívoco.</p>
        <p>Para acessar nosso sistema, basta clicar <a target="_blank" href="{{route('imposto-renda-index')}}">nesse link</a>.</p>
        <p>Agradecemos sua preferência!</p>
        <div class="text-right"><a target="_blank" href="{{route('home')}}"><img src="{{url(public_path().'images/navbar-logo.png')}}" /></a></div>
    </div>
    
</div>
@stop