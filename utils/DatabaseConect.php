<?php
class DatabaseConect
{
    public function getConnection()
    {
        $envFile = __DIR__ . '../../.env';// acessa o .env

        if (file_exists($envFile)) { // se existir o arquivo 
            $env = parse_ini_file($envFile);// lê ele e retorna um array
        } else {
            die('.env file not found.');
        }

        $host = $env['DB_HOST'];
        $database = $env['DB_DATABASE'];
        $user = $env['DB_USER'];
        $password = $env['DB_PASSWORD'];

        try {
            $pdo = new PDO("mysql:dbname={$database};host={$host}", $user, $password);
            return $pdo;
        } catch (PDOException $err) {
            require_once __DIR__."/../app/controllers/AlertasController.php";
            $controller = new AlertasController();
            $controller->db_conect_error();
            die();
        }
    }
}
