<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class DeclaracaoIrOrdemPagamento extends Eloquent
{
    use SoftDeletingTrait;

    protected $fillable = ['id_ordem_pagamento', 'id_declaracao_ir', 'transaction_id'];
    protected $dates = ['updated_at', 'created_at', 'deleted_at'];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'declaracao_ir_ordem_pagamento';

    public function ordem_pagamento()
    {
        $this->hasOne('OrdemPagamento', 'id_ordem_pagamento');
    }

    public function declaracao()
    {
        $this->belongsTo('ImpostoRenda', 'id_declaracao_ir');
    }

}
