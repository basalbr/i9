@extends('admin.layouts.admin-layout')
@section('content')
{{Form::open(array('class'=>'form', 'id'=>'validate', 'autocomplete'=>'off'))}}
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
            {{Form::text('user_id',$conteudo->id,['class'=>'validate[required]', 'id'=>'user_id','disabled'])}}
        </div>
        <div class="clear"></div>
    </div>

    <div class="formRow">
        {{Form::label('nome', 'Nome:')}}
        <div class="formRight">
            {{Form::text('nome',$conteudo->nome,['id'=>'nome', 'disabled'])}}
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        {{Form::label('titulo', 'Título:')}}
        <div class="formRight">
            {{Form::text('titulo',$conteudo->titulo,['id'=>'titulo','class'=>'validate[required]'])}}
        </div>
        <div class="clear"></div>
    </div>
     <div class="formRow">
        {{Form::label('descricao', 'Descrição:')}}
        <div class="formRight">
            {{Form::textarea('descricao',$conteudo->descricao,['id'=>'descricao','class'=>'validate[required]'])}}
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

