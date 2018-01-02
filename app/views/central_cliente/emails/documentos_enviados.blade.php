@extends('central_cliente.layouts.email')
@section('main')
<div class="col-xs-12">
    <div class="corpo-email">
        <h1>Nova declaração</h1>
        <hr>
        <p>Olá, {{$nome}} enviou os documentos da declaração.</p>
        <p>Para acessar o sistema e verificar a declaração, basta clicar <a target="_blank" href="{{route('imposto-renda-admin-editar', [$idDeclaracao])}}">nesse link</a>.</p>
        <div class="text-right"><a target="_blank" href="{{route('home')}}"><img src="{{url(public_path().'images/navbar-logo.png')}}" /></a></div>
    </div>
    
</div>
@stop