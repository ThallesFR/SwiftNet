<?php 
class Includes extends DatabaseConect
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    public function select_tabel($tabela)
    {
        $stm= $this->pdo->query("SELECT * FROM $tabela");
        if ($stm->rowCount() > 0 ){
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return [];
        }

    }

    public function select_id($tabela, $id)
    {
        $stm= $this->pdo->query("SELECT * FROM $tabela WHERE id = $id");
        if ($stm->rowCount() > 0 ){
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return [];
        }

    }

    public function insert($tabela, $dados)
    {
        $colunas = implode(", ", array_keys($dados));
        $valores = ":" . implode(", :", array_keys($dados));
        $stm = $this->pdo->prepare("INSERT INTO $tabela ($colunas) VALUES ($valores)");
        foreach ($dados as $key => $value) {
            $stm->bindValue(":$key", $value);
        }
        return $stm->execute();
    }

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
    }

    public function delete($tabela, $id)
    {
        $stm = $this->pdo->prepare("DELETE FROM $tabela WHERE id=:id");
        $stm->bindValue(":id", $id);
        return $stm->execute();
    }


    }
