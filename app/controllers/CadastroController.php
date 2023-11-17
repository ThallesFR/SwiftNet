<?php
require __DIR__ . "/AlertasController.php";

class CadastroController extends RenderViews
{
    public function index()
    {
        if (isset($_SESSION['user'])) {
            header('Location: http://localhost/SwiftNet/');
            die();
        }

        $this->loadView('cadastro', [
            'title' => 'cadastro'
        ]);
    }

    public function cadastro()
    {
        $controller_alert = new AlertasController();
        $_POST['usuario_tipo'] = 'comum';
        $login = $_POST['usuario_login'];
        $cpf = $_POST['usuario_cpf'];
        $email = $_POST['usuario_email'];
        $user_model = new UserModel;

        $existir =$user_model->select_login_cpf($login,$cpf,$email);

        if(!empty($existir)){

            $controller_alert->enviar_alerta('danger', 'Cadastro inválido!', 'Login ou CPF já cadastrados.', 'http://localhost/SwiftNet/cadastro');
            die();
        }
        
        $user_model->insert($_POST);
              
        $controller_alert->enviar_alerta('success', 'Cadastro conluído!', 'Você já pode efetuar o login.', 'http://localhost/SwiftNet/login');
        die();
    }
}
