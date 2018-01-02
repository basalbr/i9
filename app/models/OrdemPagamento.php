<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class OrdemPagamento extends Eloquent
{
    use SoftDeletingTrait;

    protected $fillable = ['id_usuario', 'status', 'valor'];
    protected $dates = ['updated_at', 'created_at', 'deleted_at'];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ordem_pagamento';

    public function usuario()
    {
        return $this->belongsTo('Usuario', 'id_usuario');
    }

    public function historico()
    {
        return $this->hasMany('HistoricoPagamento', 'id_ordem_pagamento');
    }

    public function origem()
    {
        $declaracao = DeclaracaoIrOrdemPagamento::where('id_ordem_pagamento', '=', $this->id)->select('id_declaracao_ir')->first();
        if($declaracao instanceof DeclaracaoIrOrdemPagamento){
            return ImpostoRenda::find($declaracao->id_declaracao_ir);
        }

    }

}
