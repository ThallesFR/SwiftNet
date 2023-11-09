<?php

class PlanosController extends RenderViews
{
    public function index()
    {       
        if(isset($_SESSION['user'])&& $_SESSION['tipo'] == "master"){
            header('Location: http://localhost/SwiftNet/');
            die();
        }

        $planos_model = new PlanosModel();
        $planos = $planos_model->select_tabel();

        
        $F_Dados_model = new F_DadosModel();
        $F_Dados = $F_Dados_model->select_tabel();
  
        $F_minutos_model = new F_minutosModel();
        $F_minutos = $F_minutos_model->select_tabel();

        $VelocidadeModel = new VelocidadeModel();
        $Velocidade = $VelocidadeModel->select_tabel();

        $this->loadView('planos', [
            'title' => 'Planos',
            'planos' => $planos,
            'F_Dados' =>$F_Dados,
            'F_minutos' =>$F_minutos,
            'velocidade' => $Velocidade
            
        ]);
    }
   
}
