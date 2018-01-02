@extends('admin.layouts.admin-layout')
@section('content')
<div class="widget">
    <div class="title"><a href="{{URL::action('NoticiasController@novo')}}"><img width="16" height="16" src="{{asset('images/admin/icons/control/16/hire-me.png')}}" alt="" class="titleIcon2" title="Adicionar"/></a>
        <h6 style="vertical-align: middle"><a href="{{URL::action('NoticiasController@novo')}}">Adicionar Notícia</a></h6>
    </div>
    <table cellpadding="0" cellspacing="0" width="100%" class="sTable" id="res1">
        <thead>
            <tr>
                <td class="sortCol"><div>ID<span></span></div></td>
                <td class="sortCol"><div>Título<span></span></div></td>
                <td class="sortCol"><div>Descrição<span></span></div></td>
                <td class="sortCol" style="width: 340px"><div>Imagem<span></span></div></td>
                <td class="sortCol"><div>Criado em<span></span></div></td>
                <td style="width: 80px" colspan="2"><div>Ações<span></span></div></td>
            </tr>
        </thead>
        <tbody>
            @if(!$noticias->isEmpty())
            @foreach ($noticias as $noticia)
            <tr>
                <td>{{ $noticia->id }}</td>
                <td>{{ $noticia->nome }}</td>
                <td>{{ htmlentities(str_limit($noticia->descricao)) }}</td>
                <td><img src="{{url(public_path().'uploads/'.$noticia->thumb)}}" /></td>
                <td>{{ date("d/m/Y",strtotime($noticia->created_at)) }}</td>
                <td class="editCol" ><a href="{{URL::action('NoticiasController@editar', [$noticia->id])}}"><img width="16" height="16" src="{{asset('images/admin/icons/control/16/edit.png')}}" title="Editar" /></a></td>
                <td class="editCol" ><a class="del" href="{{URL::action('NoticiasController@delete', [$noticia->id])}}"><img width="16" height="16" src="{{asset('images/admin/icons/control/16/busy.png')}}" title="Excluir" /></a></td>
            </tr>
            @endforeach
            @endif

        </tbody>
        
    </table>
    
</div>
{{$noticias->links()}}
@stop