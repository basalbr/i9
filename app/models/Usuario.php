<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {
    public static $rules = [
        'nome' => 'required',
        'email' => 'required|email'
    ];
    public static $rules_new = [
        'nome' => 'required',
        'telefone' => 'required',
        'email' => 'required|email|unique:usuario',
        'senha' => 'required|same:confirmar_senha',
        'confirmar_senha' => 'required'
    ];
    protected $fillable = ['nome', 'email', 'admin', 'senha', 'created_at', 'updated_at','telefone'];
    protected $dates = ['created_at','updated_at'];
    public $errors;
    protected $niceNames = ['nome'=>'Nome','email'=>'E-mail','senha'=>'Senha', 'confirmar_senha'=>'Confirmar Senha', 'telefone'=>'Telefone'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuario';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->senha;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    public function isValid($data, $new_user)
    {
        //se for novo usuário
        if ($new_user)
        {
            $rules = static::$rules_new;
        }
        else
        {
            $rules = static::$rules;
        }
        $validator = Validator::make($data, $rules);
        $validator->setAttributeNames($this->niceNames);
        if ($validator->passes())
        {
            return true;
        }

        $this->errors = $validator->messages();
    }

}
