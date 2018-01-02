@extends('admin.layouts.login-layout')
@section('content')
<br />

<div class="widget">
    <div class="title">{{ HTML::image('images/admin/icons/dark/files.png', '', ['class'=>'titleIcon'])}}<h6>Painel de Login</h6></div>
    {{Form::open(array('action' => 'SessionsController@store', 'class'=>'form', 'id'=>'validate'))}}

    <fieldset>
        <div class="formRow">
            {{Form::label('email', 'Usuário:')}}
            <div class="loginInput">
                {{Form::text('email','',['class'=>'validate[required]', 'id'=>'email'])}}
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
            {{Form::label('pass', 'Senha:')}}
            <div class="loginInput">
                {{Form::password('senha',['class'=>'validate[required]', 'id'=>'pass'])}}
            </div>
            <div class="clear"></div>
        </div>

        <div class="loginControl">
            {{Form::submit('Entrar',[ 'class'=>'dredB logMeIn'])}}
            <div class="clear"></div>
        </div>
    </fieldset>
    {{ Form::close() }}
</div>
@stop

