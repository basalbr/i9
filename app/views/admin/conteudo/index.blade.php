@extends('admin.layouts.admin-layout')
@section('content')
<div class="widget">
    <table cellpadding="0" cellspacing="0" width="100%" class="sTable" id="res1">
        <thead>
            <tr>
                <td class="sortCol"><div>ID<span></span></div></td>
                <td class="sortCol"><div>Nome<span></span></div></td>
                <td class="sortCol"><div>Título<span></span></div></td>
                <td class="sortCol"><div>Descrição<span></span></div></td>
                <td style="width: 100px"><div>Ações<span></span></div></td>
            </tr>
        </thead>
        <tbody>
            @if(!$conteudos->isEmpty())
            @foreach ($conteudos as $conteudo)
            <tr>
                <td>{{ $conteudo->id }}</td>
                <td>{{ $conteudo->nome }}</td>
                <td>{{ $conteudo->titulo }}</td>
                <td>{{ str_limit($conteudo->descricao) }}</td>
                <td class="editCol" ><a href="{{URL::action('ConteudoController@editar', [$conteudo->id])}}"><img width="16" height="16" src="{{asset('images/admin/icons/control/16/edit.png')}}" title="Editar" /></a></td>
            </tr>
            @endforeach
            @endif

        </tbody>
        
    </table>
    
</div>
{{$conteudos->links()}}
@stop