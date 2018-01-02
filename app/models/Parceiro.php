<?php

class Parceiro extends Eloquent {

    public static $rules = [
        'nome' => 'required',
        'url' => 'required',
        'ordem' => 'required'
    ];
    protected $fillable = ['url', 'nome', 'imagem', 'ordem', 'created_at', 'updated_at'];
    public $errors;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parceiro';

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
