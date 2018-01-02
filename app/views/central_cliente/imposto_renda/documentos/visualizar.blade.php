@extends('central_cliente.layouts.master')
@extends('central_cliente.imposto_renda.menu')
@section('content')

    @parent

    <div class="content-fluid">
        <div class="col-xs-12">
            <div class="card">
                @if($declaracao->declaracao && $declaracao->recibo && $declaracao->status == 'concluido')
                    <h3>Declaração e Recibo</h3>
                    <div class="col-xs-12">
                        Sua declaração foi realizada com sucesso, para baixar a declaração ou o recibo selecione uma das
                        opções abaixo:
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <a class="btn btn-primary"
                               href="{{asset(public_path().'uploads/documentos_imposto_renda/'.$declaracao->declaracao)}}">Baixar
                                Declaração</a>
                            <a class="btn btn-primary"
                               href="{{asset(public_path().'uploads/documentos_imposto_renda/'.$declaracao->recibo)}}">Baixar
                                Recibo</a>
                        </div>
                    </div>
                @endif
                <h3>Suas informações e documentos</h3>
                <div class="form-section">
                    <h4>Informações do Declarante</h4>
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>
                                Descrição
                            </th>
                            <th>
                                Informação
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Exercício</td>
                            <td>{{$declaracao->exercicio}}</td>
                        </tr>
                        <tr>
                            <td>Data de Envio</td>
                            <td>{{$declaracao->created_at->format('d/m/Y à\s H:i')}}</td>
                        </tr>
                        <tr>
                            <td>Nome</td>
                            <td>{{$declaracao->usuario->nome}}</td>
                        </tr>
                        <tr>
                            <td>Ocupação</td>
                            <td title="{{$declaracao->ocupacao->tipo->descricao}}">{{$declaracao->ocupacao->tipo->descricao}}</td>
                        </tr>
                        <tr>
                            <td>Descrição da Ocupação</td>
                            <td>{{$declaracao->ocupacao->descricao}}</td>
                        </tr>

                        <tr>
                            <td>Status da Declaração</td>
                            <td>{{$declaracao->statusFormatado()}}</td>
                        </tr>
                        <tr>
                            <td>Status do Pagamento</td>
                            <td>{{$declaracao->ordemPagamento()->status}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-section">
                    <h4>Documentos do Declarante</h4>
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>
                                Descrição
                            </th>
                            <th>
                                Download
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($declaracao->documentos->count())
                            @foreach($declaracao->documentos as $documento)
                                <tr>
                                    <td>{{$documento->descricao}}</td>
                                    <td>
                                        <a href="{{asset(public_path().'uploads/documentos_imposto_renda/'.$documento->documento)}}"
                                           class="btn btn-complete" target="_blank" download>Download</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>Nenhum documento enviado</tr>
                        @endif
                        </tbody>
                    </table>
                </div>

                @if($declaracao->dependentes->count())

                    @foreach($declaracao->dependentes as $dependente)
                        <h3>Informações e documentos de {{$dependente->nome}}</h3>
                        <div class="form-section">
                            <h4>Informações do Dependente {{$dependente->nome}}</h4>
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        Descrição
                                    </th>
                                    <th>
                                        Informação
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Nome</td>
                                    <td>{{$dependente->nome}}</td>
                                </tr>
                                <tr>
                                    <td>Data de Nascimento</td>
                                    <td>{{$dependente->data_nascimento}}</td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                        @if($dependente->documentos->count())
                            <div class="form-section">
                                <h4>Documentos de {{$dependente->nome}}</h4>
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>
                                            Descrição
                                        </th>
                                        <th>
                                            Download
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dependente->documentos as $documento)
                                        <tr>
                                            <td>{{$documento->descricao}}</td>
                                            <td>
                                                <a href="{{asset(public_path().'uploads/documentos_imposto_renda/'.$documento->documento)}}"
                                                   class="btn btn-complete" target="_blank"
                                                   download>Download</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @endforeach
                @endif

                <div class="form-group">
    <a class="btn btn-primary" href="{{URL::previous()}}"><span class="fa fa-caret-left"></span> Voltar</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@stop