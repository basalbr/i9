<?php

class Noticia extends Eloquent {

    public static $rules = [
        'nome' => 'required',
        'descricao' => 'required'
    ];
    protected $fillable = ['nome', 'descricao', 'imagem', 'thumb', 'created_at', 'updated_at'];
    public $errors;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'noticia';

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
