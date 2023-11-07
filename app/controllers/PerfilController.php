<?php

class PerfilController extends RenderViews
{
    public function index()
    {
        $this->loadView('perfil',[
            'title' => 'Perfil'
        ]);
    }

    public function show()
    { 
    }
}
