<?php

class LoginController extends RenderViews
{
    public function index()
    {
        $this->loadView('login',[
            'title' => 'login'
        ]);
    }

    public function show()
    { 
    }
}
