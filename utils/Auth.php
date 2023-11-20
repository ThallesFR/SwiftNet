<?php
require __DIR__ . "/../app/controllers/AlertasController.php";

class Auth extends DatabaseConect
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    public function login($Post_login, $Post_senha, $Post_tipo)
    {
        $hashed_senha_fornecida = hash('sha256', $Post_senha);

        if (!empty($Post_login) && !empty($Post_senha) && !empty($Post_tipo)) {
            $sql_code = "SELECT id_usuario, usuario_tipo FROM usuario WHERE usuario_login = :usuario_login AND usuario_senha = :senha AND usuario_tipo = :tipo";
            $stmt = $this->pdo->prepare($sql_code);
            $stmt->bindParam(':usuario_login', $Post_login);
            $stmt->bindParam(':senha', $hashed_senha_fornecida);
            $stmt->bindParam(':tipo', $Post_tipo);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario === false) {
                $controller_alert = new AlertasController();
                $controller_alert->enviar_alerta('danger', 'Falha ao logar!', ' Login ou senha incorretos.', 'http://localhost/SwiftNet/login');
                die();
            }


            if ($Post_tipo == "comum") {
                // Redireciona para a página 'autenticacao' passando os parâmetros via URL
                header("Location: autenticacao/asdklksdaas648/" . $usuario['id_usuario']);
            }

            if ($Post_tipo == "master") {
                if ($usuario) {
                    // Verifica se a sessão já foi iniciada
                    if (!isset($_SESSION)) {
                        // Inicia a sessão
                        session_start();
                    }

                    // Armazena o ID do usuário e o tipo de usuário na sessão
                    $_SESSION['user'] = $usuario['id_usuario'];
                    $_SESSION['tipo'] = $usuario['usuario_tipo'];

                    // Redireciona o usuário para a página inicial
                    header('Location: http://localhost/SwiftNet/');
                }
            }
        } else {
            $controller_alert = new AlertasController();
            $controller_alert->enviar_alerta('danger', 'Campos vazios!', 'Preencha o login e a senha.', 'http://localhost/SwiftNet/login');
            die();
        }
    }


    // Definição da função de autenticação que recebe os parâmetros: 
    public function autenticacao($Post_pergunta, $Post_resposta, $id_user)
    {
        if ($Post_resposta == '') {
            // Exibe uma mensagem de erro se os campos de login e senha não foram preenchidos corretamente
            $controller_alert = new AlertasController();
            $controller_alert->enviar_alerta('danger', 'Campos vazios!', 'Preencha o campo resposta quando logar.', 'http://localhost/SwiftNet/login');
            die();
        }
        // Verifica se os campos não estão vazios
        if (!empty($Post_resposta) && !empty($Post_pergunta) && !empty($id_user)) {

            // define o campo que cada pergunta busca na tabela usuário
            if ($Post_pergunta == 'Qual o nome completo da sua mãe?') {
                $resposta = "usuario_mae";
            }

            if ($Post_pergunta == 'Qual a sua data de nascimento?') {
                $resposta = "usuario_nascimento";
            }

            if ($Post_pergunta == 'Qual o CEP do seu endereço?') {
                $resposta = "usuario_cep";
            }

            // Define a consulta SQL para selecionar o usuário com os parâmetros  fornecidos
            $sql_code = "SELECT * FROM usuario WHERE id_usuario = :usuario AND $resposta = :resposta";

            // Prepara a consulta SQL
            $stmt = $this->pdo->prepare($sql_code);

            // Vincula os parâmetros de  à consulta SQL
            $stmt->bindParam(':resposta', $Post_resposta);
            $stmt->bindParam(':usuario', $id_user);

            // Executa a consulta SQL
            $stmt->execute();

            // Busca o resultado da consulta e armazena na variável $usuario
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);


            if ($usuario === false) {

                $controller_alert = new AlertasController();
                $controller_alert->enviar_alerta('danger', 'Resposta incorreta!', 'Preencha os campos novamente.', 'http://localhost/SwiftNet/login');
                die();
            }

            // Verifica se a consulta retornou algum resultado
            if ($usuario) {
                // Verifica se a sessão já foi iniciada
                if (!isset($_SESSION)) {
                    // Inicia a sessão
                    session_start();
                }

                // Armazena o ID e o tipo de usuário na sessão
                $_SESSION['user'] = $usuario['id_usuario'];
                $_SESSION['tipo'] = $usuario['usuario_tipo'];
            }
        }
    }



    public function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        session_destroy();
    }


    public function protect($tipo)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['user'])) {
            header('Location: http://localhost/SwiftNet/');
            die();
        } elseif ($_SESSION['tipo'] !== $tipo) {
            header('Location: http://localhost/SwiftNet/');
            die();
        }
    }
}
