<?php

include_once 'connection.php';

class daoUsuario {

    private $iduser;
    private $user;
    private $pass;
    private $name;
    private $id_perm;

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

    //constructor que será invocado si se le pasan argumentos al llamar la clase dao_Person
        function constructArg($idUser,$user, $pass, $name, $perm) {
        $this->iduser = $idUser;
        $this->user = $user;
        $this->pass = $pass;
        $this->name = $name;
        $this->id_perm = $perm;
    }


    // completar funcion para insertar los datos de una reunión, tener en cuenta la estructura de la base de datos.
    function insertUsuario() {
        $sql="INSERT INTO user (nome, nome_usu, senha, idpermissao) VALUES ('$this->name', '$this->user', md5('$this->pass'),$this->id_perm)";
        $con=new connection();
        $con->executeQuery($sql);
    }

    function getUsuarios($id=""){

        $sql="SELECT 
                    u.iduser,
                      u.nome,
                      u.nome_usu,
                      p.descricao
                    FROM
                      user u
                      INNER JOIN permissao p ON (u.idpermissao = p.idpermissao)";

        $con=new connection();
        return $con->getResult($sql);
    }

    function getUsuario($id=""){

        $sql="SELECT 
                    u.iduser,
                      u.nome,
                      u.nome_usu,
                      p.idpermissao
                    FROM
                      user u
                      INNER JOIN permissao p ON (u.idpermissao = p.idpermissao) WHERE iduser = $id";

        $con=new connection();
        return $con->getResult($sql);
    }
    function deleteUsuario($id){
        $sql="delete from user where iduser=$id";
        $con= new connection();
        $con->executeQuery($sql);

    }

    function updateUsuario(){
        $sql="UPDATE user set nome='$this->name',  nome_usu='$this->user', 
                       idpermissao='$this->id_perm'                     
 WHERE iduser=$this->iduser";
        $con=new connection();
        $con->executeQuery($sql);
    }

    function authenticate($user, $pass){
       
        $sql="SELECT   
                    u.iduser,
                      u.nome,
                  p.descricao
                FROM
                  user u
                  INNER JOIN permissao p ON (u.idpermissao = p.idpermissao)
                      WHERE
                  u.nome_usu = '$user' AND u.senha=md5('$pass')";

        $con=new connection();
        $res=$con->getResult($sql);

        //echo $res[0]['iduser'];die;

        if($res[0]['iduser']>0)
            return $res;
        else return false;
    }
}

?>
