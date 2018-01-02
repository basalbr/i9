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
            {{Form::text('user_id',$usuario->id,['class'=>'validate[required]', 'id'=>'user_id','disabled'])}}
        </div>
        <div class="clear"></div>
    </div>

    <div class="formRow">
        {{Form::label('nome', 'Nome:')}}
        <div class="formRight">
            {{Form::text('nome',$usuario->nome,['id'=>'nome'])}}
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        {{Form::label('email', 'E-mail:')}}
        <div class="formRight">
            {{Form::text('email',$usuario->email,['class'=>'validate[required,custom[email]]', 'id'=>'email'])}}
        </div>
        <div class="clear"></div>
    </div>

    <div class="formRow">
        {{Form::label('senha', 'Senha:')}}
        <div class="formRight">
            {{Form::password('senha',['class'=>'validate[required,equals[confirmar_senha]]', 'id'=>'senha'])}}
        <span>*Deixe em branco para não alterar</span>
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        {{Form::label('confirmar_senha', 'Confirmar Senha:')}}
        <div class="formRight">
            {{Form::password('confirmar_senha',['class'=>'validate[required]', 'id'=>'confirmar_senha'])}}
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

