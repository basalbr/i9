<?php

class Banner extends Eloquent {

    public static $rules = [
        'titulo' => 'required',
        'url' => 'required',
        'ordem' => 'required'
		
    ];
    protected $fillable = ['url', 'titulo', 'imagem', 'ordem', 'created_at', 'updated_at', 'duracao'];
    public $errors;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'banner';

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
