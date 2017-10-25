<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Calculadora tributaria</title>
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-theme.min.css">
                <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
		<style>
			body{
				margin-bottom: 65px;
			}
			select{
				width: 155px;
			}
			.col-md-3{
				margin-bottom: 5px;
			}
			.clear{
				clear:right;
			}
			.clearLeft{
				clear:both;
			}
			.banner{
				margin-top: 0px;
				margin-bottom: 10px;
			}
			.tituloDestacado{
				padding-top: 10px;
				padding-bottom: 10px;
				padding: 10px;
				text-align: center;
				margin: 0px auto;
				margin-bottom: 20px;
				border-radius: 50px;
				background-color: #aaF;
			}
		</style>
	</head>
	<body class="resultadospage">
		<div class="container maincontainer">
                    <img src="<?=base_url()?>assets/img/banner.jpg" class="banner" alt="">
			<div class="span12">
				<div class="row">
					<div class="col-md-12 clearLeft">
						<hr>
						<h4>Pago de Impuestos Mensual</h4>
					</div>
 					<div class="col-md-3 clearLeft">
						<label for="renta">Impuesto a la Renta:</label>
					</div>
					<div class="col-md-3">
						<input type="text" placeholder="$" name="renta" id="renta" readonly value="<?=$renta?>">
					</div>
					<!----Impuesto a los bienes importados---->
 					<div class="col-md-3">
						<label for="aranceles">Impuesto a bienes importados:</label>
					</div>
					<div class="col-md-3 clear">
						<input type="text" placeholder="$" name="aranceles" id="aranceles" readonly value="<?=$aranceles?>">
					</div>
					<div class="col-md-3 clearLeft">
						<label for="IABA">IABA (Impuesto a Bebidas no alcohólicas):</label>
					</div>
					<div class="col-md-3">
						<input type="text" placeholder="$" name="IABA" id="IABA" readonly value="<?=$IABA?>">
					</div>
					<div class="col-md-3">
						<label for="bencina">Impuesto específico al combustible:</label>
					</div>
					<div class="col-md-3 clear">
						<input type="text" placeholder="$" name="bencina" id="bencina" readonly value="<?=$bencina?>">
					</div>
					<div class="col-md-3 clearLeft">
						<label for="iva">IVA:</label>
					</div>
					<div class="col-md-3">
						<input type="text" placeholder="$" name="iva" id="iva" readonly value="<?=$iva?>">
					</div>
					<div class="col-md-3">
						<label for="ILA">ILA (Impuesto a bebidas alcohólicas):</label>
					</div>
					<div class="col-md-3 clear">
						<input type="text" placeholder="$" name="ILA" id="ILA" readonly value="<?=$ILA?>">
					</div>
					<div class="col-md-3 clearLeft">
						<label for="tabaco">Impuesto al tabaco:</label>
					</div>
					<div class="col-md-3">
						<input type="text" placeholder="$" name="tabaco" id="tabaco" readonly value="<?=$tabaco?>">
					</div>
					<div class="col-md-3">
						<label for="contribuciones">Contribuciones de bienes raíces:</label>
					</div>
					<div class="col-md-3 clear">
						<input type="text" placeholder="$" name="contribuciones" id="contribuciones" readonly value="<?=$contribuciones?>">
					</div>

					
					<div class="col-md-12 clearLeft">
						<hr>
						<h4>Pagos de Previsión y Salud mensuales</h4>
					</div>
 					<div class="col-md-3 clearLeft">
						<label for="afp">AFP:</label>
					</div>
					<div class="col-md-3">
						<input type="text" placeholder="$" name="afp" id="afp" readonly value="<?=$afp?>">
					</div>
 					<div class="col-md-3">
						<label for="cesantia">Seguro de Cesantía:</label>
					</div>
					<div class="col-md-3 clear">
						<input type="text" placeholder="$" name="cesantia" id="cesantia" readonly value="<?=$cesantia?>">
					</div>
					<div class="col-md-3 clearLeft">
						<label for="fonasa">Isapre o Fonasa:</label>
					</div>
					<div class="col-md-3 clear">
						<input type="text" placeholder="$" name="fonasa" id="fonasa" readonly value="<?=$fonasa?>">
					</div>
                                        <div class="divclear"></div>
					<div class="impuestoaqui">
                                            <div class="col-md-12 clearLeft">
                                                <hr>
                                                <h2 class="tituloDestacado">Impuesto</h2>
                                            </div>
                                                                 <div class="col-md-3 clearLeft">
                                                <label for="impuestos">Pago total de impuestos mensuales:</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" placeholder="$" name="impuestos" id="impuestos" readonly value="<?=$impuestos?>">
                                            </div>
                                                                 <div class="col-md-3">
                                                <label for="anual">Pago total de impuestos anuales:</label>
                                            </div>
                                            <div class="col-md-3 clear">
                                                <input type="text" placeholder="$" name="anual" id="anual" readonly value="<?=$anual?>">
                                            </div>
                                                                 <div class="col-md-3 clearLeft">
                                                <label for="segSocial">Pago total de impuestos + previsión y salud mensual:</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" placeholder="$" name="segSocial" id="segSocial" readonly value="<?=$segSocial?>">
                                            </div>
                                                                 <div class="col-md-3">
                                                <label for="segSocialAnual">Pago total de impuestos + previsión y salud anual:</label>
                                            </div>
                                            <div class="col-md-3 clear">
                                                <input type="text" placeholder="$" name="segSocialAnual" id="segSocialAnual" readonly value="<?=$segSocialAnual?>">
                                            </div>
                                            <!--<div class="col-md-12">
                                            </div>
                                            <div class="col-md-12">
                                            </div>
                                            <div class="col-md-12">
                                            </div>
                                            <div class="col-md-3">
                                            </div>-->
                                            <div class="col-md-3">
                                                <input type="button" class="btn btn-info" value="Volver" onclick="location.href='<?=base_url()?>';">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="button" class="btn btn-info" value="Imprimir" onclick="window.print();">
                                            </div>
                                        </div>

				</div>
			</div>
		</div>
	</body>
</html>