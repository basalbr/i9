@extends('central_cliente.layouts.master')
@section('content')
    @parent
    <div class="content">
        <div class="col-xs-12">
            @if(!$declaracao)
                <p>Olá {{Auth::user()->nome}}, pudemos verificar que você ainda não nos enviou sua declaração de {{$ano_anterior}}.</p>
                <a class="btn btn-primary" href="{{route('imposto-renda-enviar-documentos')}}">Clique aqui para fazer sua declaração</a>
            @endif
        </div>

    </div>
@stop