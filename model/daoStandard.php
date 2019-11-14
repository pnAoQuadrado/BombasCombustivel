<?php

include_once 'connection.php';

class daoStandard
{
    function __construct()
    {

    }

    function getProprietarios() {
         $sql="SELECT idproprietario, nome FROM proprietario;";
         $con=new connection();
         return $con->getResult($sql);
    }

    function getPermissoes() {
        $sql="SELECT * FROM permissao;";
        $con=new connection();
        return $con->getResult($sql);
    }

    function qtdAuto() {
        $sql="SELECT COUNT(idautomovel) as qtd FROM automovel;";
        $con=new connection();
        return $con->getResult($sql);
    }

    function qtdProp() {
        $sql="SELECT COUNT(idproprietario) as qtd FROM proprietario;";
        $con=new connection();
        return $con->getResult($sql);
    }
}

