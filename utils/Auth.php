<?php
class Auth extends DatabaseConect
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    public function login($Post_login, $Post_senha)
    {
        if (!empty($Post_login) && !empty($Post_senha)) {
            $sql_code = "SELECT id_usuario, usuario_tipo FROM usuario WHERE usuario_login = :usuario_login AND usuario_senha = :senha";
            $stmt = $this->pdo->prepare($sql_code);
            $stmt->bindParam(':usuario_login', $Post_login);
            $stmt->bindParam(':senha', $Post_senha);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario['usuario_tipo'] == "comum") {
                // Redireciona para a página 'autenticacao' passando os parâmetros via URL
                header("Location: autenticacao/asdklksdaas648/" . $usuario['id_usuario']);
            } else {
                echo "Falha ao logar! login ou senha incorretos";
            }
        } else {
            echo "Preencha o login e senha corretamente";
        }
    }


    // Definição da função de autenticação que recebe os parâmetros: 
    public function autenticacao($Post_pergunta, $Post_resposta, $id_user)
    {
        // Verifica se os campos não estão vazios
        if (!empty($Post_resposta) && !empty($Post_pergunta) && !empty($id_user)) {

            // define o campo que cada pergunta busca na tabela usuário
            if ($Post_pergunta == 'Qual o nome da sua mãe completo?') {
                $resposta = "usuario_mae";
            }

            if ($Post_pergunta == 'Qual a data do seu nascimento?') {
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

            // Verifica se a consulta retornou algum resultado
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
            } else {
                // Exibe uma mensagem de erro se o login ou a senha estiverem incorretos
                echo "Falha ao logar! Reposta incorreta";
            }
        } else {
            // Exibe uma mensagem de erro se os campos de login e senha não foram preenchidos corretamente
            echo "Preencha a resposta corretamente";
        }
    }



    public function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        session_destroy();

        header('Location: http://localhost/SwiftNet/');
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
