<?php

class HomeController extends RenderViews
{    
    public function index()
    {
        $usuario = new UserModel();

        //var_dump( $usuario->fetch());

        $this->loadView('home',[
            'title' => 'SwiftNet',
            'usuario' =>$usuario->fetch()
        ]);
    }
}
