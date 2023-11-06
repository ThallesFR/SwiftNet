<?php


class F_minutosModel extends DatabaseConect
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    public function select_tabel()
    {
        $stm= $this->pdo->query("SELECT * FROM franquia_minutos");
        if ($stm->rowCount() > 0 ){
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return [];
        }

    }
   

    public function delete( $id)
    {
        $stm = $this->pdo->prepare("DELETE FROM franquia_minutos WHERE id_franquia_minutos =:id");
        $stm->bindValue(":id", $id);
        return $stm->execute();
    }

}
