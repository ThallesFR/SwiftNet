<?php

class PerfilController extends RenderViews
{
    public function index()
    {
        if(!isset($_SESSION['user'])){
            header('Location: http://localhost/SwiftNet/');
            die();
        }

        $this->loadView('perfil',[
            'title' => 'Perfil'
        ]);
    }

    public function show()
    { 
    }
}
