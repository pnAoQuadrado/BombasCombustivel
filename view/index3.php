<?php

include '../model/daoAutomovel.php';
include '../model/daoPagamento.php';

$nome = $bi = $tel = $matr = $resultado = $cor_res = "";
$id_auto = $mes_taxa = $mes_seg ="";
$mes_taxa_num = $mes_seg_num = $res_taxa = $res_seg = '';
$cor_label_1 = $cor_label_2 = '';

extract($_REQUEST);

if (isset($action)) {

    switch ($action) {
        case 'pesquisar';
            {
                $ob = new daoAutomovel();
				$registo=$ob->getAutomoveis($txtPesq);
				
				if($registo == null){
					$resultado = "ESTE Nº DE MATRÍCULA NÃO EXISTE";
					$cor_res="btn btn-dg";
				}
				else{
					
					$id_auto = $registo[0]['idautomovel'];
					$matr = $registo[0]['num_matricula'];
					$matr = strtoupper($matr);
					$nome = $registo[0]['nome'];
					$nome = strtoupper($nome);
					$bi = $registo[0]['num_bi'];
					$bi = strtoupper($bi);
					$tel = $registo[0]['telefone'];

					$ob = new daoPagamento();
					$registo=$ob->getUltimoMesPagoTaxa($id_auto);
					$mes_taxa = $registo[0]['descricao'];
					$mes_taxa = strtoupper($mes_taxa);

					$registo=$ob->getUltimoMesPagoSeguro($id_auto);
					$mes_seg = $registo[0]['descricao'];
					$mes_seg = strtoupper($mes_seg);

					//traz os números que representam os últimos meses pagos
					$registo = $ob->getUltimoMesPagoTaxa_Number($id_auto);
					$mes_taxa_num = $registo[0]['idmes'];
					$registo = $ob->getUltimoMesPagoSeguro_Number($id_auto);
					$mes_seg_num = $registo[0]['idmes'];

					// pega o mês actual do sistema
					$mes_actual = strftime("%m");

					// verifica regularidade da taxa e seguros
					if($mes_taxa_num >= $mes_actual){
						$res_taxa = 'Regularizado';
						$cor_label_2 ='texto-verde';
					}
					else{
						$res_taxa = 'Não Regularizado';
						$cor_label_2 ='texto-vermelho';
					}

					// verifica regularidade do seguros
					if($mes_seg_num >= $mes_actual){
						$res_seg = 'Regularizado';
						$cor_label_1 ='texto-verde';
					}
					else{
						$res_seg = 'Não Regularizado';
						$cor_label_1 ='texto-vermelho';
					}

					// verifica a regularidade geral do automobilista
					if($mes_seg_num < $mes_actual){
						$resultado = "NÃO AUTORIZADO A ABASTECER";
						$cor_res="btn btn-dg";
					}
					else{
						$resultado = "AUTORIZADO A ABASTECER";
						$cor_res="btn btn-success";
					}

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
	<title>Abastecimento</title>

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

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="css/demo.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/page3-style.css" rel="stylesheet">
</head>

<body>
	<div class="image-container set-full-height" style="background-image: url('img/petrol.jpg')">

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-12">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="red" id="wizard">
							<form method="POST" action="bombas.php">
		                			<!-- You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

		                    		<div class="wizard-header">
		                        		<h3 class="wizard-title">
		                        			Abastecimento
		                        		</h3>
									</div>
									
									<div class="wizard-navigation">
										<ul>
			                            	<li><a href="#details" data-toggle="tab">Dados</a></li>
			                            	<!--<li><a href="#captain" data-toggle="tab">Dados da Matricula</a></li>
			                            	<li><a href="#description" data-toggle="tab">Finalizar MATRICULA</a></li>
-->
			                        	</ul>
									</div>
								
		                        	<div class="tab-content">
		                            	<div class="tab-pane" id="details">
											<div class="row">
		                                		<div class="col-sm-12">
													<div class="col-md-6">
														<div class="form-group">
															<label id="lb1" for="">Nome completo</label>
															<input type="text" name="nome" class="form-control" value="<?php echo $nome ?>" readonly>
															<!--<input type="text" name="id_candidato" class="form-control none"  value="">
-->
													  	</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label id="lb2" for="">Número do bilhete de identidade</label>
															<input type="text" name="bi" class="form-control" value="<?php echo $bi ?>" readonly>
													  	</div>
													</div>
													<!--<div class="col-md-6">
														<div class="form-group">
															<label for="exampleInputEmail1">E-mail</label>
															<input type="text" name="email" class="form-control"  value="" readonly>
													  	</div>
													</div>
-->
		                                		</div>
											</div>
											
											<div class="row">
		                                		<div class="col-sm-12">
													<div class="col-md-6">
														<div class="form-group">
															<label id="lb3" for="">Número de telefone</label>
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
		                                		<div class="col-sm-12">
													<div class="col-md-6">
														<div class="form-group">
															<label id="texto" for=""><strong>Mês Pago (SEGURO):</strong></label><label id="texto4"><?php echo $mes_seg ?></label><br>
															<label id="texto1" for=""><strong>Status (SEGURO):</strong></label><label id="<?php echo $cor_label_1 ?>"> <?php echo $res_seg ?></label>
													  	</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label id="texto2" for=""><strong>Mês Pago (TAXA):</strong></label>
															<label id="texto5"><?php echo $mes_taxa ?></label><br>
															<label id="texto3" for=""><strong>Status (TAXA):</strong></label>
															<label id="<?php echo $cor_label_2 ?>"><?php echo $res_taxa ?></label>
													  	</div>
													</div>
		                                		</div>
											</div>
											
										</div>
		                        	</div>
	                        		<div class="wizard-footer">
                                        <div class="text-center">
                                            <span id="sp-res" class="<?php echo $cor_res ?>"><?php echo $resultado ?></span>
                                        </div>
                                        
	                            		<div class="pull-right">
	                                    	<!--<input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Proximo' />-->
	                                    	<input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finalizar' />
	                                	</div>
	                                	<!--<div class="pull-left">
	                                    	<input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Anterior' />
	                                	</div>-->
	                                	<div class="clearfix"></div>
	                        		</div>
								
							</form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div> <!-- row -->
		</div> <!--  big container -->
	</div>
</body>
	<!--   Core JS Files   -->
	<script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="js/material-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="js/jquery.validate.min.js"></script>
</html>
