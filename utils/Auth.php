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
            $sql_code = "SELECT * FROM usuario WHERE usuario_login = :usuario_login AND usuario_senha = :senha";
            $stmt = $this->pdo->prepare($sql_code);
            $stmt->bindParam(':usuario_login', $Post_login);
            $stmt->bindParam(':senha', $Post_senha);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['user'] = $usuario['id_usuario'];
                $_SESSION['tipo'] = $usuario['usuario_tipo'];

                header('Location: home');
            } else {
                echo "Falha ao logar! login ou senha incorretos";
            }
        } else {
            echo "Preencha o login e senha corretamente";
        }
    }


    public function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        session_destroy();

        header('Location: home');
    }


    public function protect($tipo)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header('Location: home');
            die();
        } elseif ($_SESSION['tipo'] !== $tipo) {
            header('Location: home');
            die();
        }
    }
}
