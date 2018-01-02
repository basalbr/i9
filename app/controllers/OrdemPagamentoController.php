<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Arquivos\Temp as ArquivoTemp;
use App\Arquivos\DocumentoImpostoRenda;

class OrdemPagamentoController extends BaseController
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
        $pagamentos = OrdemPagamento::where('id_usuario','=',Auth::id())->orderBy('created_at')->get();
        return View::make('central_cliente.ordem_pagamento.index')->with(['menu' => 'conteudo', 'pagamentos' => $pagamentos]);
    }

}
