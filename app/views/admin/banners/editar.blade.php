@extends('admin.layouts.admin-layout')
@section('content')
{{Form::open(array('class'=>'form', 'id'=>'validate', 'autocomplete'=>'off', 'files'=>true))}}
@if($errors->has())
@foreach ($errors->all() as $error)
<div>{{ $error }}</div>
@endforeach
@endif
<div class="widget">
    <div class="title"><img src="{{ asset('images/admin/icons/dark/list.png')}}" alt="" class="titleIcon" /><h6>Edite os campos abaixo</h6></div>
    <div class="title"><img src="{{ asset('images/admin/icons/dark/list.png')}}" alt="" class="titleIcon" /><h6>Edite os campos abaixo</h6></div>
    <div class="formRow">
        {{Form::label('titulo', 'Título:')}}
        <div class="formRight">
            {{Form::text('titulo',$banner->titulo,['class'=>'validate[required]', 'id'=>'titulo'])}}
        </div>
        <div class="clear"></div>
    </div>

    <div class="formRow">
        {{Form::label('url', 'Url:')}}
        <div class="formRight">
            {{Form::text('url',$banner->url,['class'=>'validate[required, custom[url]]', 'id'=>'url'])}}
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        {{Form::label('imagem', 'Imagem:')}}
        <div class="formRight">
            {{Form::file('imagem','',['id'=>'imagem'])}}
            <span>*Deixe em branco para não alterar</span>
            <br />
            <br />
            {{ HTML::image('uploads/'.$banner->imagem, '', ['style'=>'max-width: 380px;']) }}
        </div>
        <div class="clear"></div>
    </div>

    <div class="formRow">
        {{Form::label('ordem', 'Ordem:')}}
        <div class="formRight">
            {{Form::text('ordem',$banner->ordem,['class'=>'validate[required]', 'id'=>'ordem'])}}
        </div>
        <div class="clear"></div>
    </div>
	
	<div class="formRow">
        {{Form::label('duracao', 'Duração (ms):')}}
        <div class="formRight">
            {{Form::text('duracao',$banner->duracao,['class'=>'validate[required]', 'id'=>'duracao'])}}
        </div>
        <div class="clear"></div>
    </div>

</div>
<br />

<div class="formErrorArrow">

    <input id='voltar' type="button" value="Voltar" class="redB">
    <input type="submit" value="Salvar" style="float: right" class="greenB">
</div>
{{Form::close()}}
@stop

