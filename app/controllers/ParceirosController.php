<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ParceirosController extends BaseController {

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
        $arrParceiros = Parceiro::orderBy('ordem', 'asc')->paginate(15);
        return View::make('admin.parceiros.index')->with(['menu' => 'parceiros', 'parceiros' => $arrParceiros]);
    }

    public function editar($id)
    {
        $objParceiro = Parceiro::find($id);
        return View::make('admin.parceiros.editar')->with(['menu' => 'parceiros', 'parceiro' => $objParceiro]);
    }

    public function novo()
    {
        return View::make('admin.parceiros.novo')->with(['menu' => 'parceiros']);
    }

    public function delete($id)
    {
        $title = 'Atenção';
        $msg = 'Parceiro não encontrado';
        if (Parceiro::find($id))
        {
            $objParceiro = Parceiro::find($id);
            if (file_exists(getcwd() . '/uploads/' . $objParceiro->imagem))
            {
                unlink(getcwd() . '/uploads/' . $objParceiro->imagem);
            }
            $objParceiro->delete();
            $title = 'Sucesso';
            $msg = 'Parceiro excluído com sucesso.';
        }
        return Redirect::to('/admin/parceiros')->with(['message' => ['msg' => $msg, 'title' => $title], 'menu' => 'parceiros']);
    }

    public function create()
    {
        $objParceiro = new Parceiro;
        $dados = Input::all();

        if ($objParceiro->isValid($dados))
        {
            $imagem = 'parceiro' . date('dmyhis') . '.' . Input::file('imagem')->guessClientExtension();
            Input::file('imagem')->move(getcwd() . '/uploads/', $imagem);
            $dados['imagem'] = $imagem;
            $img = Image::make(getcwd() . '/uploads/' . $imagem);
            $img->fit(160, 160);
            $img->save(getcwd() . '/uploads/' . $imagem);
            unset($dados['_token']);
            $objParceiro->insert($dados);
            return Redirect::to('/admin/parceiros')->with(['message' => ['msg' => 'Parceiro cadastrado com sucesso', 'title' => 'Sucesso'], 'menu' => 'parceiros']);
        }
        return Redirect::back()->withInput()->withErrors($objParceiro->errors);
    }

    public function update($id)
    {
        $objParceiro = Parceiro::find($id);
        $dados = Input::all();
        if ($objParceiro->isValid($dados))
        {
			
            if (isset($dados['imagem']) && !empty($dados['imagem']))
            {
                 if (file_exists(getcwd() . '/uploads/' . $objParceiro->imagem))
                {
                   try{
					    unlink(getcwd() . '/uploads/' . $objParceiro->imagem);
				   }catch(Exception $e){
					   
				   }
                }
                $imagem = 'parceiro' . date('dmyhis') . '.' . Input::file('imagem')->guessClientExtension();
                Input::file('imagem')->move(getcwd() . '/uploads/', $imagem);
                $dados['imagem'] = $imagem;
                $img = Image::make(getcwd() . '/uploads/' . $imagem);
                $img->fit(160, 160);
                $img->save(getcwd() . '/uploads/' . $imagem);
            }else{
				unset($dados['imagem']);
			}
            unset($dados['_token']);
            $objParceiro->update($dados);
            return Redirect::to('/admin/parceiros')->with(['message' => ['msg' => 'Parceiro editado com sucesso', 'title' => 'Sucesso'], 'menu' => 'parceiros']);
        }
        return Redirect::back()->withInput()->withErrors($objParceiro->errors);
    }

}
