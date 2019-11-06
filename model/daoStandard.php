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



    function getClasses() {
        $sql="SELECT * FROM tbclasse;";
        $con=new connection();
        return $con->getResult($sql);
    }

    function getCursos() {
        $sql="SELECT * FROM tbcurso;";
        $con=new connection();
        return $con->getResult($sql);
    }

    function getTurnos() {
        $sql="SELECT * FROM tbturno;";
        $con=new connection();
        return $con->getResult($sql);
    }

    function getAutores() {
        $sql="SELECT * FROM autor;";
        $con=new connection();
        return $con->getResult($sql);
    }

    function getTecnicas() {
        $sql="SELECT * FROM tecnica;";
        $con=new connection();
        return $con->getResult($sql);
    }

    function getMateriais() {
        $sql="SELECT * FROM material;";
        $con=new connection();
        return $con->getResult($sql);
    }
}

