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

    public function select_id($id)
    {
        $stm = $this->pdo->prepare("SELECT * FROM contratos WHERE contratos_user = :id");
        $stm->bindValue(":id", $id);
        $stm->execute();

        // Use fetch para obter uma única linha (um usuário) ou fetchAll para obter todas as linhas
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete( $id)
    {
        $stm = $this->pdo->prepare("DELETE FROM contratos WHERE contratos_user =:id");
        $stm->bindValue(":id", $id);
        return $stm->execute();
    }
    
}
