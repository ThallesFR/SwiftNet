<?php

class LogsModel extends DatabaseConect
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    public function select_tabel()
    {
        $stm= $this->pdo->query("SELECT * FROM logs");
        if ($stm->rowCount() > 0 ){
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return [];
        }

    }

    public function select_by_id_logs_user($id)
    {
        $stm= $this->pdo->query("SELECT * FROM logs WHERE  log_user= $id");
        if ($stm->rowCount() > 0 ){
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return [];
        }

    }

    
    public function insert($dados)
    {
        $colunas = implode(", ", array_keys($dados));
        $valores = ":" . implode(", :", array_keys($dados));
        $stm = $this->pdo->prepare("INSERT INTO logs ($colunas) VALUES ($valores)");
        foreach ($dados as $key => $value) {
            $stm->bindValue(":$key", $value);
        }
        return $stm->execute();
    }

    public function delete( $id)
    {
        $stm = $this->pdo->prepare("DELETE FROM logs WHERE log_user =:id");
        $stm->bindValue(":id", $id);
        return $stm->execute();
    }
    
}
