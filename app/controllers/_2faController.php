<?php

class _2faController extends RenderViews
{
    public function index()
    {
        $_2fa = new _2faModel;

        $this->loadView('2fa',[
            'title' => 'Autenticação',
            '_2fa'  => $_2fa->fetch()
        ]);
    }

    public function show()
    { 
    }
}
