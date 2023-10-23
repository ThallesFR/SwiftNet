<?php

class UserController extends RenderViews
{
    public function index()
    {


    }

    public function show()
    { $this->loadView('usuarios',[
        'title' => 'user'
        ]);
    }
}
