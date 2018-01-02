<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NewslettersController extends BaseController {

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
        $arrNewsletters = Newsletter::paginate(15);
        return View::make('admin.newsletters.index')->with(['menu' => 'newsletters', 'newsletters' => $arrNewsletters]);
    }

    public function create()
    {
        $objNewsletter = new Newsletter;
        $dados = Input::all();
        if(!isset($dados['email']) || empty($dados['email'])){
            return 'vazio';
        }
        if ($objNewsletter->isValid($dados['email']))
        {
            $dados['created_at'] = date('Y-m-d h:i:s a');
            $objNewsletter->insert($dados);
            return 'salvo';
        }
        return 'ja_existe';
    }
    
    public function contato(){
        $dados = Input::all();
    }

}
