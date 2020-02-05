<?php

namespace Core;

use Core\traits\PersistDB;
use Core\Container;

abstract class BaseModel {

    protected $connection;
    protected $table;

    use PersistDB;

    public function __construct() {
        $this->connection = Container::getConn('connection');
    }

    public function All() {
        $query = "SELECT * FROM {$this->table}";
        $stmt  = $this->connection->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll();

        $stmt->closeCursor();

        return $result;
    }

    public function FindById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt  = $this->connection->prepare($query);

        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch();

        $stmt->closeCursor();

        return $result;
    }

    public function Delete($field, $value) {
        $query = "DELETE FROM {$this->table} WHERE {$field} = :value";
        $stmt  = $this->connection->prepare($query);

        $stmt->bindValue(':value', $value);
        $stmt->execute();

        $result = $stmt->rowCount();

        $stmt->closeCursor();

        return $result;
    }
}