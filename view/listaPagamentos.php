
<?php

include '../model/daoPagamento.php';

// carrega pagamentos
$ob = new daoPagamento();
$registos = $ob->getPagamentosSeguro();

?>

<!Doctype html>
<html lang="pt-PT">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Home</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'>
    <meta name="viewport" content="width=device-width">

	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
	<link rel="icon" type="image/png" href="img/favicon.png">

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

	<!-- CSS Files -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/material-bootstrap-wizard.css" rel="stylesheet">
	<link href="css/pagamento-style.css" rel="stylesheet">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="css/demo.css" rel="stylesheet">
</head>

<body>
	<div class="image-container set-full-height" style="background-image: url('img/26.jpg')">

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-12">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="red" id="wizard">
						
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
						Data de Pagamento
                    </th>
                    <th>
                        Mês Pago
                    </th>
                    <th>
                        Nº Matrícula
                    </th>
					<th>
                        Acções
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                foreach ($registos as $linha){ ?>
                    <tr>
                        <td><?php echo ++$i; ?> </td>
                        <td><?php echo $linha['idpag_seguro']?> </td>
                        <td><?php echo $linha['data_pag']?> </td>
						<td><?php echo $linha['descricao']?> </td>
                        <td><?php echo $linha['num_matricula']?> </td>
                        <td><a id="editar" href="?opcion=2&action=alterar&idNacion=<?php echo $linha['idpag_seguro'];?>">Editar</a>  | <a id="eliminar" href="?opcion=2&action=eliminar&idNacion=<?php echo $linha['idpag_seguro'];?>">Eliminar</td>
                    </tr>
               <?php  } ?>

                </tbody>
            </table>      

		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div> <!-- row -->
		</div> <!--  big container -->
	</div>

	<!--   Core JS Files   -->
	<script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="js/material-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/jsPagamento.js"></script>
</body>
</html>