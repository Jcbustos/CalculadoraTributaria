<!DOCTYPE html>
<html lang="en">
	<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Calculadora tributaria</title>
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-theme.min.css">
                <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
		<style>
			body{
				margin-top: 65px;
				margin-bottom: 65px;
			}
			select{
				width: 150px;
			}
			.col-md-3{
				margin-bottom: 5px;
			}
			.multi-select-option{
				width: 45% !important;
				float:left;
			}
		</style>
		
		 <script>
			$(document).on('ready',function(){
				validar();
			}
			
			function validar(){
				$.post('<?=base_url()?>administrator/validar',
				{
					usuario:'<?=$this->session->userdata('usuario')?>',
					password:'<?=$this->session->userdata('password')?>'
				},function(datos){
					if(!datos.response){
						location.href='<?=base_url()?>administrator';
					}
				},'json');
			}
		 </script>
	</head>
	<body>
		<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
		  <div class="container navcontainer">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="<?=base_url()?>">Calculadora tributaria</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="<?=base_url()?>administrator">Home</a></li>
		        <li><a href="<?=base_url()?>administrator/salir">Salir</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<div class="container">
			<div class="span12">
				<ol class="breadcrumb">
				  <li class="active">Administrador</li>
				  <li class="active">Home</li>
				</ol>
			</div>
			<form action="<?=base_url()?>administrator/save" method="post">
				<div class="span12">
					<?php $datos = array('estado' => 1); ?>
					<div class="row">
						<div class="col-md-12">
							<hr>
							<h4>Parametros</h4>
						</div>
	 					<div class="col-md-3">
							<label for="uf">UF:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'uf'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="uf" id="uf" value="<?=$valor?>">
						</div>
						<div class="col-md-3">
							<label for="utm">UTM:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'utm'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="utm" id="utm" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="bencina">$/Litro de bencina:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'bencina'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="bencina" id="bencina" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="diesel">$/Litro de diesel:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'diesel'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="diesel" id="diesel" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="vino">$/Botella de vino:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'vino'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="vino" id="vino" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="cerveza">$/Botella de cerveza:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'cerveza'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="cerveza" id="cerveza" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="pisco">$/Botella de pisco:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'pisco'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="pisco" id="pisco" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="bebida">$/Botella de bebida:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'bebida'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="bebida" id="bebida" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="cajetilla">tax/cajetilla OMS:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'cajetilla'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="cajetilla" id="cajetilla" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="afp">tope AFP, ISAPRE (UF):</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'afp'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="afp" id="afp" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="cesantia">tope seguro de cesantia (UF):</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'cesantia'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="cesantia" id="cesantia" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="iva">IVA(%):</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'iva'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="iva" id="iva" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="impCervezaVino">Impuesto Cerveza Vino(%):</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'impCervezaVino'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="impCervezaVino" id="impCervezaVino" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="impLicor">Impuesto Licor(%):</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'impLicor'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="impLicor" id="impLicor" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="impBebida">Impuesto Bebida Anhalc.(%):</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'impBebida'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="impBebida" id="impBebida" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="arancel">Arancel efectivo(%):</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'arancel'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="arancel" id="arancel" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="bienesImportados">Bienes importados(%):</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'bienesImportados'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="bienesImportados" id="bienesImportados" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="precioBase">Precio Base Imputación Casa(UF):</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'precioBase'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="precioBase" id="precioBase" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="ingresoLiquidoCasa">Ingreso liquido para casa 900 UF:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'ingresoLiquidoCasa'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="ingresoLiquidoCasa" id="ingresoLiquidoCasa" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="pendienteCasaSueldo">Pendiente (Uf)casa/($)sueldo (%):</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'pendienteCasaSueldo'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="pendienteCasaSueldo" id="pendienteCasaSueldo" value="<?=$valor?>">
						</div>
						<!-------------->
						<div class="col-md-12">
							<hr>
							<h4>AFP</h4>
						</div>
	 					<div class="col-md-3">
							<label for="afpCapital">Capital:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'afpCapital'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="afpCapital" id="afpCapital" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="afpCuprum">Cuprum:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'afpCuprum'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="afpCuprum" id="afpCuprum" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="afpHabitat">Habitat:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'afpHabitat'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="afpHabitat" id="afpHabitat" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="afpPlanVital">PlanVital:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'afpPlanVital'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="afpPlanVital" id="afpPlanVital" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="afpProvida">Provida:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'afpProvida'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="afpProvida" id="afpProvida" value="<?=$valor?>">
						</div>
	 					<div class="col-md-3">
							<label for="afpModelo">Modelo:</label>
						</div>
						<div class="col-md-3">
							<?php 
								$datos['nombre'] = 'afpModelo'; 
								$valor = $this->model_datos->getWhere($datos);
								if($valor){
									$decimales = 0;
									$dec = 0;
									$valor = explode(',',$valor[0]->valor);
									if(sizeof($valor)>1){
										$dec = $valor[1];
										$decimales = strlen($dec);
									}
									$valor = $valor[0].".".$dec;
									$valor = number_format($valor,$decimales,',','.');
								}else{
									$valor = '';
								}
							?>
							<input type="text" name="afpModelo" id="afpModelo" value="<?=$valor?>">
						</div>
						
						<div class="col-md-12">
							<hr>
							<h4>Tramos CG (UTM)</h4>
						</div>
	 					<div class="col-md-12">
							<table class="table table-striped table-condensed table-hover table-bordered">
								<thead>
									<tr>
										<th>Desde</th>
										<th>Hasta (0 para infinito)</th>
										<th>TasaMG</th>
										<th>Exento</th>
										<th>Tasa Media</th>
									</tr>
								</thead>
								<tbody>
									<?php for ($i=0; $i < 7; $i++) { ?>
										<tr>
											<?php 
												$datos['nombre'] = 'desde'.$i; 
												$valor = $this->model_datos->getWhere($datos);
												if($valor){
													$valor = $valor[0]->valor;
												}else{
													$valor = '';
												}
											?>
											<td>
												<select class="multi-select-option" name="operacionDesde<?=$i?>">
													<option value=">" selected="selected">></option>
													<option value=">=">>=</option>
												</select>
												<input class="multi-select-input" style="float: right;width: 50% !important;" type="text" name="desde<?=$i?>" value="<?=$valor?>">
											</td>
											<?php 
												$datos['nombre'] = 'hasta'.$i; 
												$valor = $this->model_datos->getWhere($datos);
												if($valor){
													$valor = $valor[0]->valor;
												}else{
													$valor = '';
												}
											?>
											<td>

												<select class="multi-select-option" name="operacionHasta<?=$i?>">
													<option value="<=" selected="selected"><=</option>
													<option value="<"><</option>
												</select>
												<input type="text" style="float: right;width: 50% !important;" name="hasta<?=$i?>" value="<?=$valor?>">
											</td>
											<?php 
												$datos['nombre'] = 'tasaMG'.$i; 
												$valor = $this->model_datos->getWhere($datos);
												if($valor){
													$valor = $valor[0]->valor;
												}else{
													$valor = '';
												}
											?>
											<td><input type="text" value="<?=$valor?>" name="tasaMG<?=$i?>"></td>
											<?php 
												$datos['nombre'] = 'exento'.$i; 
												$valor = $this->model_datos->getWhere($datos);
												if($valor){
													$valor = $valor[0]->valor;
												}else{
													$valor = '';
												}
											?>
											<td><input type="text" value="<?=$valor?>" name="exento<?=$i?>"></td>
											<?php 
												$datos['nombre'] = 'tasaMedia'.$i; 
												$valor = $this->model_datos->getWhere($datos);
												if($valor){
													$valor = $valor[0]->valor;
												}else{
													$valor = '';
												}
											?>
											<td><input type="text" value="<?=$valor?>" name="tasaMedia<?=$i?>"></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>

						<div class="col-md-12">
							<hr>
							<h4>Viviendas vendidas (UF)</h4>
						</div>
	 					<div class="col-md-12">
							<table class="table table-striped table-condensed table-hover table-bordered">
								<thead>
									<tr>
										<th>Contribuciones si</th>
										<th>Hasta</th>
										<th>Tasa</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Excento viviendas</td>
										<?php 
											$datos['nombre'] = 'excentoSiHasta'; 
											$valor = $this->model_datos->getWhere($datos);
											if($valor){
												$decimales = 0;
												$dec = 0;
												$valor = explode(',',$valor[0]->valor);
												if(sizeof($valor)>1){
													$dec = $valor[1];
													$decimales = strlen($dec);
												}
												$valor = $valor[0].".".$dec;
												$valor = number_format($valor,$decimales,',','.');
											}else{
												$valor = '';
											}
										?>
										<td><input type="text" value="<?=$valor?>" name="excentoSiHasta"></td>
										<?php 
											$datos['nombre'] = 'excentoSiTasa'; 
											$valor = $this->model_datos->getWhere($datos);
											if($valor){
												$decimales = 0;
												$dec = 0;
												$valor = explode(',',$valor[0]->valor);
												if(sizeof($valor)>1){
													$dec = $valor[1];
													$decimales = strlen($dec);
												}
												$valor = $valor[0].".".$dec;
												$valor = number_format($valor,$decimales,',','.');
											}else{
												$valor = '';
											}
										?>
										<td><input type="text" value="<?=$valor?>" name="excentoSiTasa"></td>
									</tr>
									<tr>
										<td>Primer tramo viviendas</td>
										<?php 
											$datos['nombre'] = 'primerSiHasta'; 
											$valor = $this->model_datos->getWhere($datos);
											if($valor){
												$decimales = 0;
												$dec = 0;
												$valor = explode(',',$valor[0]->valor);
												if(sizeof($valor)>1){
													$dec = $valor[1];
													$decimales = strlen($dec);
												}
												$valor = $valor[0].".".$dec;
												$valor = number_format($valor,$decimales,',','.');
											}else{
												$valor = '';
											}
										?>
										<td><input type="text" value="<?=$valor?>" name="primerSiHasta"></td>
										<?php 
											$datos['nombre'] = 'primerSiTasa'; 
											$valor = $this->model_datos->getWhere($datos);
											if($valor){
												$decimales = 0;
												$dec = 0;
												$valor = explode(',',$valor[0]->valor);
												if(sizeof($valor)>1){
													$dec = $valor[1];
													$decimales = strlen($dec);
												}
												$valor = $valor[0].".".$dec;
												$valor = number_format($valor,$decimales,',','.');
											}else{
												$valor = '';
											}
										?>
										<td><input type="text" value="<?=$valor?>" name="primerSiTasa"></td>
									</tr>
									<tr>
										<td>Segundo tramo viviendas</td>
										<?php 
											$datos['nombre'] = 'segundoSiHasta'; 
											$valor = $this->model_datos->getWhere($datos);
											if($valor){
												$decimales = 0;
												$dec = 0;
												$valor = explode(',',$valor[0]->valor);
												if(sizeof($valor)>1){
													$dec = $valor[1];
													$decimales = strlen($dec);
												}
												$valor = $valor[0].".".$dec;
												$valor = number_format($valor,$decimales,',','.');
											}else{
												$valor = '';
											}
										?>
										<td><input type="text" value="<?=$valor?>" name="segundoSiHasta"></td>
										<?php 
											$datos['nombre'] = 'segundoSiTasa'; 
											$valor = $this->model_datos->getWhere($datos);
											if($valor){
												$decimales = 0;
												$dec = 0;
												$valor = explode(',',$valor[0]->valor);
												if(sizeof($valor)>1){
													$dec = $valor[1];
													$decimales = strlen($dec);
												}
												$valor = $valor[0].".".$dec;
												$valor = number_format($valor,$decimales,',','.');
											}else{
												$valor = '';
											}
										?>
										<td><input type="text" value="<?=$valor?>" name="segundoSiTasa"></td>
									</tr>
								</tbody>
							</table>
						</div>
	 					<div class="col-md-12">
							<table class="table table-striped table-condensed table-hover table-bordered">
								<thead>
									<tr>
										<th>Contribuciones no sabe</th>
										<th>Hasta</th>
										<th>Tasa</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Excento viviendas</td>
										<?php 
											$datos['nombre'] = 'excentoNoHasta'; 
											$valor = $this->model_datos->getWhere($datos);
											if($valor){
												$decimales = 0;
												$dec = 0;
												$valor = explode(',',$valor[0]->valor);
												if(sizeof($valor)>1){
													$dec = $valor[1];
													$decimales = strlen($dec);
												}
												$valor = $valor[0].".".$dec;
												$valor = number_format($valor,$decimales,',','.');
											}else{
												$valor = '';
											}
										?>
										<td><input type="text" value="<?=$valor?>" name="excentoNoHasta"></td>
										<?php 
											$datos['nombre'] = 'excentoNoTasa'; 
											$valor = $this->model_datos->getWhere($datos);
											if($valor){
												$decimales = 0;
												$dec = 0;
												$valor = explode(',',$valor[0]->valor);
												if(sizeof($valor)>1){
													$dec = $valor[1];
													$decimales = strlen($dec);
												}
												$valor = $valor[0].".".$dec;
												$valor = number_format($valor,$decimales,',','.');
											}else{
												$valor = '';
											}
										?>
										<td><input type="text" value="<?=$valor?>" name="excentoNoTasa"></td>
									</tr>
									<tr>
										<td>Primer tramo viviendas</td>
										<?php 
											$datos['nombre'] = 'primerNoHasta'; 
											$valor = $this->model_datos->getWhere($datos);
											if($valor){
												$decimales = 0;
												$dec = 0;
												$valor = explode(',',$valor[0]->valor);
												if(sizeof($valor)>1){
													$dec = $valor[1];
													$decimales = strlen($dec);
												}
												$valor = $valor[0].".".$dec;
												$valor = number_format($valor,$decimales,',','.');
											}else{
												$valor = '';
											}
										?>
										<td><input type="text" value="<?=$valor?>" name="primerNoHasta"></td>
										<?php 
											$datos['nombre'] = 'primerNoTasa'; 
											$valor = $this->model_datos->getWhere($datos);
											if($valor){
												$decimales = 0;
												$dec = 0;
												$valor = explode(',',$valor[0]->valor);
												if(sizeof($valor)>1){
													$dec = $valor[1];
													$decimales = strlen($dec);
												}
												$valor = $valor[0].".".$dec;
												$valor = number_format($valor,$decimales,',','.');
											}else{
												$valor = '';
											}
										?>
										<td><input type="text" value="<?=$valor?>" name="primerNoTasa"></td>
									</tr>
									<tr>
										<td>Segundo tramo viviendas</td>
										<?php 
											$datos['nombre'] = 'segundoNoHasta'; 
											$valor = $this->model_datos->getWhere($datos);
											if($valor){
												$decimales = 0;
												$dec = 0;
												$valor = explode(',',$valor[0]->valor);
												if(sizeof($valor)>1){
													$dec = $valor[1];
													$decimales = strlen($dec);
												}
												$valor = $valor[0].".".$dec;
												$valor = number_format($valor,$decimales,',','.');
											}else{
												$valor = '';
											}
										?>
										<td><input type="text" value="<?=$valor?>" name="segundoNoHasta"></td>
										<?php 
											$datos['nombre'] = 'segundoNoTasa'; 
											$valor = $this->model_datos->getWhere($datos);
											if($valor){
												$decimales = 0;
												$dec = 0;
												$valor = explode(',',$valor[0]->valor);
												if(sizeof($valor)>1){
													$dec = $valor[1];
													$decimales = strlen($dec);
												}
												$valor = $valor[0].".".$dec;
												$valor = number_format($valor,$decimales,',','.');
											}else{
												$valor = '';
											}
										?>
										<td><input type="text" value="<?=$valor?>" name="segundoNoTasa"></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-3"></div>
						<div class="col-md-3"><input type="submit" class="btn btn-success" value="Guardar"></div>
						<div class="col-md-3"><input type="button" class="btn btn-warning" value="Cancelar" onclick="location.reload();"></div>
						<div class="col-md-3"></div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>