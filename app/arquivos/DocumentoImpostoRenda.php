<?php

namespace App\Arquivos;

use Illuminate\Support\Facades\File;

class DocumentoImpostoRenda extends Arquivo
{

    private static $_path = '/uploads/documentos_imposto_renda/';
    protected $regras = ['arquivo' => 'required|max:10240'];
    protected $nomes_bonitos = ['arquivo' => 'Documento'];
    private static $temp_path = '/uploads/temp/';

    public function __construct($arquivo)
    {
        parent::__construct($arquivo, self::$_path, $this->regras, $this->nomes_bonitos);
    }

    public static function moveFromTemp($name)
    {
        $oldfile = getcwd() . public_path() . self::$temp_path . $name;
        $newfile = getcwd() . public_path() . self::$_path . $name;
        File::move($oldfile, $newfile);
    }
}
