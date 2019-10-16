<!Doctype html>
<html lang="pt-PT">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Abastecimento</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'>
    <meta name="viewport" content="width=device-width">

	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
	<link rel="icon" type="image/png" href="img/favicon.png">

	<!-- Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

	<!-- CSS Files -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/material-bootstrap-wizard.css" rel="stylesheet">
	<link href="css/mensagens.css" rel="stylesheet">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="css/demo.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet" />
</head>

<body>

	<div class="image-container set-full-height" style="background-image: url('img/petrol.jpg')">

	<div class="container">
		<div id="linha-f" class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form class="text-center border border-light p-5" action="index3.php" method="POST" onsubmit="return validacao();">
					<input type="text" id="search" name="txtPesq" class="form-control mb-4" placeholder="Número da Chapa de Matrícula">
					<button id="teste" class="btn btn-info btn-block my-4" type="submit">Validar</button>
					<input type="hidden" name="action" value="pesquisar" class="btn btn-success">
					<span id="erro" class="info text-center">dffd</span>
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>


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
