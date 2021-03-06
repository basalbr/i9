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
    <div class="formRow">
        {{Form::label('user_id', 'ID:')}}
        <div class="formRight">
            {{Form::text('user_id',$noticia->id,['class'=>'validate[required]', 'id'=>'user_id','disabled'])}}
        </div>
        <div class="clear"></div>
    </div>

    <div class="formRow">
        {{Form::label('nome', 'Título:')}}
        <div class="formRight">
            {{Form::text('nome',$noticia->nome,['class'=>'validate[required]', 'id'=>'nome'])}}
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        {{Form::label('descricao', 'Descrição:')}}
        <div class="formRight">
            {{Form::textarea('descricao',$noticia->descricao,['class'=>'validate[required]', 'id'=>'descricao'])}}
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
            {{ HTML::image('uploads/'.$noticia->thumb) }}
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        {{Form::label('created_at', 'Data de publicação:')}}
        <div class="formRight">
            {{Form::text('created_at',date("d/m/Y",strtotime($noticia->created_at)),['class'=>'validate[required]', 'id'=>'created_at'])}}
        </div>
        <div class="clear"></div>
    </div>

</div>
<br />

<div class="formErrorArrow">

    <input id='voltar' type="button" value="Voltar" class="redB">
    <input type="submit" value="Salvar" style="float: right" class="greenB">
</div>
<script>
    jQuery(document).ready(function(){
       jQuery('#descricao').cleditor(); 
    });
</script>
{{Form::close()}}
@stop

