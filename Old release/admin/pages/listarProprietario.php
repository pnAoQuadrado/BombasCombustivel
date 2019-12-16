<?php

include("../../model/daoProprietario.php");

$ob = new daoProprietario();
$registos = $ob->getProprietarios();

/*
extract($_REQUEST);
$prop=$clBotao=$txBotao="";
if (isset($action)){
    //$action = $action;
    if($action == 'alterar'){
        $clBotao = 'btn btn-primary';
        $txBotao = 'Salvar';
    }
    else if($action == 'eliminar'){
        $clBotao = 'btn btn-danger';
        $txBotao = 'Eliminar';
    }
    $prop = $ob->getProprietario($idProp);
    
}
else{
    $action = 'adicionar';
    $clBotao = 'btn btn-success';
    $txBotao = 'Salvar';
} */

?>

<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Listar Proprietários</h3>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                ID
                            </th>
                            <th>
                                Nome
                            </th>
                            <th>
                                Nº Bilhete
                            </th>
                            <th>
                                Telefone
                            </th>
                            <th>
                                Editar
                            </th>
                            <th>
                                Apagar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($registos as $linha) { ?>
                            <tr>
                                <td><?php echo ++$i; ?> </td>
                                <td><?php echo $linha['idproprietario'] ?> </td>
                                <td><?php echo utf8_decode($linha['nome']) ?> </td>
                                <td><?php echo $linha['num_bi'] ?> </td>
                                <td><?php echo $linha['telefone'] ?> </td>
                                <td><a class="btn btn-primary" style="color:#fff" id="editar" href="?opcion=1&action=alterar&idProp=<?php echo $linha['idproprietario']; ?>"><i class="fa fa-edit"></i></a></td>
                                <!--<td><a class="btn btn-danger" style="color:#fff" id="eliminar" href="?opcion=1&action=eliminar&idProp=<?php echo $linha['idproprietario']; ?>"><i class="fa fa-trash"></i></a></td>-->
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
            <!-- /form-panel -->
        </div>
        <!-- /col-lg-12 -->
    </div>
    <!-- /row -->
</section>
<!-- /wrapper -->