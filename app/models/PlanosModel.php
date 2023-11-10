<?php


class PlanosModel extends DatabaseConect
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    public function select_tabel()
    {
        $stm= $this->pdo->query("SELECT * FROM planos");
        if ($stm->rowCount() > 0 ){
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return [];
        }

    }

    public function select_id($id)
    {
        $stm = $this->pdo->prepare("SELECT * FROM planos WHERE id_planos = :id");
        $stm->bindValue(":id", $id);
        $stm->execute();

        // Use fetch para obter uma única linha (um usuário) ou fetchAll para obter todas as linhas
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}
