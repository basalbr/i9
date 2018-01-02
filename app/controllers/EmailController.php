<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EmailController extends BaseController {

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

    public function send()
    {
        $dados = Input::all();

        $data = array(
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'assunto' => $dados['assunto'],
            'mensagem' => $dados['mensagem']
        );

        $mail = Mail::send('emails.contato', $data, function($message) {
                    $dados = Input::all();
                    $message->from($dados['email'], $dados['nome']);
                    $message->to('silmara@i9ge.com.br', 'Silmara Batista')->subject($dados['assunto']);
                });
        if (count(Mail::failures())){
     return 'false';
        }
      return 'true';
    }

}
