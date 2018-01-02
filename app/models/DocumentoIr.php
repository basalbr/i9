<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class DocumentoIr extends Eloquent
{
    use SoftDeletingTrait;

    protected $fillable = ['id_declaracao_ir', 'descricao', 'documento','valor'];
    protected $dates = ['updated_at', 'created_at', 'deleted_at'];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'documento_declaracao_ir';

}
