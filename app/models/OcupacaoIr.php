<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class OcupacaoIr extends Eloquent
{
    use SoftDeletingTrait;

    protected $fillable = ['id_declaracao_ir', 'id_ocupacao', 'descricao'];
    protected $dates = ['updated_at', 'created_at', 'deleted_at'];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ocupacao_declaracao_ir';

    public function tipo()
    {
        return $this->belongsTo('Ocupacao', 'id_ocupacao');
    }
}
