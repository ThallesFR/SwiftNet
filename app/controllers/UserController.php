<?php
require __DIR__ . '/../../libraries/tcpdf/tcpdf.php';


class UserController extends RenderViews
{
    public function index()
    {
        $Auth = new Auth();
        $Auth->protect('master');

        $usuarios_model = new UserModel();

        if (!isset($_POST['busca'])) {
            $usuarios = $usuarios_model->select_tabel();
        } else {
            $pesquisa = $_POST['busca'];
            $usuarios = $usuarios_model->pesquisa_id($pesquisa);
        }

        $contratos_model = new ContratosModel();
        $contratos = $contratos_model->select_tabel();

        $logs_model = new LogsModel();
        $logs = $logs_model->select_tabel();

        $_2faModel = new _2faModel();
        $_2fa = $_2faModel->select_tabel();

        $this->loadView('usuarios', [
            'title' => 'Usuários',
            'usuarios' => $usuarios,
            'contratos' => $contratos,
            'logs' => $logs,
            'perguntas' => $_2fa

        ]);
    }

    public function delete_user($id)
    {
        $id_user = $id[0];
        $contratos_model = new ContratosModel();
        $contratos_model->delete($id_user);

        $logs_model = new LogsModel();
        $logs_model->delete($id_user);

        $usuarios_model = new UserModel();
        $usuarios_model->delete($id_user);

        header('location: http://localhost/SwiftNet/usuarios');
    }

    public function gerar_pdf($id)
    {
        ob_end_clean(); // Limpa o buffer de saída antes de gerar o PDF
        ob_start(); // Inicia o buffer de saída

        $id_user = $id[0];


        $logs_model = new LogsModel();
        $logs = $logs_model->select_by_id_logs_user($id_user);

        $usuario_model = new UserModel();
        $usuario = $usuario_model->select_id($id_user);

        $pdf = new TCPDF();
        $pdf->SetMargins(10, 10, 10);
        $pdf->AddPage();

        $html = '<table border="1">';
        $html .= '<h1> Logs do usuário ' . $usuario['usuario_nome'] . '.</h1> <br><br> <tr><th> Tipo </th><th> Autenticação </th><th> Data/hora </th></tr>';

        foreach ($logs as $row) {
            $html .= '<tr> ';
            $html .= '<td> ' . $row['log_tipo'] . '</td>';
            $html .= '<td> ' . $row['log_2fa'] . '</td>';
            $html .= '<td> ' . date("d/m/Y H:i:s", strtotime($row['log_data'])) . '</td>';
            $html .= '</tr> ';
        }

        $html .= '</table>';
        $pdf->writeHTML($html, true, false, true, false, '');

        ob_end_clean(); // Limpa o buffer de saída antes de gerar o PDF

        $pdf->Output('relatorio.pdf', 'D');
    }
}
