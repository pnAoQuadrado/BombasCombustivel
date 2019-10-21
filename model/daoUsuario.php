<?php

include_once 'connection.php';

class daoUsuario {
    public $iduser;
    public $user;
    public $pass;
    public $name;

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
        function constructArg($idUser,$user, $pass, $name) {
        $this->iduser = $idUser;
        $this->user = $user;
        $this->pass = $pass;
        $this->name = $name;
    }


    // completar funcion para insertar los datos de una reunión, tener en cuenta la estructura de la base de datos.
    function insertPerson() {
        $pass=md5($this->pass);
        $sql="INSERT INTO user(user, pass, name, age, idSex,idRole) VALUES ('$this->user', '$pass', '$this->name', $this->age, $this->sex,1)";
        $con=new connection();
        $con->executeQuery($sql);
        $id=$con->lastId('idUser','user');
          return $id;

    }

    function getPerson($id=""){
        if($id>0){
            $where="WHERE
  user.idUser = $id";
        }else{
            $where="";
        }

        $sql="SELECT 
                      user.user,
                      user.name,
                      user.age,
                      user.pass,
                      sex.description AS sex,                     
                      user.idUser,                      
                      sex.idSex
                    FROM
                      user
                      INNER JOIN sex ON (user.idSex = sex.idSex)               
                   $where
                      ";

        $con=new connection();
        return $con->getResult($sql);
    }

    function deletePerson($id){
        $sql="Delete from user where idUser=$id";
        $con= new connection();
        $con->executeQuery($sql);

    }

    function updatePerson(){
        $sql="UPDATE user set user='$this->user',  pass='$this->pass', 
                       name='$this->name',age=$this->age,  idSex=$this->sex                     
 WHERE idUser=$this->iduser";
        $con=new connection();
        $con->executeQuery($sql);
    }

    function authenticate($user, $pass){
        $pass=md5($pass);
        $sql="SELECT   
                    u.iduser,
                      u.nome,
                  p.descricao
                FROM
                  user u
                  INNER JOIN permissao p ON (u.idpermissao = p.idpermissao)
                      WHERE
                  u.nome_usu = '$user' AND u.senha='$pass'";

        $con=new connection();
        $res=$con->getResult($sql);

        //echo $res[0]['iduser'];die;

        if($res[0]['iduser']>0)
            return $res;
        else return false;
    }
}

?>
