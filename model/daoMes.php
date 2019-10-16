<?php

include_once 'connection.php';

class daoMes {

    public $id;
    public $descricao;

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
    function constructArg($id, $desc) {
        $this->id = $id;
        $this->descricao = $desc;
    }

    // completar funcion para insertar los datos de una reunión, tener en cuenta la estructura de la base de datos.
    function insertAutomovel() {
        $sql="INSERT INTO automovel (num_matricula, idproprietario) VALUES ('$this->num_matricula', $this->id_prop)";
    
        $con=new connection();
        $con->executeQuery($sql);
    }

    function getMeses($id=""){

        $sql="SELECT 
                      *
                    FROM
                      mes
                      ";
        $con=new connection();
        return $con->getResult($sql);
    }

    function getMaterial($id=""){

        $sql="SELECT 
                  idmaterial,
                  descricao
                FROM
                  material
                WHERE
                  idmaterial = $id
                      ";

        $con=new connection();
        return $con->getResult($sql);
    }

    function  updateMaterial(){
        $sql="UPDATE material set descricao='$this->descricao' WHERE idmaterial=$this->id";
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
