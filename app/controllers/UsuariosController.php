<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuariosController extends BaseController {

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
        $arrUsuarios = Usuario::paginate(15);
        return View::make('admin.usuarios.index')->with(['menu' => 'usuarios', 'usuarios' => $arrUsuarios]);
    }

    public function editar($id)
    {
        $objUsuario = Usuario::find($id);
        return View::make('admin.usuarios.editar')->with(['menu' => 'usuarios', 'usuario' => $objUsuario]);
    }

    public function novo()
    {
        return View::make('admin.usuarios.novo')->with(['menu' => 'usuarios']);
    }

    public function delete($id)
    {
        $title = 'Atenção';
        $msg = 'Usuário não encontrado';
        if (Usuario::find($id))
        {
            Usuario::find($id)->delete();
            $title = 'Sucesso';
            $msg = 'Usuário excluído com sucesso.';
        }
        return Redirect::to('/admin/usuarios')->with(['message' => ['msg' => $msg, 'title' => $title], 'menu' => 'usuarios']);
    }

    public function create()
    {
        $objUsuario = new Usuario;
        $dados = Input::all();

        if ($objUsuario->isValid($dados, true))
        {
            $dados['senha'] = Hash::make(Input::get('senha'));
            unset($dados['confirmar_senha']);
            unset($dados['_token']);
            $objUsuario->insert($dados);
            return Redirect::to('/admin/usuarios')->with(['message' => ['msg' => 'Usuário criado com sucesso', 'title' => 'Sucesso'], 'menu' => 'usuarios']);
        }
        return Redirect::back()->withInput()->withErrors($objUsuario->errors);
    }

    public function update($id)
    {
        $objUsuario = Usuario::find($id);
       $dados = Input::all();
        if (Input::has('senha'))
        {
            $senha = Hash::make(Input::get('senha'));
            $dados['senha'] = $senha;
        }
        if ($objUsuario->isValid($dados, false))
        {
            $objUsuario->update($dados);
            return Redirect::to('/admin/usuarios')->with(['message' => ['msg' => 'Usuário editado com sucesso', 'title' => 'Sucesso'], 'menu' => 'usuarios']);
        }
        return Redirect::back()->withInput()->withErrors($objUsuario->errors);
    }
    
    public function createSiteUser(){
        return View::make('usuario.cadastrar')->with(['banners'=>[]]);
    }

}
