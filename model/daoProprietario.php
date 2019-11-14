<?php

include_once 'connection.php';

class daoProprietario {

    private $id;
    private $nome;
    private $bi;
    private $telefone;

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
    function constructArg($id, $nome, $bi, $tel) {
        $this->id = $id;
        $this->nome = $nome;
        $this->bi = $bi;
        $this->telefone = $tel;
    }

    // completar funcion para insertar los datos de una reunión, tener en cuenta la estructura de la base de datos.
    function insertProprietario() {
        $sql="INSERT INTO proprietario (nome, num_bi, telefone) VALUES ('$this->nome', '$this->bi', '$this->telefone')";
        
        $con=new connection();
        $con->executeQuery($sql);
    }

    function getProprietarios($id=""){

        $sql="SELECT 
                     idproprietario,
                    nome,
                      num_bi,
                      telefone
                    FROM
                      proprietario";
        $con=new connection();
        return $con->getResult($sql);
    }

    function getProprietario($id=""){

        $sql="SELECT 
            idproprietario,
            nome,
            num_bi,
            telefone
        FROM
          proprietario
        WHERE idproprietario = '$id'
          ";
        $con=new connection();
        return $con->getResult($sql);
    }

    function  updateProprietario(){
        $sql="UPDATE proprietario set nome='$this->nome', num_bi = '$this->bi', telefone='$this->telefone' WHERE idproprietario=$this->id";
        $con=new connection();
        $con->executeQuery($sql);
    }

    function deleteMaterial($id){
               $sql="Delete from material where idmaterial=$id";
               $con= new connection();
               $con->executeQuery($sql);
    }

}

?>
