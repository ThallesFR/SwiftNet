<?php

class Modelo_bdController extends RenderViews
{
    public function index()
    {
        $this->loadView('modeloBD',[
            'title' => 'Modelo do Banco'
        ]);
    }

   
}
