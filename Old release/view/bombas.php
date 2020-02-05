 
<html lang="pt-PT">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Ngazadi Pedro">
    <!--<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">-->
    <!-- CSS Files -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/mensagens.css" rel="stylesheet">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="css/demo.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet" />
</head>
<body style="background-image: url('img/petrol.jpg'); background-repeat: no-repeat; background-size: 100% 100%">
    <div class="s130">
        <form method="POST" action="index3.php" onsubmit="return validacao();">
            <div class="inner-form">
                <div class="input-field first-wrap">
                    <div class="svg-wrapper">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                        </svg>
                    </div>
                    <input id="search" name="txtPesq" type="text" placeholder="Número da chapa de Matricula">
                </div>
                <div class="input-field second-wrap">
                    <button class="btn-search" type="submit">Procurar</button>
                    <!--<input type="hidden" name="action" value="pesquisar" class="btn btn-success">-->
                </div>
            </div>
            <span id="erro" class="info text-center">dffd</span>
        </form>
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
