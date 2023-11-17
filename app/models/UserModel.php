<?php


class UserModel extends DatabaseConect
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    public function select_tabel()
    {
        $stm = $this->pdo->query("SELECT * FROM usuario");
        if ($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }


    public function select_id($id)
    {
        $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
        $stm->bindValue(":id", $id);
        $stm->execute();

        // Use fetch para obter uma única linha (um usuário) ou fetchAll para obter todas as linhas
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function pesquisa_id($pesquisa)
    {
        $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE usuario_nome LIKE :pesquisa");
        $stm->bindValue(":pesquisa", "%$pesquisa%");
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function select_login_cpf($login, $cpf, $email)
    {
        $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE usuario_login = :login_user OR usuario_cpf = :cpf OR usuario_email = :email");
        $stm->bindValue(":login_user", $login);
        $stm->bindValue(":cpf", $cpf);
        $stm->bindValue(":email", $email);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }


    public function insert($dados)
    {
        $colunas = implode(", ", array_keys($dados));
        $valores = ":" . implode(", :", array_keys($dados));
        $stm = $this->pdo->prepare("INSERT INTO usuario ($colunas) VALUES ($valores)");
        foreach ($dados as $key => $value) {
            $stm->bindValue(":$key", $value);
        }
        return $stm->execute();
    }

    public function update_senha($id,  $novaSenha)
    {
        $stm = $this->pdo->prepare("UPDATE usuario SET usuario_senha = :novaSenha WHERE id_usuario = :id");
        $stm->bindValue(":novaSenha", $novaSenha);
        $stm->bindValue(":id", $id);

        return $stm->execute();
    }



    public function delete($id)
    {
        $stm = $this->pdo->prepare("DELETE FROM usuario WHERE id_usuario =:id");
        $stm->bindValue(":id", $id);
        return $stm->execute();
    }
}
