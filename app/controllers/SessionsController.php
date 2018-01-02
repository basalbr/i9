<?php

class SessionsController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
            
            
        return View::make('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::check())
        {
            return Redirect::to('/admin')->with('message', 'É preciso fazer login para visualizar esse conteúdo');
        }
//        return View::make('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $email = Input::get('email');
        $senha = Input::get('senha');
        
        if (Auth::attempt(['email' => $email, 'password' => $senha]))
        {
            return Redirect::intended('/admin');
        }
        
        return View::make('admin.login')->with(['erro'=>"Usuário e/ou senha inválidos"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        Auth::logout();
        return Redirect::to("admin/login");
    }

}
