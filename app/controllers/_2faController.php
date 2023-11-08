<?php

class _2faController extends RenderViews
{
    public function index($id)
    {
        $_2faModel = new _2faModel();
        $_2fa = $_2faModel->select_tabel();

        $id_user=$id[0];


        $indiceAleatorio = array_rand($_2fa); // Retira um índice aleatório da entidade
        $_2faAleatorio = $_2fa[$indiceAleatorio];

        $this->loadView('2fa', [
            'title' => 'Autenticação',
            'perguntas' => $_2faAleatorio['2fa_quest'],
            'id'=> $id_user
        ]);
    }

   public function autenticacao_2fa($id)
   {    
        $id_user=$id[0];

        $pergunta = $_POST['pergunta_2fa'];
        $resposta = $_POST['resposta_2fa'];

        //echo $id_user,$pergunta,$resposta;

        $Auth = new Auth();
        $Auth->autenticacao($pergunta,$resposta,$id_user);

   }
}
