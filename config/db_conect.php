<?php
$envFile = __DIR__ . '../../.env';

if (file_exists($envFile)) {
    $env = parse_ini_file($envFile);
} else {
    die('.env file not found.');
}

$host = $env['DB_HOST'];
$database = $env['DB_DATABASE'];
$user = $env['DB_USER'];
$password = $env['DB_PASSWORD'];

$mysqli = new mysqli($host, $user, $password, $database);

try {
    if ($mysqli->connect_error) {
        throw new Exception("Falha ao conectar ao banco de dados: " . $mysqli->connect_error);
    }

    // Resto do seu código

} catch (Exception $e) {
    // Algo deu errado na conexão ou em outra parte do código
    // Redirecionar para a página de erro
    header('Location: erro.php');
    exit; // Termina a execução do script
}
?>
