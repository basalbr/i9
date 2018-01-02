<?php
/**
 * Created by PhpStorm.
 * User: Junior
 * Date: 10/02/2017
 * Time: 22:53
 */

use PagSeguro\Library;
use PagSeguro\Domains\Requests\Payment;
use PagSeguro\Configuration\Configure;

class ImpostoRendaPaymentRequest
{

    private $payment;
    private $ordemPagamentoId;
    private $price;
    private $ordemPagamento;

    public function __construct($ordemPagamentoId)
    {
        Library::initialize();
        Library::cmsVersion()->setName("i9ge.com.br")->setRelease("1.0.0");
        Library::moduleVersion()->setName("i9ge.com.br")->setRelease("1.0.0");
        $this->payment = new Payment();
        $this->ordemPagamentoId = $ordemPagamentoId;
        $this->setOrdemPagamento();
        $this->setPrice();
        $this->addItem();
        $this->setReference();
        $this->setSender();
        $this->setCurrency();
        $this->setPaymentRedirectUrl(route('imposto-renda-index'));
        $this->setNotificationUrl(route('pagseguro-notification'));
    }

    public function setOrdemPagamento()
    {
        $this->ordemPagamento = OrdemPagamento::find($this->ordemPagamentoId);
    }

    public function setPrice()
    {
        $this->price = $this->ordemPagamento->valor;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function addItem()
    {
        $this->payment->addItems()->withParameters($this->ordemPagamentoId, utf8_decode('Declaração do Imposto de Renda'), 1, $this->getPrice());
    }

    public function setCurrency()
    {
        $this->payment->setCurrency('BRL');
    }

    public function setPaymentRedirectUrl($url)
    {
        $this->payment->setNotificationUrl($url);
    }

    public function setReference()
    {
        $this->payment->setReference($this->ordemPagamentoId);
    }

    public function setNotificationUrl($url)
    {
        $this->payment->setNotificationUrl($url);
    }

    public function setSender()
    {
        $this->payment->setSender()->setEmail($this->ordemPagamento->usuario->email);
    }

    public function checkout()
    {
        return $result = $this->payment->register(
            Configure::getAccountCredentials()
        );
    }
}