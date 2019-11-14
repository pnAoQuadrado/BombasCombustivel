<?php

include '../model/daoProprietario.php';

extract($_REQUEST);

if (isset($accion)) {
    switch ($accion) {
        case 'adicionar';
        {
                $ob = new daoProprietario($id, $txtNome, $txtBi, $txtTel);
                $ob->insertProprietario();
                header("Location:../admin/pages/template.php?opcion=4");
        }
        break;

        case 'alterar';
        {
            $ob = new daoProprietario($id, $txtNome, $txtBi, $txtTel);
            $ob->updateProprietario();
            header("Location:../admin/pages/template.php?opcion=4");
        }
        break;

        case 'eliminar';
        {
            $ob = new daoAutomovel();
            $ob->deletePrecoPropina($id);
            header("Location:../view/template.php?opcion=6");
        }
        break;
    }
}
?>