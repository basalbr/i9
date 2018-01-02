<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Ocupacao extends Eloquent
{
    use SoftDeletingTrait;

    protected $fillable = ['descricao'];
    protected $dates = ['updated_at', 'created_at', 'deleted_at'];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ocupacao';

    public function ocupacoes()
    {
        return $this->hasMany('OcupacaoIr', 'id_ocupacao');
    }

}
