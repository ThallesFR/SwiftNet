<?php

class PlanosController extends RenderViews
{
    public function index()
    {
        $this->loadView('planos',[
        'title' => 'Planos'
        ]);
    }

    public function show()
    { 
    }
}
