<?php

class Modelo_bdController extends RenderViews
{
    public function index()
    {
        $Auth = new Auth();
        $Auth->protect('master');

        $this->loadView('modeloBD', [
            'title' => 'Modelo do Banco',
        ]);
    }
}
