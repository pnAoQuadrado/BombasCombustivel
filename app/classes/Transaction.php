<?php

namespace app\classes;

use Throwable;
use Closure;

class Transaction extends Model {

    public function model($model) {
        return new $model;
    }

    public function transactions(Closure $callback) {
        $this->connection->beginTransaction();

        try {
            $callback();
            $this->connection->commit();
        } catch(Throwable $err) {
            $this->connection->rollback();
            dd($err->getMessage());
        }
    }
}