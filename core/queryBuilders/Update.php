<?php

namespace Core\queryBuilders;

class Update {

    private $where;

    public function where($where) {
        $this->where = $where;
        return $this;
    }

    public function query($table, $attributes) {
        $query = "UPDATE {$table} SET ";
        unset($attributes[array_keys($this->where)[0]]);
        foreach($attributes as $key => $value) {
            $query .= "{$key} = :{$key}, ";
        }
        $where = array_keys($this->where);
        $query = rtrim($query, ", ");
        $query = " WHERE {$where[0]} = :{$where[0]}";
        return $query;
    }
}