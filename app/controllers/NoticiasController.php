<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NoticiasController extends BaseController {

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
        $arrNoticias = Noticia::paginate(15);
        return View::make('admin.noticias.index')->with(['menu' => 'noticias', 'noticias' => $arrNoticias]);
    }
    public function todas()
    {
        $arrBanners = Banner::orderBy('ordem', 'asc')->get();
        $arrNoticias = Noticia::orderBy('created_at','desc')->paginate(9);
        return View::make('noticias')->with(['noticias' => $arrNoticias,'banners'=>$arrBanners]);
    }

    public function editar($id)
    {
        $objNoticia = Noticia::find($id);
        return View::make('admin.noticias.editar')->with(['menu' => 'noticias', 'noticia' => $objNoticia]);
    }

    public function novo()
    {
        return View::make('admin.noticias.novo')->with(['menu' => 'noticias']);
    }

    public function delete($id)
    {
        $title = 'Atenção';
        $msg = 'Notícia não encontrada';
        if (Noticia::find($id))
        {
            Noticia::find($id)->delete();
            $title = 'Sucesso';
            $msg = 'Notícia excluída com sucesso.';
        }
        return Redirect::to('/admin/noticias')->with(['message' => ['msg' => $msg, 'title' => $title], 'menu' => 'noticias']);
    }

    public function create()
    {
        $objNoticia = new Noticia;
        $dados = Input::all();

        if ($objNoticia->isValid($dados))
        {
            list($day, $month, $year) = explode("/", $dados['created_at']);
            $dados['created_at'] = "$year-$month-$day";
            $imagem = date('dmyhis') . '.' . Input::file('imagem')->guessClientExtension();
            Input::file('imagem')->move(getcwd() . '/uploads/', $imagem);
            $dados['imagem'] = $imagem;
            $img = Image::make(getcwd() . '/uploads/' . $imagem);
            $img->fit(332, 190);
            $img->save(getcwd() . '/uploads/' . 'thumb' . $imagem);
            $dados['thumb'] = 'thumb' . $imagem;
            unset($dados['_token']);
            $objNoticia->insert($dados);
            return Redirect::to('/admin/noticias')->with(['message' => ['msg' => 'Notícia criada com sucesso', 'title' => 'Sucesso'], 'menu' => 'noticias']);
        }
        return Redirect::back()->withInput()->withErrors($objNoticia->errors);
    }

    public function ler($id)
    {
        $arrBanners = Banner::orderBy('ordem', 'asc')->get();
        $arrNoticias = Noticia::orderBy('created_at','desc')->limit(3)->get();
        $objNoticia = Noticia::find($id);
        if ($objNoticia instanceof Noticia)
        {
            return View::make('noticia')->with(['noticia' => $objNoticia,'banners'=>$arrBanners,'noticias'=>$arrNoticias]);
        }
        else
        {
            return Redirect::back();
        }
    }

    public function update($id)
    {
        $objNoticia = Noticia::find($id);
        $dados = Input::all();
        if ($objNoticia->isValid($dados))
        {
            list($day, $month, $year) = explode("/", $dados['created_at']);
            $dados['created_at'] = "$year-$month-$day";
            if (isset($dados['imagem']) && !empty($dados['imagem']))
            {
				if (file_exists(getcwd() . '/uploads/' . $objNoticia->imagem))
                {
                   try{
					    unlink(getcwd() . '/uploads/' . $objNoticia->imagem);
				   }catch(Exception $e){
					   
				   }
                }
                $imagem = date('dmyhis') . '.' . Input::file('imagem')->guessClientExtension();
                Input::file('imagem')->move(getcwd() . '/uploads/', $imagem);
                $dados['imagem'] = $imagem;
				
                $img = Image::make(getcwd() . '/uploads/' . $imagem);
                $img->fit(332, 190);
                $img->save(getcwd() . '/uploads/' . 'thumb' . $imagem);
                $dados['thumb'] = 'thumb' . $imagem;
            }else{
				unset($dados['imagem']);
			}
            unset($dados['_token']);
            $objNoticia->update($dados);
            return Redirect::to('/admin/noticias')->with(['message' => ['msg' => 'Notícia editada com sucesso', 'title' => 'Sucesso'], 'menu' => 'noticias']);
        }
        return Redirect::back()->withInput()->withErrors($objNoticia->errors);
    }

}
