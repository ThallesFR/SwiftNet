<?php

class ContratosModel extends DatabaseConect
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    public function select_tabel()
    {
        $stm= $this->pdo->query("SELECT * FROM contratos");
        if ($stm->rowCount() > 0 ){
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return [];
        }

    }

    public function select_by_id_contratos_user($id)
    {
        $stm= $this->pdo->query("SELECT * FROM contratos WHERE  contratos_user= $id");
        if ($stm->rowCount() > 0 ){
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return [];
        }

    }

    public function delete( $id)
    {
        $stm = $this->pdo->prepare("DELETE FROM contratos WHERE contratos_user =:id");
        $stm->bindValue(":id", $id);
        return $stm->execute();
    }
    
}
