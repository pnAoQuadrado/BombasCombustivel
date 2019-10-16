<?php

include_once 'connection.php';

class daoPagamento {

    public $id;
    public $data;
    public $id_mes;
    public $id_auto;

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
    function constructArg($id, $data, $mes, $auto) {
        $this->id = $id;
        $this->data = $data;
        $this->id_mes = $mes;
        $this->id_auto = $auto;
    }

    // completar funcion para insertar los datos de una reunión, tener en cuenta la estructura de la base de datos.
    function pagarSeguro() {
        $sql="UPDATE pag_seguro SET data_pag = '$this->data', idmes = $this->id_mes WHERE idautomovel = $this->id_auto";
        $con=new connection();
        $con->executeQuery($sql);
    }

    function getUltimoMesPagoTaxa($id=""){

        $sql="SELECT 
                      m.descricao
                    FROM
                      pag_taxa p
                      INNER JOIN mes m ON (m.idmes = p.idmes)
                      WHERE p.idautomovel = $id";
        $con=new connection();
        return $con->getResult($sql);
    }

    function getUltimoMesPagoTaxa_Number($id=""){

        $sql="SELECT 
                      idmes
                    FROM
                      pag_taxa
                      WHERE idautomovel = $id";
        $con=new connection();
        return $con->getResult($sql);
    }

    function getUltimoMesPagoSeguro($id=""){

        $sql="SELECT 
                      m.descricao
                    FROM
                      pag_seguro p
                      INNER JOIN mes m ON (m.idmes = p.idmes)
                      WHERE p.idautomovel = $id";
        $con=new connection();
        return $con->getResult($sql);
    }

    function getUltimoMesPagoSeguro_Number($id=""){

        $sql="SELECT 
                      idmes
                    FROM
                      pag_seguro
                      WHERE idautomovel = $id";
        $con=new connection();
        return $con->getResult($sql);
    }

    function getPagamentosSeguro(){

        $sql="SELECT 
                  p.idpag_seguro,
                  p.data_pag,
                  m.descricao,
                  a.num_matricula
                FROM
                  pag_seguro p
                  INNER JOIN mes m ON (m.idmes = p.idmes) 
                  INNER JOIN automovel a ON (a.idautomovel = p.idautomovel)";
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
