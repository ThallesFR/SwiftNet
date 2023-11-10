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
        
        if (!isset($_SESSION['user'])|| $_SESSION['tipo']=='master') {
            header('Location: http://localhost/SwiftNet/');
            die();
        }

        // Registrar log
        $log['log_user'] = $_SESSION['user'];
        $log['log_tipo'] = 'logout';
    

        $logs = new LogsModel;
        $logs->insert($log);

        // Redirecionar após autenticação
        header('Location: http://localhost/SwiftNet/');
    }
}
