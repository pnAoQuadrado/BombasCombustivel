<?php

include '../../model/daoStandard.php';
include '../../model/daoUsuario.php';

$ob = new daoStandard();
$permissoes = $ob->getPermissoes();

$ob = new daoUsuario();

extract($_REQUEST);
$user = $nome = $nome_user = $clBotao = $txBotao = "";
$desabilita = '';

if (isset($action)) {
  //$action = $action;
  if ($action == 'alterar') {
    $clBotao = 'btn btn-primary';
    $txBotao = 'Salvar Alterações';
    $desabilita = "disabled";
  } else if ($action == 'eliminar') {
    $clBotao = 'btn btn-danger';
    $txBotao = 'Eliminar';
    $desabilita = "disabled";
  }
  $user = $ob->getUsuario($idUser);
  $nome = $user[0]['nome'];
  $nome_user = $user[0]['nome_usu'];
} else {
  $action = 'adicionar';
  $clBotao = 'btn btn-success';
  $txBotao = 'Salvar';
}
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Gerenciar Usuários</h3>
  <!-- BASIC FORM ELELEMNTS -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4 class="mb"><i class="fa fa-angle-right"></i> Formulário a preencher</h4>
        <form class="" method="post" onsubmit="return validacao();" action="../../controller/ccUsuario.php">
          <div class="row form-group">
            <div class="col-md-6">
              <label>Nome</label>
              <input type="text" class="form-control" name="txtNome" id="cNome" value="<?php echo $nome; ?>">
              <span class="help-block erro"></span>
            </div>
            <div class="col-md-6">
              <label>Nome de usuário</label>
              <input type="text" class="form-control" name="txtUser" id="cUser" value="<?php echo $nome_user; ?>">
              <span class="help-block erro"></span>
            </div>

          </div>
          <div class="row form-group">
            <div class="col-md-4">
              <label>Senha</label>
              <input type="password" class="form-control" name="txtSenha" id="cSenha" value="" <?php echo $desabilita; ?>>
              <span class="help-block erro"></span>
            </div>
            <div class="col-md-4">
              <label>Confirmar Senha</label>
              <input type="password" class="form-control" name="" id="cConf" value="" <?php echo $desabilita; ?>>
              <span class="help-block erro"></span>
            </div>

            <div class="col-md-4">
              <label>Permissão</label>
              <select class="form-control" id="cPerm" name="cmbPerm">
                <option>Escolha a permissão</option>
                <?php foreach ($permissoes as $p) { ?>
                  <option value="<?php echo $p['idpermissao'] ?>" <?php if (is_array($user)) if ($p['idpermissao'] == $user[0]['idpermissao']) { ?> selected <?php } ?>><?php echo utf8_encode($p['descricao']) ?></option>
                <?php } ?>
              </select>
              <span class="help-block erro"></span>
            </div>
          </div>
          <input type="submit" value="<?php echo $txBotao ?>" class="<?php echo $clBotao ?>" onclick="return validacao();">
          <input type="hidden" name="accion" value="<?php echo $action ?>" class="btn btn-success" id="b_acao">
          <input type="hidden" name="id" value="<?php if (is_array($user)) {
                                                  echo $user[0]['iduser'];
                                                } ?>" class="btn btn-success">
        </form>
      </div>
    </div>
    <!-- col-lg-12-->
  </div>
  <!-- /row -->
</section>
<!-- /wrapper -->