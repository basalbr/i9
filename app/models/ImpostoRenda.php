<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ImpostoRenda extends Eloquent
{
    use SoftDeletingTrait;
    public static $rules = [
        'exercicio' => 'required',
        'status' => 'required',
        'id_usuario' => 'required'
    ];
    protected $fillable = ['exercicio', 'status', 'id_usuario'];
    protected $dates = ['updated_at', 'created_at', 'deleted_at'];
    protected $niceNames = ['exercicio' => 'Exercício', 'status' => 'Status', 'id_usuario' => 'Usuário'];
    public $errors;
    private static $validationRules = [
        'recibo_declaracao' => 'sometimes',
        'declaracao' => 'sometimes',
        'cpf' => 'sometimes',
        'rg' => 'sometimes',
        'titulo_eleitor' => 'sometimes',
        'comprovante_residencia' => 'required',
        'ocupacao' => 'required',
        'ocupacao_descricao' => 'required',
        'termo' => 'required'
    ];
    private static $validationErrors;
    private static $validationNiceNames = [
        'recibo_declaracao' => 'Recibo da Declaração',
        'declaracao' => 'Cópia da Declaração',
        'cpf' => 'CPF',
        'rg' => 'RG',
        'titulo_eleitor' => 'Título de Eleitor',
        'comprovante_residencia' => 'Comprovante de Residência',
        'ocupacao' => 'Ocupação',
        'ocupacao_descricao' => 'Descrição da Ocupação',
        'termo' => 'Termo para Envio de Declaração'
    ];

    private $ordemPagamento;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'declaracao_ir';

    public function isValid($data)
    {
        $rules = static::$rules;
        $validator = Validator::make($data, $rules);
        $validator->setAttributeNames($this->niceNames);
        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->messages();
        return false;
    }

    public static function validate($data)
    {
        $rules = self::$validationRules;
        $validator = Validator::make($data, $rules);
        $validator->setAttributeNames(self::$validationNiceNames);
        if ($validator->passes()) {
            return true;
        }

        self::setValidationErrors($validator->messages()->all());
        return false;
    }

    private static function setValidationErrors($errors)
    {
        self::$validationErrors = $errors;
    }

    public static function getValidationErrors()
    {
        return self::$validationErrors;
    }

    public function dependentes()
    {
        return $this->hasMany('DependenteIr', 'id_declaracao_ir');
    }

    public function documentos()
    {
        return $this->hasMany('DocumentoIr', 'id_declaracao_ir');
    }

    public function ocupacao()
    {
        return $this->hasOne('OcupacaoIr', 'id_declaracao_ir');
    }

    public function usuario()
    {
        return $this->belongsTo('Usuario', 'id_usuario');
    }

    public function ordemPagamento()
    {
        $idOrdemPagamento = DeclaracaoIrOrdemPagamento::where('id_declaracao_ir', '=', $this->id)->select('id_ordem_pagamento')->first()->id_ordem_pagamento;
        $this->ordemPagamento = OrdemPagamento::find($idOrdemPagamento);
        return $this->ordemPagamento;
    }

    public function abrirOrdemPagamento($valor)
    {
        $ordemPagamento = new OrdemPagamento();
        $ordemPagamento->id_usuario = $this->id_usuario;
        $ordemPagamento->valor = $valor;
        $ordemPagamento->status = 'Pendente';
        $ordemPagamento->save();
        $relation = new DeclaracaoIrOrdemPagamento();
        $relation->id_declaracao_ir = $this->id;
        $relation->id_ordem_pagamento = $ordemPagamento->id;
        $relation->save();
    }

    public function statusFormatado()
    {
        switch ($this->status) {
            case 'pendente':
                return "Pendente";
                break;
            case 'cancelado':
                return "Cancelado";
                break;
            case 'concluido':
                return 'Concluído';
                break;
        }
        return false;
    }

    public function botaoPagamento()
    {
        if(!$this->ordemPagamento instanceof OrdemPagamento){
            $this->ordemPagamento();
        }
        if (($this->status == 'pendente') && ($this->ordemPagamento->status == 'Devolvida' || $this->ordemPagamento->status == 'Cancelada' || $this->ordemPagamento->status == 'Pendente' || $this->ordemPagamento->status == 'Aguardando pagamento')) {
            $requestPagamento = new ImpostoRendaPaymentRequest($this->ordemPagamento->id);
            $urlPagamento = $requestPagamento->checkout();
            return '<a href="'.$urlPagamento.'" class="btn btn-warning">Efetuar Pagamento</a>';
        }
        return '';
    }

}
