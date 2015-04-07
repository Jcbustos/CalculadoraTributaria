<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Calculadora tributaria</title>
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-theme.min.css">
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
		</style>
	</head>
	<body>
		<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Calculadora tributaria</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="<?=base_url()?>administrator">Home</a></li>
		        <li class="active"><a href="<?=base_url()?>administrator/auxiliares">Auxiliares</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<div class="container">
			<div class="span12">
				<ol class="breadcrumb">
				  <li class="active">Administrador</li>
				  <li class="active">Auxiliares</li>
				</ol>
			</div>
			<div class="span12">
				<div class="row">
					<div class="col-md-12">
						<hr>
						<h4>Parametros</h4>
					</div>
 					<div class="col-md-3">
						<label for="uf">UF:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="uf" id="uf">
					</div>
					<div class="col-md-3">
						<label for="utm">UTM:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="utm" id="utm">
					</div>
 					<div class="col-md-3">
						<label for="bencina">$/Litro de bencina:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="bencina" id="bencina">
					</div>
 					<div class="col-md-3">
						<label for="diesel">$/Litro de diesel:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="diesel" id="diesel">
					</div>
 					<div class="col-md-3">
						<label for="vino">$/Botella de vino:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="vino" id="vino">
					</div>
 					<div class="col-md-3">
						<label for="cerveza">$/Botella de cerveza:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="cerveza" id="cerveza">
					</div>
 					<div class="col-md-3">
						<label for="pisco">$/Botella de pisco:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="pisco" id="pisco">
					</div>
 					<div class="col-md-3">
						<label for="bebida">$/Botella de bebida:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="bebida" id="bebida">
					</div>
 					<div class="col-md-3">
						<label for="cajetilla">tax/cajetilla OMS:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="cajetilla" id="cajetilla">
					</div>
 					<div class="col-md-3">
						<label for="afp">tope AFP, ISAPRE (UF):</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="afp" id="afp">
					</div>
 					<div class="col-md-3">
						<label for="cesantia">tope seguro de cesantia (UF):</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="cesantia" id="cesantia">
					</div>
					<div class="col-md-12">
						<hr>
						<h4>AFP</h4>
					</div>
 					<div class="col-md-3">
						<label for="afpCapital">Capital:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="afpCapital" id="afpCapital">
					</div>
 					<div class="col-md-3">
						<label for="afpCuprum">Cuprum:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="afpCuprum" id="afpCuprum">
					</div>
 					<div class="col-md-3">
						<label for="afpHabitat">Habitat:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="afpHabitat" id="afpHabitat">
					</div>
 					<div class="col-md-3">
						<label for="afpPlanVital">PlanVital:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="afpPlanVital" id="afpPlanVital">
					</div>
 					<div class="col-md-3">
						<label for="afpProvida">Provida:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="afpProvida" id="afpProvida">
					</div>
 					<div class="col-md-3">
						<label for="afpModelo">Modelo:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="afpModelo" id="afpModelo">
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
									<th>Hasta</th>
									<th>TasaMG</th>
									<th>Exento</th>
									<th>Tasa Media</th>
								</tr>
							</thead>
							<tbody>
								<?php for ($i=0; $i < 8; $i++) { ?>
									<tr>
										<td><input type="text" value="0" name="desde<?=$i?>"></td>
										<td><input type="text" value="13,5" name="hasta<?=$i?>"></td>
										<td><input type="text" value="0" name="tasaMG<?=$i?>"></td>
										<td><input type="text" value="0" name="exento<?=$i?>"></td>
										<td><input type="text" value="0" name="tasaMedia<?=$i?>"></td>
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
									<td><input type="text" value="20.086.180" name="excentoSiHasta"></td>
									<td><input type="text" value="0" name="excentoSiTasa"></td>
								</tr>
								<tr>
									<td>Primer tramo viviendas</td>
									<td><input type="text" value="71.736.350" name="primerSiHasta"></td>
									<td><input type="text" value="0,98" name="primerSiTasa"></td>
								</tr>
								<tr>
									<td>Segundo tramo viviendas</td>
									<td><input type="text" value="-" name="segundoSiHasta"></td>
									<td><input type="text" value="1,17" name="segundoSiTasa"></td>
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
									<td><input type="text" value="20.086.180" name="excentoNoHasta"></td>
									<td><input type="text" value="0" name="excentoNoTasa"></td>
								</tr>
								<tr>
									<td>Primer tramo viviendas</td>
									<td><input type="text" value="71.736.350" name="primerNoHasta"></td>
									<td><input type="text" value="0,98" name="primerNoTasa"></td>
								</tr>
								<tr>
									<td>Segundo tramo viviendas</td>
									<td><input type="text" value="-" name="segundoNoHasta"></td>
									<td><input type="text" value="1,17" name="segundoNoTasa"></td>
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
		</div>
	</body>
</html>