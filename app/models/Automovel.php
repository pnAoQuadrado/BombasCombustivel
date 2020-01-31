<?php

namespace App\models;

class Automovel extends Model {

    protected $table = "automovel";

    public function getAutomovel($param) {
        $sql  = "select a.idautomovel, a.num_matricula, p.nome, p.num_bi, p.telefone
                from {$this->table} a inner join proprietario p
                on (a.idproprietario = p.idproprietario)
                where a.num_matricula = :matricula";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':matricula', $param);
        $stmt->execute();

        return $stmt->fetch();
    }
}