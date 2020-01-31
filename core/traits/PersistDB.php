<?php

namespace Core\traits;

use Core\queryBuilders\Insert;
use Core\queryBuilders\Update;
use Throwable;

trait PersistDB {

    public function Insert($attributes) {
        $this->connection->beginTransaction();

        try {
            $attributes = (array) $attributes;
            $query      = Insert::query($this->table, $attributes);
            $stmt       = $this->connection->prepare($query);
            $result     = $stmt->execute($attributes);

            $stmt->closeCursor();
            $this->connection->commit();

            return $result;
        } catch(Throwable $error) {
            $this->connection->rollback();
            dd($error->getMessage());
        }
    }

    public function Update($where, $attributes) {
        $this->connection->beginTransaction();

        try {
            $attributes = (array) $attributes;
            $query      = (new Update)->where($where)->query($this->table, $attributes);
            $stmt       = $this->connection->prepare($query);
            $result     = $stmt->execute($attributes);

            $stmt->closeCursor();
            $this->connection->commit();

            return $result;
        }catch(Throwable $error) {
            $this->connection->rollback();
            dd($error->getMessage());
        }
    }
}