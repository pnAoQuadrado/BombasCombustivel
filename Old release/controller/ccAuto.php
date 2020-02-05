<?php

include '../model/daoAutomovel.php';

extract($_REQUEST);

if (isset($accion)) {
    switch ($accion) {
        case 'adicionar';
        {
                $ob = new daoAutomovel($id, $txtMatr, $cmbProp);
                $ob->insertAutomovel();
                header("Location:../admin/pages/template.php?opcion=5");
        }
        break;

        case 'alterar';
        {
            $ob = new daoAutomovel($id, $txtMatr, $cmbProp);
            $ob->updateAutomovel();
            header("Location:../admin/pages/template.php?opcion=5");
        }
        break;

        case 'eliminar';
        {
            $ob = new daoAutomovel();
            $ob->deleteAutomovel($id);
            header("Location:../admin/pages/template.php?opcion=5");
        }
        break;
    }
}
?>