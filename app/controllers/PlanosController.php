<?php

class PlanosController extends RenderViews
{
    public function index()
    {
        if (isset($_SESSION['user']) && $_SESSION['tipo'] == "master") {

            die(header('Location: http://localhost/SwiftNet/'));
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
            'F_Dados' => $F_Dados,
            'F_minutos' => $F_minutos,
            'velocidade' => $Velocidade
        ]);
    }

    public function cadastrar_plano()
    {

        if (!isset($_SESSION['user']) || $_SESSION['tipo'] == "master") {
            die(header('Location: http://localhost/SwiftNet/login'));
        }

        $contratos_model = new ContratosModel;
        $contratos_user = $contratos_model->select_id($_SESSION['user']);

        $Planos_model = new PlanosModel;
        $Planos_user_array = $Planos_model->select_id($_POST['id_planos']);
        $Planos_user = $Planos_user_array[0];

        foreach ($contratos_user as $contrato) {
            $contrato_tipo = $contrato['contratos_tipo'];

            if ($Planos_user['planos_tipo'] == $contrato_tipo) {

                echo 'Você já possui um contrato deste tipo em vigência';
                // die(header('Location: http://localhost/SwiftNet/planos'));
                die();
            }
        }
         // Obtém a data atual
         $dataAtual = date('Y-m-d');

         // Adiciona 1 ano à data atual correspondente à data de vigência
         $dataDaquiUmAno = date('Y-m-d', strtotime($dataAtual . ' + 1 year'));

         $novo_contrato['contratos_tipo'] = $Planos_user['planos_tipo'];
         $novo_contrato['contratos_nome'] = $Planos_user['planos_nome'];
         $novo_contrato['contratos_valor'] = $Planos_user['planos_valor'];
         $novo_contrato['contratos_user'] = $_SESSION['user'];
         $novo_contrato['contratos_vigencia'] = $dataDaquiUmAno;

         $contratos_model->insert($novo_contrato);
         die(header('Location: http://localhost/SwiftNet/perfil'));
    }
}
