<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class TipoDependente extends Eloquent
{
    use SoftDeletingTrait;

    protected $fillable = ['descricao'];
    protected $dates = ['updated_at', 'created_at', 'deleted_at'];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipo_dependente';

    public function dependentes()
    {
        $this->hasMany('DependenteIr', 'id_tipo_dependente');
    }

}
