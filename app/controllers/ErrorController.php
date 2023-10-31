<?php

class ErrorController extends RenderViews
{
    
    public function index()
    {
        $this->loadView('error',[
            'title' => 'error'
        ]);
    }
}
