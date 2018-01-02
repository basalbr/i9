<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class DocumentoDependenteIr extends Eloquent
{
    use SoftDeletingTrait;

    protected $fillable = ['id_dependente_declaracao_ir', 'descricao', 'documento','valor'];
    protected $dates = ['updated_at', 'created_at', 'deleted_at'];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'documento_dependente_declaracao_ir';

}
