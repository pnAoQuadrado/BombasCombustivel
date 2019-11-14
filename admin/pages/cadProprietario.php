<?php

include("../../model/daoProprietario.php");

$ob = new daoProprietario();

extract($_REQUEST);
$prop = $clBotao = $txBotao = "";
$nome = $bi = $tel = '';
if (isset($action)) {
  //$action = $action;
  if ($action == 'alterar') {
    $clBotao = 'btn btn-primary';
    $txBotao = 'Salvar Alterações';
  } else if ($action == 'eliminar') {
    $clBotao = 'btn btn-danger';
    $txBotao = 'Eliminar';
  }
  $prop = $ob->getProprietario($idProp);
  $nome = $prop[0]['nome'];
  $bi = $prop[0]['num_bi'];
  $tel = $prop[0]['telefone'];
} else {
  $action = 'adicionar';
  $clBotao = 'btn btn-success';
  $txBotao = 'Salvar';
}

?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Gerenciar Proprietários</h3>
  <!-- BASIC FORM ELELEMNTS -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4 class="mb"><i class="fa fa-angle-right"></i> Formulário a preencher</h4>
        <form class="form-horizontal style-form" method="post" onsubmit="return validacao();" action="../../controller/ccProprietario.php">
          <div class="form-group">
            <label class="col-sm-1 col-sm-1 control-label">Nome</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="txtNome" id="cNome" value="<?php echo $nome; ?>">
              <span class="help-block erro"></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1 col-sm-1 control-label">Nº Bilhete</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="txtBi" id="cBi" value="<?php echo $bi; ?>">
              <span class="help-block erro"></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1 col-sm-1 control-label">Nº Telefone</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="txtTel" id="cTel" value="<?php echo $tel; ?>">
              <span class="help-block erro"></span>
            </div>
          </div>
          <input type="submit" value="<?php echo $txBotao ?>" class="<?php echo $clBotao ?>" onclick="return validacao();">
          <input type="hidden" name="accion" value="<?php echo $action ?>" class="btn btn-success">
          <input type="hidden" name="id" value="<?php if (is_array($prop)) {
                                                  echo $prop[0]['idproprietario'];
                                                } ?>" class="btn btn-success">
        </form>
      </div>
    </div>
    <!-- col-lg-12-->
  </div>
  <!-- /row -->
</section>
<!-- /wrapper -->