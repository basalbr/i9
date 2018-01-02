<?php

class CentralClienteController extends BaseController {

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
        return View::make('central_cliente.index');
        $arrParceiros = Parceiro::orderBy('ordem', 'asc')->get();
        $arrBanners = Banner::orderBy('ordem', 'asc')->get();
        $arrNoticias = Noticia::take(6)->where('created_at', '<=', new DateTime('today'))->orderBy('created_at', 'desc')->get();
        $objQuemSomos = Conteudo::find(1);
        $objServicos = Conteudo::find(2);
        $objHome = Conteudo::find(3);
        return View::make('index')->with([
            'parceiros' => $arrParceiros,
            'banners' => $arrBanners,
            'noticias' => $arrNoticias,
            'quem_somos'=>$objQuemSomos,
            'servicos'=>$objServicos,
            'home'=>$objHome]);
    }

}
