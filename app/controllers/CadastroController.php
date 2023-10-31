<?php


class CadastroController extends RenderViews
{
    public function index()
    {
        $this->loadView('cadastro',[
            'title' => 'cadastro'
        ]);
    }

    public function show()
    { 
    }
}
