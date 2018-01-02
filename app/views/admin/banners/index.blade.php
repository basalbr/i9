@extends('admin.layouts.admin-layout')
@section('content')
<div class="widget">
    <div class="title"><a href="{{URL::action('BannersController@novo')}}"><img width="16" height="16" src="{{asset('images/admin/icons/control/16/hire-me.png')}}" alt="" class="titleIcon2" title="Adicionar"/></a>
        <h6 style="vertical-align: middle"><a href="{{URL::action('BannersController@novo')}}">Adicionar Banner</a></h6>
    </div>
    <table cellpadding="0" cellspacing="0" width="100%" class="sTable" id="res1">
        <thead>
            <tr style="overflow: hidden">
                <td class="sortCol"><div>Ordem<span></span></div></td>
                <td class="sortCol"><div>Título<span></span></div></td>
                <td class="sortCol"><div>URL<span></span></div></td>
                <td class="sortCol" style="width: 340px"><div>Imagem<span></span></div></td>
                <td class="sortCol"><div>Duração<span></span></div></td>
                <td style="width: 120px" colspan="2"><div>Ações<span></span></div></td>
            </tr>
        </thead>
        <tbody>
            @if(!$banners->isEmpty())
            @foreach ($banners as $banner)
            <tr>
                <td>{{ $banner->ordem }}</td>
                <td>{{ $banner->titulo }}</td>
                <td>{{ $banner->url }}</td>
                <td>{{ HTML::image('/uploads/'.$banner->imagem, '$banner->titulo', array('style'=>'max-width: 319px')) }}</td>
                <td>{{ $banner->duracao }}</td>
                <td class="editCol" ><a href="{{URL::action('BannersController@editar', [$banner->id])}}"><img width="16" height="16" src="{{asset('images/admin/icons/control/16/edit.png')}}" title="Editar" /></a></td>
                <td class="editCol" ><a class="del" href="{{URL::action('BannersController@delete', [$banner->id])}}"><img width="16" height="16" src="{{asset('images/admin/icons/control/16/busy.png')}}" title="Excluir" /></a></td>
            </tr>
            @endforeach
            @endif

        </tbody>

    </table>

</div>
{{$banners->links()}}
@stop