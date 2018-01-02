<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ConteudoController extends BaseController {

    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function index()
    {
        $arrConteudos = Conteudo::paginate(15);
        return View::make('admin.conteudo.index')->with(['menu' => 'conteudo', 'conteudos' => $arrConteudos]);
    }

    public function editar($id)
    {
        $objConteudo = Conteudo::find($id);
        return View::make('admin.conteudo.editar')->with(['menu' => 'conteudos', 'conteudo' => $objConteudo]);
    }

    public function update($id)
    {
        $objConteudo = Conteudo::find($id);
        $dados = Input::all();
        if ($objConteudo->isValid($dados))
        {
            $objConteudo->update($dados);
            return Redirect::to('/admin/conteudo')->with(['message' => ['msg' => 'Conteúdo editado com sucesso', 'title' => 'Sucesso'], 'menu' => 'conteudos']);
        }
        return Redirect::back()->withInput()->withErrors($objConteudo->errors);
    }

}
