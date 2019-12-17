<?php

namespace app\classes;

use app\traits\PersistDB;
use app\classes\Bind;

abstract class Model {

    use PersistDB;

    protected $connection;

    public function __construct() {
        $this->connection = Bind::getConn('connection');
    }

    public function getAll() {
        
    }
}