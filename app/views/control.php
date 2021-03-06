<div class="image-container set-full-height" style="background-image: url('./assets/img/petrol.jpg')">
	<!--   Big container   -->
	<div class="container">
	    <div class="row">
		    <div class="col-sm-12">
		        <!--      Wizard container        -->
		        <div class="wizard-container">
		            <div class="card wizard-card" data-color="red" id="wizard">
						<!-- <form method="POST" action="/"> -->
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
									<li><a href="#description" data-toggle="tab">Finalizar MATRICULA</a></li>-->
								</ul>
							</div>
		                    <div class="tab-content">
		                        <div class="tab-pane" id="details">
									<div class="row">
										<div class="col-sm-12">
											<div class="col-md-6">
												<div class="form-group">
													<label id="lb1" for="">Nome completo</label>
													<input type="text" name="nome" class="form-control" value="<?= $this->viewContent->automovel->nome; ?>" readonly>
													<!--<input type="text" name="id_candidato" class="form-control none"  value="">-->
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label id="lb2" for="">Número do bilhete de identidade</label>
													<input type="text" name="bi" class="form-control" value="<?= $this->viewContent->automovel->num_bi; ?>" readonly>
												</div>
											</div>
		                                </div>
									</div>		
									<div class="row">
										<div class="col-sm-12">
											<div class="col-md-6">
												<div class="form-group">
													<label id="lb3" for="">Número de telefone</label>
													<input type="text" name="genero" class="form-control" value="<?= $this->viewContent->automovel->telefone; ?>" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label id="lb4" for="">Número da chapa de Matricula</label>
													<input type="text" name="numeroTelefone" class="form-control" value="<?= $this->viewContent->automovel->num_matricula; ?>" readonly>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="col-md-6">
												<div class="form-group">
													<label id="texto">
														<strong>Mês Pago (SEGURO): </strong>
													</label>
													<label id="texto4"> <?= $this->viewContent->mes_seg; ?></label>
													<br>
													<label id="texto1">
														<strong>Status (SEGURO): </strong>
													</label>
													<label id="<?= $this->viewContent->cor_label_1; ?>"> <?= $this->viewContent->res_seg; ?></label>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label id="texto2" for=""><strong>Mês Pago (TAXA): </strong></label>
													<label id="texto5"><?= $this->viewContent->mes_taxa; ?></label><br>
													<label id="texto3"><strong>Status (TAXA): </strong></label>
													<label id="<?= $this->viewContent->cor_label_2; ?>"><?= $this->viewContent->res_taxa; ?></label>
												</div>
											</div>
										</div>
									</div>	
								</div>
		                    </div>
							<div class="wizard-footer">
								<div class="text-center">
									<span id="sp-res" class="<?= $this->viewContent->cor_res; ?>"><?= $this->viewContent->resultado; ?></span>
								</div>
								<div class="pull-right">
									<!--<input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Proximo' />-->
									<a href='/' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish'>Finalizar</a>
								</div>
								<!--<div class="pull-left">
									<input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Anterior' />
								</div>-->
								<div class="clearfix"></div>
							</div>
						<!-- </form> -->
		            </div>
		        </div> <!-- wizard container -->
		    </div>
	    </div> <!-- row -->
	</div> <!--  big container -->
</div>