<?php

class PerfilController extends RenderViews
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: http://localhost/SwiftNet/');
            die();
        }

        $usuarios_model = new UserModel();
        $usuario_data = $usuarios_model->select_id($_SESSION['user']);
        $usuario = $usuario_data;

        if ($_SESSION['tipo'] == "comum") {
            $contratos_model = new ContratosModel();
            $contratos = $contratos_model->select_id($_SESSION['user']);
        }

        $this->loadView('perfil', [
            'title' => 'Perfil',
            'userData' => $usuario,
            'contratos' => $contratos
        ]);
    }

    public function editar_senha()
    {
        $usuarios_model = new UserModel();
        $usuarios_model->update_senha($_SESSION['user'],$_POST['usuario_senha']);
        header('Location: http://localhost/SwiftNet/perfil');

    }
}
