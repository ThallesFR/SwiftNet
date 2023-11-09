<?php

class LoginController extends RenderViews
{
    public function index()
    {
        if(isset($_SESSION['user'])){
            header('Location: http://localhost/SwiftNet/');
            die();
        }

        $this->loadView('login', [
            'title' => 'login'
        ]);
    }

    public function login_user()
    {
        if(isset($_SESSION['user'])){
            header('Location: http://localhost/SwiftNet/');
            die();
        }

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
