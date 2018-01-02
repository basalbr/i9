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
        {{Form::label('nome', 'Nome:')}}
        <div class="formRight">
            {{Form::text('nome','',['class'=>'validate[required]', 'id'=>'nome'])}}
        </div>
        <div class="clear"></div>
    </div>

    <div class="formRow">
        {{Form::label('descricao', 'Descrição:')}}
        <div class="formRight">
            {{Form::textarea('descricao','',['class'=>'validate[required]', 'id'=>'descricao'])}}
        </div>
        <div class="clear"></div>
    </div>

    <div class="formRow">
        {{Form::label('imagem', 'Imagem:')}}
        <div class="formRight">
            {{Form::file('imagem',['class'=>'validate[required]', 'id'=>'imagem'])}}
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        {{Form::label('created_at', 'Data de publicação:')}}
        <div class="formRight">
            {{Form::text('created_at','',['class'=>'validate[required]', 'id'=>'created_at'])}}
        </div>
        <div class="clear"></div>
    </div>

</div>
<br />
<script>
    jQuery(document).ready(function(){
       jQuery('#descricao').cleditor(); 
    });
</script>
<div class="formErrorArrow">
    <input id='voltar' type="button" value="Voltar" class="redB">
    <input type="submit" value="Salvar" style="float: right" class="greenB">
</div>
{{Form::close()}}
@stop

