<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BannersController extends BaseController {

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
        $arrBanners = Banner::orderBy('ordem', 'asc')->paginate(15);
        return View::make('admin.banners.index')->with(['menu' => 'banners', 'banners' => $arrBanners]);
    }

    public function editar($id)
    {
        $objBanner = Banner::find($id);
        return View::make('admin.banners.editar')->with(['menu' => 'banners', 'banner' => $objBanner]);
    }

    public function novo()
    {
        return View::make('admin.banners.novo')->with(['menu' => 'banners']);
    }

    public function delete($id)
    {
        $title = 'Atenção';
        $msg = 'Banner não encontrado';
        if (Banner::find($id))
        {
            $objBanner = Banner::find($id);
            if (file_exists(getcwd() . '/uploads/' . $objBanner->imagem))
            {
                unlink(getcwd() . '/uploads/' . $objBanner->imagem);
            }
            $objBanner->delete();
            $title = 'Sucesso';
            $msg = 'Banner excluído com sucesso.';
        }
        return Redirect::to('/admin/banners')->with(['message' => ['msg' => $msg, 'title' => $title], 'menu' => 'banners']);
    }

    public function create()
    {
        $objBanner = new Banner;
        $dados = Input::all();

        if ($objBanner->isValid($dados))
        {
			$imagem = 'banner' . date('dmyhis') . '.' . Input::file('imagem')->guessClientExtension();
            Input::file('imagem')->move(getcwd() . '/uploads/', $imagem);
            $dados['imagem'] = $imagem;
            $img = Image::make(getcwd() . '/uploads/' . $imagem);
            $img->fit(1440, 502);
            $img->save(getcwd() . '/uploads/' . $imagem);
            unset($dados['_token']);
            $objBanner->insert($dados);
            return Redirect::to('/admin/banners')->with(['message' => ['msg' => 'Banner cadastrado com sucesso', 'title' => 'Sucesso'], 'menu' => 'banners']);
        }
        return Redirect::back()->withInput()->withErrors($objBanner->errors);
    }

    public function update($id)
    {
        $objBanner = Banner::find($id);
        $dados = Input::all();
		
        if ($objBanner->isValid($dados))
        {
            if (isset($dados['imagem']) && !empty($dados['imagem']))
            {
                if (file_exists(getcwd() . '/uploads/' . $objBanner->imagem))
                {
                   try{
					    unlink(getcwd() . '/uploads/' . $objBanner->imagem);
				   }catch(Exception $e){
					   
				   }
                }
                $imagem = 'banner' . date('dmyhis') . '.' . Input::file('imagem')->guessClientExtension();
                Input::file('imagem')->move(getcwd() . '/uploads/', $imagem);
                $dados['imagem'] = $imagem;
				
                $img = Image::make(getcwd() . '/uploads/' . $imagem);
                $img->fit(1440, 502);
                $img->save(getcwd() . '/uploads/' . $imagem);
           }else{
				unset($dados['imagem']);
			}
            unset($dados['_token']);
            $objBanner->update($dados);
            return Redirect::to('/admin/banners')->with(['message' => ['msg' => 'Banner editado com sucesso', 'title' => 'Sucesso'], 'menu' => 'banners']);
        }
        return Redirect::back()->withInput()->withErrors($objBanner->errors);
    }

}
