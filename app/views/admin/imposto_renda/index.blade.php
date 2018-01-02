@extends('admin.layouts.admin-layout')
@section('content')
<div class="widget">
    <table cellpadding="0" cellspacing="0" width="100%" class="sTable" id="res1">
        <thead>
            <tr>
                <td class="sortCol"><div>Declarante<span></span></div></td>
                <td class="sortCol"><div>Exercício<span></span></div></td>
                <td class="sortCol"><div>Status Pagamento<span></span></div></td>
                <td class="sortCol"><div>Status Declaração<span></span></div></td>
                <td style="width: 80px"><div>Ações<span></span></div></td>
            </tr>
        </thead>
        <tbody>
            @if(!$declaracoes->isEmpty())
            @foreach ($declaracoes as $declaracao)
            <tr>
                <td>{{ $declaracao->usuario->nome }}</td>
                <td>{{ $declaracao->exercicio }}</td>
                <td>{{ $declaracao->ordemPagamento()->status }}</td>
                <td>{{ $declaracao->statusFormatado()}}</td>
                <td class="editCol" ><a href="{{URL::route('imposto-renda-admin-editar', [$declaracao->id])}}"><img width="16" height="16" src="{{asset(public_path().'images/admin/icons/control/16/edit.png')}}" title="Editar" /></a></td>
            </tr>
            @endforeach
            @endif

        </tbody>
        
    </table>
    
</div>
{{$declaracoes->links()}}
@stop