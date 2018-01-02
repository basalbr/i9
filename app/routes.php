<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);
Route::get('/admin', 'AdminController@index')->before('admin');

/* Login Admin */
Route::get('/admin/login', 'SessionsController@index');
Route::post('/admin/login', 'SessionsController@store');
Route::get('/admin/logout', 'SessionsController@destroy')->before('admin');

/* Usuários Admin */
Route::get('/admin/usuarios', 'UsuariosController@index')->before('admin');
Route::get('/admin/usuarios/editar/{id}', 'UsuariosController@editar')->before('admin');
Route::get('/admin/usuarios/excluir/{id}', 'UsuariosController@delete')->before('admin');
Route::get('/admin/usuarios/novo', 'UsuariosController@novo')->before('admin');
Route::post('/admin/usuarios/novo', 'UsuariosController@create')->before('admin');
Route::post('/admin/usuarios/editar/{id}', 'UsuariosController@update')->before('admin');

/* Central do Cliente */
Route::get('/central-cliente', ['uses' => 'CentralClienteController@index', 'as' => 'central-cliente-index'])->before('auth');

/* Usuário */
Route::get('/central-cliente/login', ['uses' => 'UsuarioController@index', 'as' => 'usuario-login'])->before('guest');
Route::post('/central-cliente/login', ['uses' => 'UsuarioController@login'])->before('guest');
Route::post('/central-cliente/cadastrar', ['uses' => 'UsuarioController@store', 'as' => 'usuario-cadastrar'])->before('guest');
Route::get('/central-cliente/logout', ['uses' => 'UsuarioController@logout', 'as' => 'usuario-logout'])->before('auth');

/* Pagseguro Notification */
Route::post('/pagseguro/notification', ['uses' => 'PagseguroController@index', 'as' => 'pagseguro-notification']);

/* Imposto de Renda */
Route::get('/admin/imposto-de-renda', ['uses' => 'ImpostoRendaController@indexAdmin', 'as' => 'imposto-renda-admin-index'])->before('admin');
Route::get('/admin/imposto-de-renda/editar/{id}', ['uses' => 'ImpostoRendaController@editAdmin', 'as' => 'imposto-renda-admin-editar'])->before('admin');
Route::post('/admin/imposto-de-renda/editar/{id}', ['uses' => 'ImpostoRendaController@updateAdmin'])->before('admin');

Route::get('/central-cliente/imposto-de-renda', ['uses' => 'ImpostoRendaController@index', 'as' => 'imposto-renda-index'])->before('auth');
Route::get('/central-cliente/imposto-de-renda/pagamento', ['uses' => 'ImpostoRendaController@payment', 'as' => 'imposto-renda-pagamento'])->before('auth');
Route::get('/central-cliente/imposto-de-renda/visualizar-declaracao/{id}', ['uses' => 'ImpostoRendaController@view', 'as' => 'imposto-renda-visualizar'])->before('auth');
Route::post('/central-cliente/imposto-de-renda/validate', ['uses' => 'ImpostoRendaController@validate', 'as' => 'imposto-renda-validate'])->before('auth');
Route::get('/central-cliente/imposto-de-renda/enviar-documentos', ['uses' => 'ImpostoRendaController@createEnviarDocumentos', 'as' => 'imposto-renda-enviar-documentos'])->before('auth');
Route::post('/central-cliente/imposto-de-renda/enviar-documentos', ['uses' => 'ImpostoRendaController@storeEnviarDocumentos'])->before('auth');
Route::post('/central-cliente/imposto-de-renda/upload', ['uses' => 'ImpostoRendaController@upload', 'as' => 'imposto-renda-upload'])->before('auth');
Route::post('/central-cliente/imposto-de-renda/remove-upload', ['uses' => 'ImpostoRendaController@removeUpload', 'as' => 'imposto-renda-remove-upload'])->before('auth');
Route::post('/central-cliente/imposto-de-renda/cadastrar', 'ImpostoRendaController@store')->before('auth');

/*Ordens de pagamento*/
Route::get('/central-cliente/ordens-de-pagamento', ['uses' => 'OrdemPagamentoController@index', 'as' => 'ordem-pagamento-index'])->before('auth');

/* Notícias */
Route::get('/admin/noticias', 'NoticiasController@index')->before('admin');
Route::get('/admin/noticias/editar/{id}', 'NoticiasController@editar')->before('admin');
Route::get('/admin/noticias/excluir/{id}', 'NoticiasController@delete')->before('admin');
Route::get('/admin/noticias/novo', 'NoticiasController@novo')->before('admin');
Route::get('/noticia/{id}', 'NoticiasController@ler');
Route::get('/noticias', 'NoticiasController@todas');
Route::post('/admin/noticias/novo', 'NoticiasController@create')->before('admin');
Route::post('/admin/noticias/editar/{id}', 'NoticiasController@update')->before('admin');

/* Newsletter */
Route::get('/admin/newsletters', 'NewslettersController@index')->before('admin');
Route::post('/ajax/newsletter_save', 'NewslettersController@create');

/* Banners */
Route::get('/admin/banners', 'BannersController@index')->before('admin');
Route::get('/admin/banners/editar/{id}', 'BannersController@editar')->before('admin');
Route::get('/admin/banners/excluir/{id}', 'BannersController@delete')->before('admin');
Route::get('/admin/banners/novo', 'BannersController@novo')->before('admin');
Route::post('/admin/banners/novo', 'BannersController@create')->before('admin');
Route::post('/admin/banners/editar/{id}', 'BannersController@update')->before('admin');

/* Parceiros */
Route::get('/admin/parceiros', 'ParceirosController@index')->before('admin');
Route::get('/admin/parceiros/editar/{id}', 'ParceirosController@editar')->before('admin');
Route::get('/admin/parceiros/excluir/{id}', 'ParceirosController@delete')->before('admin');
Route::get('/admin/parceiros/novo', 'ParceirosController@novo')->before('admin');
Route::post('/admin/parceiros/novo', 'ParceirosController@create')->before('admin');
Route::post('/admin/parceiros/editar/{id}', 'ParceirosController@update')->before('admin');

/* Conteúdo */
Route::get('/admin/conteudo', 'ConteudoController@index')->before('admin');
Route::get('/admin/conteudo/editar/{id}', 'ConteudoController@editar')->before('admin');
Route::post('/admin/conteudo/editar/{id}', 'ConteudoController@update')->before('admin');

/* Contato */
Route::post('/ajax/email_send', 'EmailController@send');
