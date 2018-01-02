<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use PagSeguro\Configuration\Configure;
use PagSeguro\Helpers\Xhr;
use PagSeguro\Services\Transactions\Notification;
use PagSeguro\Library;

class PagseguroController extends BaseController
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
        Library::initialize();
        Library::cmsVersion()->setName("i9ge.com.br")->setRelease("1.0.0");
        Library::moduleVersion()->setName("i9ge.com.br")->setRelease("1.0.0");
        try {
            if (Xhr::hasPost()) {
                $nomeStatus = [
                    1=>'Aguardando pagamento',
                    2=>'Em análise',
                    3=>'Paga',
                    4=>'Disponível',
                    5=>'Em disputa',
                    6=>'Devolvida',
                    7=>'Cancelada'
                ];
                $response = Notification::check(
                    Configure::getAccountCredentials()
                );

                $ordemPagamentoId = $response->getReference();
                $transactionId = $response->getCode();
                $status = $nomeStatus[$response->getStatus()];
                $ordemPagamento = OrdemPagamento::find($ordemPagamentoId);
                $ordemPagamento->status = $status;
                $ordemPagamento->save();
                $historicoPagamento = new HistoricoPagamento;
                $historicoPagamento->id_ordem_pagamento = $ordemPagamentoId;
                $historicoPagamento->transaction_id = $transactionId;
                $historicoPagamento->status = $status;
                $historicoPagamento->save();

            } else {
                Log::error(new \InvalidArgumentException($_POST));
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

}