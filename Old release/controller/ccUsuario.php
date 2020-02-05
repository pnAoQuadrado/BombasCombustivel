<?php
include '../model/daoUsuario.php';

extract($_REQUEST);
ob_start();


if (isset($accion)) {
    switch ($accion) {
        case 'adicionar';
        {
                $ob = new daoUsuario($id, $txtUser, $txtSenha, $txtNome, $cmbPerm);
                $ob->insertUsuario();
                header("Location:../admin/pages/template.php?opcion=6");
        }
        break;

        case 'alterar';
        {
            $ob = new daoUsuario($id, $txtUser, $txtSenha, $txtNome, $cmbPerm);
            $ob->updateUsuario();
            header("Location:../admin/pages/template.php?opcion=6");
        }
        break;

        case 'eliminar';
        {
            $ob = new daoUsuario();
            $ob->deleteUsuario($id);
            header("Location:../admin/pages/template.php?opcion=6");
        }
        break;
        case 'close':{
            session_start();
            session_destroy();
            if($modulo =='admin'){
                header("Location:../admin/index.php");
            }
            else if($modulo == 'bombas'){
                header("Location:../index.php");
            }
           
        }
    }
}


if(isset($login)){

    $ob=new daoUsuario();
    $result=$ob->authenticate($user, $pass);

    if($modulo == 'admin'){
        if($result){
            if($result[0]['descricao'] == 'Administrador'){
                session_start();
                  $_SESSION['user']=array('nome'=>$result[0]['nome'],'descricao'=>$result[0]['descricao']);
                header("Location:../admin/pages/template.php?opcion=0");
            }
            else{
                header("Location:../admin/index.php?msg=Permissão negada. Apenas para administradores");
            }
        }
        else{
            header("Location:../admin/index.php?msg=Dados de usuário incorrectos");
        }
       
    }
    else if($modulo == 'bombas'){
        if($result){
            session_start();
              $_SESSION['user']=array('nome'=>$result[0]['nome'],'descricao'=>$result[0]['descricao']);
            header("Location:../view/validar.php");
        }
        else{
            header("Location:../index.php");
        }
    }
    
}

?>