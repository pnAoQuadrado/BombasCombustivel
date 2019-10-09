<?php

include '../model/daoAutomovel.php';
extract($_REQUEST);

if (isset($action)) {

    switch ($action) {
        case 'pesquisar';
            {

                $ob = new daoAutomovel();
                $ob->getAutomoveis($txtPesq);
                header("Location:../view/index3.php");

            }
            break;
    }
}
?>