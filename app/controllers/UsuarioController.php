<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuarioController extends BaseController
{

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
        return View::make('central_cliente.login');
    }

    public function login()
    {
        $email = Input::get('email');
        $senha = Input::get('senha');
        if (Auth::attempt(['email' => $email, 'password' => $senha, 'admin' => false])) {
            return Redirect::route('imposto-renda-index');
        }

        return Redirect::back()->withErrors(['Usuário e/ou senha inválido(s)'], 'login');
    }

    public function store()
    {
        $dados = Input::all();
        $usuario = new Usuario();
        if ($usuario->isValid($dados, true)) {
            $dados['senha'] = Hash::make($dados['senha']);
            $usuario = $usuario->create($dados);
            Auth::loginUsingId($usuario->id);
            try {
                Mail::send('central_cliente.emails.bem_vindo', ['nome' => $usuario->nome], function ($message) use ($usuario) {
                    $message->from('no-reply@i9ge.com.br', 'i9GE Gestão e Contabilidade');
                    $message->subject('Seja bem vindo');
                    $message->to($usuario->email);
                });
            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
            return Redirect::route('imposto-renda-index');
        }
        return Redirect::back()->withErrors($usuario->errors, 'cadastro');
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
        if (Usuario::find($id)) {
            Usuario::find($id)->delete();
            $title = 'Sucesso';
            $msg = 'Usuário excluído com sucesso.';
        }
        return Redirect::to('/admin/usuarios')->with(['message' => ['msg' => $msg, 'title' => $title], 'menu' => 'usuarios']);
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('home');
    }

    public function create()
    {
        $objUsuario = new Usuario;
        $dados = Input::all();

        if ($objUsuario->isValid($dados, true)) {
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
        if (Input::has('senha')) {
            $senha = Hash::make(Input::get('senha'));
            $dados['senha'] = $senha;
        }
        if ($objUsuario->isValid($dados, false)) {
            $objUsuario->update($dados);
            return Redirect::to('/admin/usuarios')->with(['message' => ['msg' => 'Usuário editado com sucesso', 'title' => 'Sucesso'], 'menu' => 'usuarios']);
        }
        return Redirect::back()->withInput()->withErrors($objUsuario->errors);
    }

}
