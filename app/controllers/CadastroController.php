<?php


class CadastroController extends RenderViews
{
    public function index()
    {
        if(isset($_SESSION['user'])){
            header('Location: http://localhost/SwiftNet/');
            die();
        }

        $this->loadView('cadastro',[
            'title' => 'cadastro'
        ]);
    }

    public function cadastro()
    {   $_POST['usuario_tipo']='comum';
        $user_model=new UserModel;
        $user_model->insert($_POST);
            header('Location: http://localhost/SwiftNet/login');
            die();
    }
}
