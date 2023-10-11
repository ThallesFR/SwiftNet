<?php
// Simulação de dados de usuário
$userData = [
    'nome' => 'Nome do Usuário',
    'nome_da_mae'=>'Maria do bairro',
    'nascimento' => '01/01/1990',
    'CPF' => '123.456.789-00',
    'celular' => '(12) 3456-7890',
    'email' => 'usuario@example.com',
    'CEP' => '12345-678',
    'UF' => 'SP',
    'cidade' => 'São Paulo',
    'bairro' => 'Bairro Exemplo',
    'numero' => '123',
    'complemento' => 'Apto 101',
];

// Simulação de pedidos concluídos
$numeroPedidos = 3; // Número de pedidos
$findPedidos = [
    (object) [
        'id' => "SwiftMais",
        'created_at' => '2023-09-28 ',
        'valor' => 'R$ 100.00',
    ],
    (object) [
        'id' => "SwiftBasic",
        'created_at' => '2023-09-27 ',
        'valor' => 'R$ 75.50',
    ],
    (object) [
        'id' => "SwiftMaster",
        'created_at' => '2023-09-26 ',
        'valor' => 'R$ 50.25',
    ],
];
?>
