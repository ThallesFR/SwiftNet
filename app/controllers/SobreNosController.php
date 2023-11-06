<?php

class SobreNosController extends RenderViews
{
    public function index()
    {
        $this->loadView('sobreNos',[
            'title' => 'Sobre nós'
        ]);
    }

   
}
