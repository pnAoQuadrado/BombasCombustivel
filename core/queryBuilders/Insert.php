<?php

namespace Core\queryBuilders;

class Insert {

    public static function query($table, $attributes) {
        $query = "INSERT INTO {$table}("
                .implode(',' , array_keys($attributes))
                .") VALUES(:"
                .implode(', :' , array_keys($attributes))
                .")";
        return $query;
    }
}