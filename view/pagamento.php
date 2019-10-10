
<?php

include '../model/daoAutomovel.php';
include '../model/daoPagamento.php';

$nome = $bi = $tel = $matr = $resultado = $cor_res = "";
$id_auto = "";
$cm = "nao-mostra";

extract($_REQUEST);

if (isset($action)) {

    switch ($action) {
        case 'pesquisar';
            {
                $ob = new daoAutomovel();
				$registo=$ob->getAutomoveis($txtPesq);
				
				if($registo == null){
					$resultado = "* Nenhum registo encontrado *";
					$cm = "nao-mostra";
				}
				else{
					$cm = "mostra";
					$id_auto = $registo[0]['idautomovel'];
					$matr = $registo[0]['num_matricula'];
					$matr = strtoupper($matr);
					$nome = $registo[0]['nome'];
					$nome = strtoupper($nome);
					$bi = $registo[0]['num_bi'];
					$bi = strtoupper($bi);
					$tel = $registo[0]['telefone'];
				}

            }
            break;
    }
}
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
							<form method="POST" action="pagamento.php">
		                			<!-- You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

		                    		<div class="wizard-header">
		                        		<h3 class="wizard-title">
		                        			Pagamento de Seguro Automóvel
		                        		</h3>
									</div>
									
									<div class="wizard-navigation">
										<ul>
			                            	<li><a href="#details" data-toggle="tab">Dados</a></li>
			                        	</ul>
									</div>
								
		                        	<div class="tab-content">
		                            	<div class="tab-pane" id="details">

											<div class="row">
		                                		<div class="col-sm-12">

													<div class="col-md-4">
														<div class="form-group">
															<label id="lb1" for="">Nº Matrícula</label>
															<input type="text" name="txtPesq" class="form-control" value="">
													  	</div>
													</div>

													<div class="col-md-2">
														<div class="form-group">
															<input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' value='Pesquisar' />
															<input type="hidden" name="action" value="pesquisar" class="btn btn-success">
													  	</div>
													</div>

													<div class="col-md-6">
														<div id="dv-res" class="form-group">
															<?php echo $resultado ?>
													  	</div>
													</div>

		                                		</div>
											</div>

											<hr>

											<div class="row">
		                                		<div class="col-sm-12 <?php echo $cm ?>" id="gb-1">
													<div class="col-md-6 mt-5">
														<div class="form-group">
															<label id="lb2" for="">Nome completo</label>
															<input type="text" name="nome" class="form-control"  value="<?php echo $nome ?>" readonly>
													  	</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label id="lb3" for="">Número do bilhete de identidade</label>
															<input type="text" name="bi" class="form-control"  value="<?php echo $bi ?>" readonly>
													  	</div>
													</div>
		                                		</div>
											</div>
											
											<div class="row">
		                                		<div class="col-sm-12 <?php echo $cm ?>" id="gb-2">
													<div class="col-md-6">
														<div class="form-group">
															<label id="lb4" for="">Número de telefone</label>
															<input type="text" name="genero" class="form-control" value="<?php echo $tel ?>" readonly>
													  	</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label id="lb4" for="">Número da chapa de Matricula</label>
															<input type="text" name="numeroTelefone" class="form-control" value="<?php echo $matr ?>" readonly>
													  	</div>
													</div>
		                                		</div>
											</div>
											
											<div class="row">
                                                <div class="col-sm-12 <?php echo $cm ?>" id="gb-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label id="lb5" for="">Data</label>
                                                            <input type="date" name="data" class="form-control" value="">
                                                        </div>
													</div>
													
													<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label id="lb5" for="">Mês a Pagar</label>
                                                            <select id="inputState" class="form-control">
															<option selected>Escolha o Mês</option>
															<option>...</option>
															</select>
                                                        </div>
													</div>
													
                                                </div>
											</div>
											
										</div>
		                        	</div>
	                        		<div class="wizard-footer">
	                            		<div class="pull-right">
	                                    	<input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Proximo' />
	                                    	<input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finalizar' />
	                                	</div>
	                                	<div class="pull-left">
	                                    	<input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Anterior' />
	                                	</div>
	                                	<div class="clearfix"></div>
	                        		</div>
								
							</form>
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
	<script src="js/jsHome.js"></script>
</body>
</html>
