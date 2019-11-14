<?php

include '../../model/daoAutomovel.php';

$ob = new daoAutomovel();
$registos = $ob->getRegistos();

?>

<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Listar Automóveis</h3>
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
                                Número de Matrícula
                            </th>
                            <th>
                                Nome
                            </th>
                            <th>
                                Editar
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($registos as $linha) { ?>
                            <tr>
                                <td><?php echo ++$i; ?> </td>
                                <td><?php echo $linha['idautomovel'] ?> </td>
                                <td><?php echo $linha['num_matricula'] ?> </td>
                                <td><?php echo utf8_decode($linha['nome']) ?> </td>
                                <td><a class="btn btn-primary" style="color:#fff" id="editar" href="?opcion=2&action=alterar&idauto=<?php echo $linha['idautomovel']; ?>"><i class="fa fa-edit"></i></a></td>
                                <!--<td><a class="btn btn-danger" style="color:#fff" id="eliminar" href="?opcion=2&action=eliminar&idauto=<?php echo $linha['idautomovel']; ?>"><i class="fa fa-trash"></i></a></td>-->
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