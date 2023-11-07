<?php

class LoginController extends RenderViews
{
    public function index()
    {
        $this->loadView('login', [
            'title' => 'login'
        ]);
    }

    public function login_user()
    {
        $login = $_POST['usuario_login'];
        $senha = $_POST['senha'];

        $Auth = new Auth();

        $Auth->login($login, $senha);
    }

    public function logout_user(){
        $Auth = new Auth();
        $Auth->logout();
        
    }

}
