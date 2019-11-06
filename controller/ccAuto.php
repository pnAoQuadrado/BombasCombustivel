<?php

include '../model/daoAutomovel.php';

extract($_REQUEST);

if (isset($accion)) {
    switch ($accion) {
        case 'adicionar';
        {
                $ob = new daoAutomovel($id, $txtMatr, $cmbProp);
                $ob->insertAutomovel();
                header("Location:../admin/pages/template.php?opcion=1");
        }
        break;

        case 'alterar';
        {
            $ob = new daoAutomovel($id, $txtMatr, $cmbProp);
            $ob->updateAutomovel();
            header("Location:../admin/pages/template.php?opcion=1");
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