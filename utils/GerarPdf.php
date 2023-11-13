<?php


$pdf = new TCPDF();
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();

$html = '<table border="1">';
$html .= '<h1> Usuários SwiftNet </h1> <br><br> <tr><th> ID </th><th> Nome </th><th> Email </th></tr>';

foreach ($result as $row) {
    $html .= '<tr> ';
    $html .= '<td> ' . $row['id_usuario'] . '</td>';
    $html .= '<td> ' . $row['usuario_nome'] . '</td>';
    $html .= '<td> ' . $row['usuario_email'] . '</td>';
    $html .= '</tr> ';
}

$html .= '</table>';
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('relatorio.pdf', 'D');
?>