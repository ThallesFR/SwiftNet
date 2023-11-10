<?php

class _2faController extends RenderViews
{
    public function index($id)
    {
        if (isset($_SESSION['user'])) {
            header('Location: http://localhost/SwiftNet/');
            die();
        }

        $_2faModel = new _2faModel();
        $_2fa = $_2faModel->select_tabel();

        $id_user = $id[0];


        $indiceAleatorio = array_rand($_2fa); // Retira um índice aleatório da entidade
        $_2faAleatorio = $_2fa[$indiceAleatorio];

        $this->loadView('2fa', [
            'title' => 'Autenticação',
            'perguntas' => $_2faAleatorio['2fa_quest'],
            'id' => $id_user
        ]);
    }
    public function autenticacao_2fa($id)
    {
        if (isset($_SESSION['user'])) {
            header('Location: http://localhost/SwiftNet/');
            die();
        }

        $id_user = $id[0];

        $pergunta = $_POST['pergunta_2fa'];
        $resposta = $_POST['resposta_2fa'];

        $Auth = new Auth();
        $Auth->autenticacao($pergunta, $resposta, $id_user);

        if (!isset($_SESSION['user'])|| $_SESSION['tipo']=='master') {
            header('Location: http://localhost/SwiftNet/');
            die();
        }

        // Registrar log
        $log['log_user'] = $id_user;
        $log['log_tipo'] = 'login';
        $log['log_2fa'] = $pergunta;

        $logs = new LogsModel;
        $logs->insert($log);

        // Redirecionar após autenticação
        header('Location: http://localhost/SwiftNet/');
    }
}
