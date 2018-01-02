<?php

namespace App\Arquivos;

use Illuminate\Support\Facades\File;

class Temp extends Arquivo {

    protected $regras = ['arquivo' => 'required|max:10240|mimes:jpeg,jpg,png,pdf'];
    protected $nomes_bonitos = ['arquivo'=>'Documento'];
    private static $_path = 'uploads/temp/';
    
    public function __construct($arquivo) {
        
        parent::__construct($arquivo, self::$_path, $this->regras, $this->nomes_bonitos);
    }

    public static function remove($nome){
        File::delete(getcwd() . public_path() .self::$_path.$nome);
    }
}
