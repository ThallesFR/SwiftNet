<?php

class AlertasController extends RenderViews
{
    
    public function db_conect_error()
    {
        
        $this->loadView('error',[
            'title' => 'error'
        ]);
    }

    public function not_found()
    {
        $this->loadView('notFound',[
            'title' => 'NotFound'
        ]);
    }
    
    public function enviar_alerta($tipo,$mensagem1,$mensagem2,$url){
     // Configuração de cookies
    setcookie('alerta', $tipo, time() + 3600, '/');
    setcookie('mensagem1', $mensagem1, time() + 3600, '/');
    setcookie('mensagem2', $mensagem2, time() + 3600, '/');
    
    // Redireciona para a próxima página 
    header("Location: $url");
    exit;
    
    }
    
}
