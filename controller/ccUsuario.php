<?php
include '../model/daoUsuario.php';

extract($_REQUEST);
ob_start();


if (isset($action)) {

    switch ($action) {
        case 'add';
            {

//validaciones
                switch ($tipoPerson) {
                    case 1:
                        {
                            $ob = new daoStudent($user, $pass, $name, $age, $sex,$turma);
                            $ob->insertStudent();
                            header("Location:../view/template.php?opcion=2");
                        }
                        break;
                    case 2:
                        {
                            $ob = new daoTeacher($idUser,$user, $pass, $name, $age, $sex,$materia);
                            $ob->insertTeacher();
                            header("Location:../view/template.php?opcion=3");
                        }
                        break;
                }

            }
            break;
        case 'update':{
            switch ($tipoPerson) {
                case 1:
                    {

                    }
                    break;
                case 2:
                    {
                         $ob = new daoTeacher($id,$user, $pass, $name, $age, $sex,$materia);
                        $ob->updateTeacher();
                        header("Location:../view/template.php?opcion=3");
                    }
                    break;
            }
        }break;
        case 'delete':{
            switch ($type) {
                case 1:
                    {

                    }
                    break;
                case 2:
                    {

                        $ob = new daoTeacher();
                        $ob->deleteTeacher($userId);
                        header("Location:../view/template.php?opcion=3");
                    }
                    break;
            }
        }break;
        case 'close':{
            session_start();
            session_destroy();
            header("Location:../index.php");
        }



    }
}


if(isset($login)){
    $ob=new daoUsuario();
    $result=$ob->authenticate($user, $pass);
    if($result){
        session_start();
          $_SESSION['user']=array('nome'=>$result[0]['nome'],'descricao'=>$result[0]['descricao']);
        header("Location:../view/validar.php");
    }
    else{
        header("Location:../view/index.php");
    }
}

?>