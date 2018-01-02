@extends('admin.layouts.admin-layout')
@section('content')
<div class="widget">
    <div class="title"><a href="{{URL::action('UsuariosController@novo')}}"><img width="16" height="16" src="{{asset('images/admin/icons/control/16/hire-me.png')}}" alt="" class="titleIcon2" title="Adicionar"/></a>
        <h6 style="vertical-align: middle"><a href="{{URL::action('UsuariosController@novo')}}">Adicionar Usuário</a></h6>
    </div>
    <table cellpadding="0" cellspacing="0" width="100%" class="sTable" id="res1">
        <thead>
            <tr>
                <td class="sortCol"><div>ID<span></span></div></td>
                <td class="sortCol"><div>Nome<span></span></div></td>
                <td class="sortCol"><div>E-mail<span></span></div></td>
                <td style="width: 100px" colspan="2"><div>Ações<span></span></div></td>
            </tr>
        </thead>
        <tbody>
            @if(!$usuarios->isEmpty())
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nome }}</td>
                <td>{{ $usuario->email }}</td>
                <td class="editCol" ><a href="{{URL::action('UsuariosController@editar', [$usuario->id])}}"><img width="16" height="16" src="{{asset('images/admin/icons/control/16/edit.png')}}" title="Editar" /></a></td>
                <td class="editCol" ><a class="del" href="{{URL::action('UsuariosController@delete', [$usuario->id])}}"><img width="16" height="16" src="{{asset('images/admin/icons/control/16/busy.png')}}" title="Excluir" /></a></td>
            </tr>
            @endforeach
            @endif

        </tbody>
        
    </table>
    
</div>
{{$usuarios->links()}}
@stop