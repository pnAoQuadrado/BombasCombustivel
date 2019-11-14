<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Abastecimento</title>

  <!-- Custom fonts for this template-->
  <link href="css/css.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/mensagens.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center"  id="linha-user">

      <div class="col-xl-6 col-lg-10 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5 tela" >
        <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-12">
            <div class="p-5">
                <br><br>
                <div class="text-center">
                </div>
                <form class="user" action="situacaoAutomovel.php" method="POST" onsubmit="return validacao();">
                <input type="text" id="search" name="txtPesq" class="form-control mb-4" placeholder="Número da Chapa de Matrícula">
					<button id="teste" class="btn btn-info btn-block my-4" type="submit">Validar</button>
					<input type="hidden" name="action" value="pesquisar" class="btn btn-success">
					<span id="erro" class="info text-center">dffd</span>
                <hr>
                <br><br><br><br><br>
                <?php
            if(isset($_SESSION['user'])){
                ?>
                <b><?php echo $_SESSION['user']['nome'];?></b> (<?php echo $_SESSION['user']['descricao'];?>)<br> | <a href="../controller/ccUsuario.php?accion=close&modulo=bombas">Fechar Sessão</a>
                <?php
            }else{ header('Location: ../index.php');} ?>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="js/jquery-2.2.4.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="js/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="js/jsBombas.js"></script>
    <!--   Core JS Files   -->
	<script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/jquery.bootstrap.js" type="text/javascript"></script>
	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/extention/choices.js"></script>

</body>

</html>

