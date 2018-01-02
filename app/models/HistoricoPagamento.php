<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class HistoricoPagamento extends Eloquent
{
    use SoftDeletingTrait;

    protected $fillable = ['id_pagamento', 'status', 'transaction_id'];
    protected $dates = ['updated_at', 'created_at', 'deleted_at'];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'historico_pagamento';

    public function ordem_pagamento()
    {
        return $this->belongsTo('OrdemPagamento', 'id_pagamento');
    }


}
