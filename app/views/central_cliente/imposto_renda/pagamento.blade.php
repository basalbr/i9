@extends('central_cliente.layouts.master')
@extends('central_cliente.imposto_renda.menu')

@section('content')

    @parent

    <div class="content-fluid">
        <div class="col-xs-12">
            <div class="card">
                <h3>Pagamento</h3>
                <div class="col-xs-12">
                    <p>Olá <strong>{{Auth::user()->nome}}</strong>, para que possamos prosseguir com a sua declaração, é
                        necessário que você efetue o pagamento de <strong>R$ 70,00</strong>.</p>
                    <p>Ao clicar no botão "efetuar pagamento" você será redirecionado para uma página de pagamento do
                        <strong>PagSeguro</strong>. Lá você poderá escolher uma entre várias opções de pagamento.</p>
                    <p>Após confirmação do seu pagamento pelo <strong>PagSeguro</strong>, nós daremos início ao processo
                        de declaração do seu imposto de renda.</p>
                    <br />
                    <div class="form-group">
                        {{$botao_pagamento}}
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@stop
