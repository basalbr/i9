@extends('admin.layouts.admin-layout')
@section('content')
    {{Form::open(array('class'=>'form', 'id'=>'validate', 'autocomplete'=>'off', 'files'=>true))}}
    @if($errors->has())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <div class="pageTitle">
        <h5>Informações e Documentos do Declarante</h5>
    </div>
    <div class="widget">
        <div class="title"><img src="{{ asset(public_path().'images/admin/icons/dark/list.png')}}" alt=""
                                class="titleIcon"/><h6>Declarante</h6></div>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable" id="res1">
            <thead>
            <tr>
                <td class="sortCol">
                    <div>Descrição<span></span></div>
                </td>
                <td class="sortCol">
                    <div>Informação<span></span></div>
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><strong>Exercício</strong></td>
                <td>{{$declaracao->exercicio}}</td>
            </tr>
            <tr>
                <td><strong>Data de Envio</strong></td>
                <td>{{$declaracao->created_at->format('d/m/Y à\s H:i')}}</td>
            </tr>
            <tr>
                <td><strong>Nome</strong></td>
                <td>{{$declaracao->usuario->nome}}</td>
            </tr>
            <tr>
                <td><strong>E-mail</strong></td>
                <td>{{$declaracao->usuario->email}}</td>
            </tr>
            <tr>
                <td><strong>Telefone</strong></td>
                <td>{{$declaracao->usuario->telefone}}</td>
            </tr>
            <tr>
                <td><strong>Ocupação</strong></td>
                <td title="{{$declaracao->ocupacao->tipo->descricao}}">{{$declaracao->ocupacao->tipo->descricao}}</td>
            </tr>
            <tr>
                <td><strong>Descrição da Ocupação</strong></td>
                <td>{{$declaracao->ocupacao->descricao}}</td>
            </tr>

            <tr>
                <td><strong>Status da Declaração</strong></td>
                <td>{{$declaracao->statusFormatado()}}</td>
            </tr>
            <tr>
                <td><strong>Status do Pagamento</strong></td>
                <td>{{$declaracao->ordemPagamento()->status}}</td>
            </tr>
            </tbody>

        </table>
    </div>
    <div class="widget">
        <div class="title"><img src="{{ asset(public_path().'images/admin/icons/dark/list.png')}}" alt=""
                                class="titleIcon"/><h6>Documentos do declarante</h6></div>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable" id="res1">
            <thead>
            <tr>
                <td class="sortCol">
                    <div>Descrição<span></span></div>
                </td>
                <td class="sortCol">
                    <div>Download<span></span></div>
                </td>
            </tr>
            </thead>
            <tbody>
            @if($declaracao->documentos->count())
                @foreach($declaracao->documentos as $documento)
                    <tr>
                        <td><strong>{{$documento->descricao}}</strong></td>
                        <td><a href="{{asset(public_path().'uploads/documentos_imposto_renda/'.$documento->documento)}}"
                               class="blueBack" target="_blank" download><span>Download</span></a></td>
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
            <div class="pageTitle">
                <h5>Informações e Documentos do Dependente {{$dependente->nome}}</h5>
            </div>
            <div class="widget">
                <div class="title"><img src="{{ asset(public_path().'images/admin/icons/dark/list.png')}}" alt=""
                                        class="titleIcon"/><h6>Informações de {{$dependente->nome}}</h6></div>

                <table cellpadding="0" cellspacing="0" width="100%" class="sTable" id="res1">
                    <thead>
                    <tr>
                        <td class="sortCol">
                            <div>Descrição<span></span></div>
                        </td>
                        <td class="sortCol">
                            <div>Informação<span></span></div>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><strong>Nome</strong></td>
                        <td>{{$dependente->nome}}</td>
                    </tr>
                    <tr>
                        <td><strong>Data de Nascimento</strong></td>
                        <td>{{$dependente->data_nascimento}}</td>
                    </tr>
                    </tbody>

                </table>
            </div>
            @if($dependente->documentos->count())
                <div class="widget">
                    <div class="title"><img src="{{ asset(public_path().'images/admin/icons/dark/list.png')}}"
                                            alt=""
                                            class="titleIcon"/><h6>Documentos de {{$dependente->nome}}</h6></div>

                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable" id="res1">
                        <thead>
                        <tr>
                            <td class="sortCol">
                                <div>Descrição<span></span></div>
                            </td>
                            <td class="sortCol">
                                <div>Download<span></span></div>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dependente->documentos as $documento)
                            <tr>
                                <td><strong>{{$documento->descricao}}</strong></td>
                                <td>
                                    <a href="{{asset(public_path().'uploads/documentos_imposto_renda/'.$documento->documento)}}"
                                       class="blueBack" target="_blank" download><span>Download</span></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        @endforeach
    @endif
    <br/>
    <div class="widget">
        <div class="title"><img src="{{ asset(public_path().'images/admin/icons/dark/list.png')}}" alt="" class="titleIcon"/><h6>
                Alterar Status e enviar Documentos</h6></div>
        <input type="hidden" name="_csrf_token" value="{{csrf_token()}}"/>
        <div class="formRow">
            {{Form::label('recibo', 'Recibo:')}}
            <div class="formRight">
                {{Form::file('recibo','',['id'=>'recibo'])}}
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            {{Form::label('declaracao', 'Declaração:')}}
            <div class="formRight">
                {{Form::file('declaracao','',['id'=>'declaracao'])}}
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            {{Form::label('status', 'Status:')}}
            <div class="formRight">
                <select name="status">
                    <option value="pendente" {{$declaracao->status == 'pendente' ? 'selected' : ''}}>Pendente</option>
                    <option value="cancelado" {{$declaracao->status == 'cancelado' ? 'selected' : ''}}>Cancelado</option>
                    <option value="concluido" {{$declaracao->status == 'concluido' ? 'selected' : ''}}>Concluído</option>
                </select>
            </div>
            <div class="clear"></div>
        </div>


    </div>
    <br/>

    <div class="formErrorArrow">

        <input id='voltar' type="button" value="Voltar" class="redB">
        <input type="submit" value="Salvar" style="float: right" class="greenB">
    </div>
    <script>
        jQuery(document).ready(function () {
            jQuery('#descricao').cleditor();
        });
    </script>
    {{Form::close()}}
@stop

