<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class DependenteIr extends Eloquent
{
    use SoftDeletingTrait;

    protected $fillable = ['id_declaracao_ir', 'id_tipo_dependente', 'nome', 'data_nascimento'];
    protected $dates = ['updated_at', 'created_at', 'deleted_at'];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dependente_declaracao_ir';

    public function declaracao()
    {
        return $this->belongsTo('ImpostoRenda', 'id_declaracao_ir');
    }

    public function documentos()
    {
        return $this->hasMany('DocumentoDependenteIr', 'id_dependente_declaracao_ir');
    }

    public function tipo()
    {
        return $this->belongsTo('TipoDependente', 'id_tipo_dependente');
    }



}
