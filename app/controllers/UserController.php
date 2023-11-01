<?php

class UserController extends RenderViews
{
    public function index()
    {
        $usuarios_model = new UserModel();
        $usuarios = $usuarios_model->select_tabel();

        
        $contratos_model = new ContratosModel();
        $contratos = $contratos_model->select_tabel();
  
        $logs_model = new LogsModel();
        $logs = $logs_model->select_tabel();

        $_2faModel = new _2faModel();
        $_2fa = $_2faModel->select_tabel();

        $this->loadView('usuarios', [
            'title' => 'Usuários',
            'usuarios' => $usuarios,
            'contratos' =>$contratos,
            'logs' =>$logs,
            'perguntas' => $_2fa
            
        ]);
    }

    public function delete_user($id)
    {   $id_user=$id[0];         
        $contratos_model = new ContratosModel();
        $contratos_model->delete($id_user);
  
        $logs_model = new LogsModel();
        $logs_model->delete($id_user);
        
        $usuarios_model = new UserModel();
        $usuarios_model->delete($id_user);

        header('location: http://localhost/SwiftNet/usuarios');
    }
}
