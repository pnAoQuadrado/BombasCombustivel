<?php

namespace app\models;

class Taxa extends Model {

    protected $table = "pag_taxa";

    public function getPagamentosTaxa() {
        $sql  = "select p.idpag_taxa, p.data_pag, m.descricao, a.num_matricula
                from {$this->table} p inner join mes m on (m.idmes = p.idmes)
                inner join automovel a on (a.idautomovel = p.idautomovel)";
        $stmt = $this->connection->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getUltimoMesPagoTaxa($param) {
        $sql  = "select m.descricao from {$this->table} p
                inner join mes m on (m.idmes = p.idmes)
                where p.idautomovel = :id";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':id', $param);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getUltimoMesPagoTaxa_Number($param){
        $sql  = "select idmes from {$this->table}
                where idautomovel = :id";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':id', $param);
        $stmt->execute();

        return $stmt->fetch();
    }
}