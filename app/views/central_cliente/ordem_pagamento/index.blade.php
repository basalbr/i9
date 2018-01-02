@extends('central_cliente.layouts.master')
@extends('central_cliente.imposto_renda.menu')
@section('content')

    @parent

    <div class="content-fluid">
        <div class="col-xs-12">
            <div class="card">
                <h3>Ordens de Pagamento</h3>
                <div class="col-xs-12">
                    <p>Olá <strong>{{Auth::user()->nome}}</strong>, abaixo estão as suas ordens de pagamento.</p>
                    <p>Para efetuar um pagamento, clique no botão <strong>"efetuar pagamento"</strong>.</p>
                    <p><strong>Atenção:</strong> Se você gerou um pagamento por boleto, é possível que o pagamento
                        demore até 48 horas para ser confirmado após o boleto ser pago.</p>
                    <br/>
                    <table class="table table-stripped table-hover">
                        <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($pagamentos->count())
                            @foreach($pagamentos as $pagamento)
                                <tr>
                                    <td>Declaração de Imposto de Renda {{$pagamento->origem()->exercicio}}</td>
                                    <td>{{$pagamento->status}}</td>
                                    <td>{{$pagamento->origem()->botaoPagamento($pagamento->id)}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">Nenhum pagamento encontrado em nosso sistema</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>

                <div class="clearfix"></div>
            </div>

        </div>

    </div>
@stop