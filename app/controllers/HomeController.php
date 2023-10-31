<?php

class HomeController extends RenderViews
{    
    public function index()
    {
        
        $this->loadView('home',[
            'title' => 'SwiftNet',
        ]);
    }
}
