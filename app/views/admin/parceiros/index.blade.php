@extends('admin.layouts.admin-layout')
@section('content')
<div class="widget">
    <div class="title"><a href="{{URL::action('ParceirosController@novo')}}"><img width="16" height="16" src="{{asset('images/admin/icons/control/16/hire-me.png')}}" alt="" class="titleIcon2" title="Adicionar"/></a>
        <h6 style="vertical-align: middle"><a href="{{URL::action('ParceirosController@novo')}}">Adicionar Parceiro</a></h6>
    </div>
    <table cellpadding="0" cellspacing="0" width="100%" class="sTable" id="res1">
        <thead>
            <tr style="overflow: hidden">
                <th class="sortCol"><div>Ordem<span></span></div></th>
        <th class="sortCol"><div>Nome<span></span></div></th>
        <th class="sortCol"><div>URL<span></span></div></th>
        <th class="sortCol" style="width: 340px"><div>Imagem<span></span></div></th>
        <th style="width: 120px" colspan="2"><div>Ações<span></span></div></th>
        </tr>
        </thead>
        <tbody>
            @if(!$parceiros->isEmpty())
            @foreach ($parceiros as $parceiro)
            <tr>
                <td>{{ $parceiro->ordem }}</td>
                <td>{{ $parceiro->nome }}</td>
                <td>{{ $parceiro->url }}</td>
                <td>{{ HTML::image('uploads/'.$parceiro->imagem, '$parceiro->titulo', array('style'=>'max-width: 319px')) }}</td>
                <td class="editCol" ><a href="{{URL::action('ParceirosController@editar', [$parceiro->id])}}"><img width="16" height="16" src="{{asset('images/admin/icons/control/16/edit.png')}}" title="Editar" /></a></td>
                <td class="editCol" ><a class="del" href="{{URL::action('ParceirosController@delete', [$parceiro->id])}}"><img width="16" height="16" src="{{asset('images/admin/icons/control/16/busy.png')}}" title="Excluir" /></a></td>
            </tr>
            @endforeach
            @endif

        </tbody>

    </table>

</div>
{{$parceiros->links()}}
@stop