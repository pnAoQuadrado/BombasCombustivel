<?php

include_once 'connection.php';

class daoAutomovel {

    public $id;
    public $num_matricula;
    public $id_prop;

    function __construct() {

        $a = func_get_args();
        $i = func_num_args();
        if($i>0){
            call_user_func_array(array($this,'constructArg'),$a);
        }else{

            call_user_func_array(array($this,'constructEmpty'),$a);
        }
    }

    //constructor que será invocado por defecto
    function constructEmpty() {

    }

    //constructor que será invocado si se le pasan argumentos
    function constructArg($id, $matr, $prop) {
        $this->id = $id;
        $this->num_matricula = $matr;
        $this->id_prop = $prop;
    }

    // completar funcion para insertar los datos de una reunión, tener en cuenta la estructura de la base de datos.
    function insertAutomovel() {
        $sql="INSERT INTO automovel (num_matricula, idproprietario) VALUES ('$this->num_matricula', $this->id_prop)";
        $con=new connection();
        $con->executeQuery($sql);
        $this->insertTaxa();
        $this->insertSeguro();
    }

    function insertTaxa() {
        $data_actual = new DateTime();
        $result = $data_actual->format('Y-m-d H:i:s');
        $con=new connection();
        $idAuto = $con->lastId('idautomovel', 'automovel');
        $sql="INSERT INTO pag_taxa (data_pag, idmes, idautomovel) VALUES ('$result', 1, $idAuto)";
        $con->executeQuery($sql);
    }

    function insertSeguro() {
        $data_actual = new DateTime();
        $result = $data_actual->format('Y-m-d H:i:s');
        $con=new connection();
        $idAuto = $con->lastId('idautomovel', 'automovel');
        $sql="INSERT INTO pag_seguro (data_pag, idmes, idautomovel) VALUES ('$result', 1, $idAuto)";
        $con->executeQuery($sql);
    }

    function getAutomoveis($id=""){

        $sql="SELECT 
                      a.idautomovel,
                      a.num_matricula,
                      p.nome,
                      p.num_bi,
                      p.telefone
                    FROM
                      automovel a
                      INNER JOIN proprietario p ON (a.idproprietario = p.idproprietario)
                      WHERE a.num_matricula = '$id'";
        $con=new connection();
        return $con->getResult($sql);
    }

    function getAuto($id=""){

        $sql="SELECT 
            a.idautomovel,
            a.num_matricula,
            a.idproprietario
        FROM
          automovel a
        WHERE a.idautomovel = '$id'
          ";
        $con=new connection();
        return $con->getResult($sql);
    }

    function getRegistos($id=""){

        $sql="SELECT 
                    a.idautomovel,
                      a.num_matricula,
                      p.nome
                    FROM
                      automovel a
                      INNER JOIN proprietario p ON (a.idproprietario = p.idproprietario)
                      ";

        $con=new connection();
        return $con->getResult($sql);
    }

    function  updateAutomovel(){
        $sql="UPDATE automovel set num_matricula='$this->num_matricula', idproprietario = $this->id_prop WHERE idautomovel=$this->id";
        $con=new connection();
        $con->executeQuery($sql);
    }

    function deleteAutomovel($id){
               $sql="delete from automovel where idautomovel=$id";
               echo $sql;die;
               $con= new connection();
               $con->executeQuery($sql);
    }

}

?>
