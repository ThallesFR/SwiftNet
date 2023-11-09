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
        $stm= $this->pdo->query("SELECT * FROM usuario");
        if ($stm->rowCount() > 0 ){
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return [];
        }

    }

    public function insert( $dados)
    {
        $colunas = implode(", ", array_keys($dados));
        $valores = ":" . implode(", :", array_keys($dados));
        $stm = $this->pdo->prepare("INSERT INTO usuario ($colunas) VALUES ($valores)");
        foreach ($dados as $key => $value) {
            $stm->bindValue(":$key", $value);
        }
        return $stm->execute();
    }
    /*
    public function update($tabela, $dados, $id)
    {
        $set = "";
        foreach ($dados as $key => $value) {
            $set .= "$key=:$key, ";
        }
        $set = rtrim($set, ", ");
        $stm = $this->pdo->prepare("UPDATE $tabela SET $set WHERE id=:id");
        foreach ($dados as $key => $value) {
            $stm->bindValue(":$key", $value);
        }
        $stm->bindValue(":id", $id);
        return $stm->execute();
    }*/

    public function delete( $id)
    {
        $stm = $this->pdo->prepare("DELETE FROM usuario WHERE id_usuario =:id");
        $stm->bindValue(":id", $id);
        return $stm->execute();
    }

}
