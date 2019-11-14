<?php

include '../../model/daoStandard.php';
include '../../model/daoAutomovel.php';

$ob = new daoStandard();
$proprietarios = $ob->getProprietarios();

$ob = new daoAutomovel();

extract($_REQUEST);
$automovel = $matricula = $clBotao = $txBotao = "";
if (isset($action)) {
  //$action = $action;
  if ($action == 'alterar') {
    $clBotao = 'btn btn-primary';
    $txBotao = 'Salvar Alterações';
  } else if ($action == 'eliminar') {
    $clBotao = 'btn btn-danger';
    $txBotao = 'Eliminar';
  }
  $automovel = $ob->getAuto($idauto);
  $matricula = $automovel[0]['num_matricula'];
} else {
  $action = 'adicionar';
  $clBotao = 'btn btn-success';
  $txBotao = 'Salvar';
}
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Gerenciar Automóveis</h3>
  <!-- BASIC FORM ELELEMNTS -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4 class="mb"><i class="fa fa-angle-right"></i> Formulário a preencher</h4>
        <form class="form-horizontal style-form" method="post" onsubmit="return validacao();" action="../../controller/ccAuto.php">
          <div class="form-group">
            <label class="col-sm-1 col-sm-1 control-label">Nº Matrícula</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="txtMatr" id="cMatricula" value="<?php echo $matricula; ?>">
              <span class="help-block erro"></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1 col-sm-1 control-label">Proprietário</label>
            <div class="col-sm-10">
              <select class="form-control" id="cProp" name="cmbProp">
                <option>Escolha o proprietário</option>
                <?php foreach ($proprietarios as $p) { ?>
                  <option value="<?php echo $p['idproprietario'] ?>" <?php if (is_array($automovel)) if ($p['idproprietario'] == $automovel[0]['idproprietario']) { ?> selected <?php } ?>><?php echo utf8_encode($p['nome']) ?></option>
                <?php } ?>
              </select>
              <span class="help-block erro"></span>
            </div>
          </div>
          <input type="submit" value="<?php echo $txBotao ?>" class="<?php echo $clBotao ?>" onclick="return validacao();">
          <input type="hidden" name="accion" value="<?php echo $action ?>" class="btn btn-success">
          <input type="hidden" name="id" value="<?php if (is_array($automovel)) {
                                                  echo $automovel[0]['idautomovel'];
                                                } ?>" class="btn btn-success">
        </form>
      </div>
    </div>
    <!-- col-lg-12-->
  </div>
  <!-- /row -->

  <!--<div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Lista de dados</h4>
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
                        Acções
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
                        <td><?php echo $linha['nome'] ?> </td>
                        <td><?php echo $linha['num_bi'] ?> </td>
                        <td><?php echo $linha['telefone'] ?> </td>
                        <td><a id="editar" href="?opcion=2&action=alterar&idAno=<?php echo $linha['idproprietario']; ?>">Editar</a>  | <a id="eliminar" href="?opcion=2&action=eliminar&idAno=<?php echo $linha['idproprietario']; ?>">Eliminar</td>
                    </tr>
                <?php  } ?>
                </tbody>
            </table> 
            </div>
            
          </div>
      
        </div>
         /row -->
</section>
<!-- /wrapper -->