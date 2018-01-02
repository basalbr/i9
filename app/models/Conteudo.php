<?php

class Conteudo extends Eloquent {

    public static $rules = [
        'titulo' => 'required',
        'descricao' => 'required'
    ];
    protected $fillable = ['nome', 'descricao', 'imagem'];
    public $errors;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conteudo';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array();

    public function isValid($data)
    {

        $rules = static::$rules;
        $validator = Validator::make($data, $rules);
        if ($validator->passes())
        {
            return true;
        }

        $this->errors = $validator->messages();
    }

}
