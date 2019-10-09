<?php

/**
 * Class connection
 *
 * Esta clase esta hecha con los metodos de "mysqli_" para asegurar compatibilidad con PHP 7.0+
 */
class connection
{

    public $connection;

    /**
     * @var mysqli
     */
    private $conn;

    private $host;
    private $user;
    private $password;
    private $dataBaseName;
    private $port;

    function __construct()
    {
        $this->conn = false;
        $this->host = "127.0.0.1"; // host
        $this->user = "root"; // usuario
        $this->password = "admin#1234"; // password
        $this->dataBaseName = "sabc_cps"; // nombre de la BD
        $this->port = 3306;
        $this->connect();
    }

    function connect()
    {
      
        if (!$this->conn) {

            $this->conn = mysqli_connect($this->host, $this->user, $this->password);
            mysqli_select_db($this->conn, $this->dataBaseName);

            if (!$this->conn) {
                $this->status_fatal = true;
                echo 'Connection BD failed';
                die();
            } else {
                $this->status_fatal = false;
            }
        }

        return $this->conn;

    }

    function executeQuery($sql)
    {
        // Con mysql_ se ponen los parametros de forma inversa
        // el parametro de la conexion es opcional
        $r = mysqli_query($this->conn, $sql);
            // Con mysql_ el parametro de la conexion es opcional
//$id = mysqli_insert_id($this->conn);
//$this->conn->insert_id;
        return $r;
    }

    function getResult($sql)
    {
        $r = $this->executeQuery($sql);
        $output = array();

        while ($r != false && $record = mysqli_fetch_assoc($r)) {
            $output[] = $record;
        }

        return $output;
    }


    function closeSession()
    {
        // Con mysql_ el parametro de la conexion es opcional
        mysqli_close($this->conn);
    }

    function lastId($id,$table){
        $sql="SELECT max($id) as lastid FROM $table WHERE 1";
		$res=$this->getResult($sql);
		
        return $res[0]['lastid'];
    }

}

?>
