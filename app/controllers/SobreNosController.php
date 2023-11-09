<?php

class SobreNosController extends RenderViews
{
    public function index()
    { 
        if(isset($_SESSION['user'])&& $_SESSION['tipo'] == "master"){
            header('Location: http://localhost/SwiftNet/');
            die();
        }

        $this->loadView('sobreNos',[
            'title' => 'Sobre nós'
        ]);
    }

   
}
