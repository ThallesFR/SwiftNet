<?php

class _2faController extends RenderViews
{
    public function index()
    {
        $_2faModel = new _2faModel();
        $_2fa = $_2faModel->select_tabel();


        $indiceAleatorio = array_rand($_2fa); // Retira um índice aleatório da entidade
        $_2faAleatorio = $_2fa[$indiceAleatorio];

        $this->loadView('2fa', [
            'title' => 'Autenticação',
            'perguntas' => $_2faAleatorio['2fa_quest']
        ]);
    }

    public function show()
    {
        // Adicione a lógica necessária para a ação "show" aqui, se aplicável
    }
}
