<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Arquivos\Temp as ArquivoTemp;
use App\Arquivos\DocumentoImpostoRenda;

class ImpostoRendaController extends BaseController
{

    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function index()
    {
        $ano_anterior = date('Y', strtotime(date('Y') . " -1 year"));
        $declaracao = ImpostoRenda::where('exercicio', '=', $ano_anterior)->where('id_usuario', '=', Auth::id())->first();
        return View::make('central_cliente.imposto_renda.index')->with(['menu' => 'conteudo', 'declaracao' => $declaracao, 'ano_anterior' => $ano_anterior]);
    }

    public function view()
    {
        $ano_anterior = date('Y', strtotime(date('Y') . " -1 year"));
        $declaracao = ImpostoRenda::where('exercicio', '=', $ano_anterior)->where('id_usuario', '=', Auth::id())->first();
        return View::make('central_cliente.imposto_renda.documentos.visualizar')->with(['menu' => 'conteudo', 'declaracao' => $declaracao, 'ano_anterior' => $ano_anterior]);
    }

    public function validate()
    {
        $dados = Input::all();
        if (ImpostoRenda::validate($dados)) {
            return Response::json(['status' => 'ok'], 200);
        }
        return Response::json(['status' => 'erro', 'erros' => ImpostoRenda::getValidationErrors()], 400);

    }

    public function createEnviarDocumentos()
    {
        $ano_anterior = date('Y', strtotime(date('Y') . " -1 year"));
        $declaracao = ImpostoRenda::where('exercicio', '=', $ano_anterior)->where('id_usuario', '=', Auth::user()->id)->first();
        if ($declaracao instanceof ImpostoRenda) {
            return Redirect::back();
        }
        return View::make('central_cliente.imposto_renda.documentos.enviar_documentos')->with(['menu' => 'conteudo', 'ano_anterior' => $ano_anterior]);
    }

    public function storeEnviarDocumentos()
    {
        $dados = Input::all();
        DB::beginTransaction();

        try {
            //declaracao
            $declaracao = new ImpostoRenda();
            $declaracao->id_usuario = Auth::user()->id;
            $declaracao->exercicio = date('Y', strtotime(date('Y') . " -1 year"));
            $declaracao->status = 'pendente';
            $declaracao->save();

            foreach ($dados as $k => $dado) {
                if (is_array($dado)) { //verifica se dado do contribuinte eh um documento ou um dependente

                    if ($k == 'dependente') { //caso seja um dependente, itere

                        foreach ($dado as $array) { // iterando dependente
                            $dependente = new DependenteIr();
                            $dependente->id_declaracao_ir = $declaracao->id;
                            $dependente->save();
                            foreach ($array as $i => $v) {//iterando informaçoes do dependente
                                if (is_array($v)) {//verifica se é um documento do dependente
                                    foreach ($v as $value) { //itera os documentos
                                        $documento = new DocumentoDependenteIr();
                                        $documento->id_dependente_declaracao_ir = $dependente->id;
                                        $documento->descricao = $value['descricao'];
                                        $documento->documento = $value['documento'];
                                        $documento->save();
                                        $ext = pathinfo($value['documento'], PATHINFO_EXTENSION);
                                        if ($ext) {
                                            DocumentoImpostoRenda::moveFromTemp($value['documento']);
                                        }
                                    }
                                } else { //se for uma informacao
                                    if ($i == 'nome') {
                                        $dependente->nome = $v;
                                    }
                                    if ($i == 'tipo_dependente') {
                                        $dependente->id_tipo_dependente = $v;
                                    }
                                    if ($i == 'data_nascimento') {
                                        $dependente->data_nascimento = $v;
                                    }
                                    if ($i == 'cpf') {
                                        $documento = new DocumentoDependenteIr();
                                        $documento->id_dependente_declaracao_ir = $dependente->id;
                                        $documento->descricao = 'CPF';
                                        $documento->documento = $v;
                                        $documento->save();
                                    }
                                    if ($i == 'rg') {
                                        $documento = new DocumentoDependenteIr();
                                        $documento->id_dependente_declaracao_ir = $dependente->id;
                                        $documento->descricao = 'RG';
                                        $documento->documento = $v;
                                        $documento->save();
                                    }
                                    $ext = pathinfo($v, PATHINFO_EXTENSION);
                                    if ($ext) {
                                        DocumentoImpostoRenda::moveFromTemp($v);
                                    }
                                }
                            }
                            $dependente->save();
                        }
                    } elseif ($k == 'documentos') {
                        foreach ($dado as $doc) {
                            $documento = new DocumentoIr();
                            $documento->id_declaracao_ir = $declaracao->id;
                            $documento->descricao = $doc['descricao'];
                            $documento->documento = $doc['documento'];
                            $documento->save();
                            $ext = pathinfo($doc['documento'], PATHINFO_EXTENSION);
                            if ($ext) {
                                DocumentoImpostoRenda::moveFromTemp($doc['documento']);
                            }
                        }
                    }
                } else {
                    if ($k == 'titulo_eleitor') {
                        $documento = new DocumentoIr();
                        $documento->id_declaracao_ir = $declaracao->id;
                        $documento->descricao = 'Título de Eleitor';
                        $documento->documento = $dado;
                        $documento->save();
                    }
                    if ($k == 'cpf') {
                        $documento = new DocumentoIr();
                        $documento->id_declaracao_ir = $declaracao->id;
                        $documento->descricao = 'CPF';
                        $documento->documento = $dado;
                        $documento->save();
                    }
                    if ($k == 'rg') {
                        $documento = new DocumentoIr();
                        $documento->id_declaracao_ir = $declaracao->id;
                        $documento->descricao = 'RG';
                        $documento->documento = $dado;
                        $documento->save();
                    }
                    if ($k == 'comprovante_residencia') {
                        $documento = new DocumentoIr();
                        $documento->id_declaracao_ir = $declaracao->id;
                        $documento->descricao = 'Comprovante de Residencia';
                        $documento->documento = $dado;
                        $documento->save();
                    }
                    if ($k == 'recibo_declaracao') {
                        $documento = new DocumentoIr();
                        $documento->id_declaracao_ir = $declaracao->id;
                        $documento->descricao = 'Cópia do recibo da declaração';
                        $documento->documento = $dado;
                        $documento->save();
                    }
                    if ($k == 'declaracao') {
                        $documento = new DocumentoIr();
                        $documento->id_declaracao_ir = $declaracao->id;
                        $documento->descricao = 'Cópia da declaração';
                        $documento->documento = $dado;
                        $documento->save();
                    }
                    if ($k == 'ocupacao_descricao') {
                        $ocupacao = new OcupacaoIr();
                        $ocupacao->id_declaracao_ir = $declaracao->id;
                        $ocupacao->id_ocupacao = $dados['ocupacao'];
                        $ocupacao->descricao = $dado;
                        $ocupacao->save();
                    }
                    $ext = pathinfo($dado, PATHINFO_EXTENSION);
                    if ($ext) {
                        DocumentoImpostoRenda::moveFromTemp($dado);
                    }
                }

            }
            $declaracao->abrirOrdemPagamento(70);


            DB::commit();

        } catch (Exception $e) {
            return Redirect::back()->withInput()->withErrors(['Ocorreu um erro interno ao tentar enviar a declaração, por favor tente novamente mais tarde ou entre em contato conosco']);
            DB::rollback();
        }

        $usuario = Auth::user();
        try {
            Mail::send('central_cliente.emails.enviar_documentos', ['nome' => $usuario->nome], function ($message) use ($usuario) {
                $message->from('no-reply@i9ge.com.br', 'i9GE Gestão e Contabilidade');
                $message->subject('Recebemos seus documentos');
                $message->to($usuario->email);
            });
            Mail::send('central_cliente.emails.documentos_enviados', ['nome' => $usuario->nome, 'idDeclaracao' => $declaracao->id], function ($message) {
                $message->from('no-reply@i9ge.com.br', 'i9GE Gestão e Contabilidade');
                $message->subject('Nova declaração de imposto de renda');
                $message->to('silmara@i9ge.com.br');
            });
        } catch (Exception $e) {
            Logger::error($e->getMessage());
        }

        return Redirect::route('imposto-renda-pagamento');
    }

    public function removeUpload()
    {
        ArquivoTemp::remove(Input::get('fileName'));
    }

    public function payment()
    {
        $declaracao = ImpostoRenda::where('id_usuario', '=', Auth::id())->orderBy('created_at', 'desc')->first();
        if ($declaracao instanceof ImpostoRenda) {
            $botao_pagamento = $declaracao->botaoPagamento();
            return View::make('central_cliente.imposto_renda.pagamento')->with(['menu' => 'conteudos', 'botao_pagamento' => $botao_pagamento]);
        }
        return Redirect::route('imposto-renda-index');
    }

    public function upload()
    {
        $arquivo = new ArquivoTemp(Input::file('documento'));
        if (count($arquivo->getErros())) {
            return Response::json(['status' => 'erro', 'erros' => $arquivo->getErros()], 400);
        }
        return Response::json(['status' => 'ok', 'documento' => $arquivo->getNomeArquivo()], 200);
    }

    public function editar($id)
    {
        $objConteudo = Conteudo::find($id);
        return View::make('admin.conteudo.editar')->with(['menu' => 'conteudos', 'conteudo' => $objConteudo]);
    }

    public function update($id)
    {
        $objConteudo = Conteudo::find($id);
        $dados = Input::all();
        if ($objConteudo->isValid($dados)) {
            $objConteudo->update($dados);
            return Redirect::to('/admin/conteudo')->with(['message' => ['msg' => 'Conteúdo editado com sucesso', 'title' => 'Sucesso'], 'menu' => 'conteudos']);
        }
        return Redirect::back()->withInput()->withErrors($objConteudo->errors);
    }

    public function indexAdmin()
    {
        $declaracoes = ImpostoRenda::orderBy('created_at', 'desc')->paginate(15);
        return View::make('admin.imposto_renda.index')->with(['menu' => 'imposto_renda', 'declaracoes' => $declaracoes]);
    }

    public function editAdmin($id)
    {
        $declaracao = ImpostoRenda::findOrFail($id);
        return View::make('admin.imposto_renda.editar')->with(['menu' => 'imposto_renda', 'declaracao' => $declaracao]);
    }

    public function updateAdmin($id)
    {

        if (!Input::hasFile('declaracao') || !Input::hasFile('recibo')) {
            return Redirect::back()->withInput()->withErrors(['É necessário anexar o recibo e a declaração']);
        }
        $declaracao = ImpostoRenda::findOrFail($id);
        $usuario = $declaracao->usuario;
        if ($recibo = new DocumentoImpostoRenda(Input::file('recibo'))) {
            $nomeRecibo = $recibo->getNomeArquivo();
        } else {
            return Redirect::back()->withInput()->withErrors($recibo->getErros());
        }
        if ($declaracaoDoc = new DocumentoImpostoRenda(Input::file('declaracao'))) {
            $nomeDeclaracao = $declaracaoDoc->getNomeArquivo();
        } else {
            return Redirect::back()->withInput()->withErrors($declaracaoDoc->getErros());
        }
        $declaracao->declaracao = $nomeDeclaracao;
        $declaracao->recibo = $nomeRecibo;
        $declaracao->status = Input::get('status');
        $declaracao->save();
        if (Input::get('status') == 'concluido') {
            try {
                Mail::send('central_cliente.emails.declaracao_disponivel', ['nome' => $usuario->nome], function ($message) use ($usuario) {
                    $message->from('no-reply@i9ge.com.br', 'i9GE Gestão e Contabilidade');
                    $message->subject('Sua declaração foi concluída');
                    $message->to($usuario->email);
                });
            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
        }

        return Redirect::route('imposto-renda-admin-index')->with(['message' => ['msg' => 'Declaração atualizada com sucesso', 'title' => 'Sucesso'], 'menu' => 'imposto-renda']);
    }
}
