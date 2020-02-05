<?php

include("../../model/daoUsuario.php");

$ob = new daoUsuario();
$registos = $ob->getUsuarios();

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
    <h3><i class="fa fa-angle-right"></i> Listar Usuários</h3>
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
                                Nome de Usuário
                            </th>
                            <th>
                                Permissão
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
                                <td><?php echo $linha['iduser'] ?> </td>
                                <td><?php echo utf8_encode($linha['nome']) ?> </td>
                                <td><?php echo $linha['nome_usu'] ?> </td>
                                <td><?php echo utf8_encode($linha['descricao']) ?> </td>
                                <td><a class="btn btn-primary" style="color:#fff" id="editar" href="?opcion=3&action=alterar&idUser=<?php echo $linha['iduser']; ?>"><i class="fa fa-edit"></i></a></td>
                                <td><a class="btn btn-danger" style="color:#fff" id="eliminar" href="?opcion=3&action=eliminar&idUser=<?php echo $linha['iduser']; ?>"><i class="fa fa-trash"></i></a></td>
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