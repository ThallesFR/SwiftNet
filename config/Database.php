<?php
class Database
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
        }
    }
}
