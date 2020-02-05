<?php

namespace App\models;

class Seguro extends Model {

    protected $table = "pag_seguro";

    public function getPagamentosSeguro() {
        $sql  = "select p.idpag_seguro, p.data_pag, m.descricao, a.num_matricula
                from {$this->table} p inner join mes m on (m.idmes = p.idmes)
                inner join automovel a on (a.idautomovel = p.idautomovel)";
        $stmt = $this->connection->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getUltimoMesPagoSeguro($param) {
        $sql  = "select m.descricao from {$this->table} p inner join
                mes m on (m.idmes = p.idmes) where p.idautomovel = :value";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':value', $param);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getUltimoMesPagoSeguro_Number($param) {
        $sql  = "select idmes from {$this->table} where idautomovel = :value";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':value', $param);
        $stmt->execute();

        return $stmt->fetch();
    }
}