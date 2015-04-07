<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Calculadora tributaria</title>
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-theme.min.css">
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
		<style>
			body{
				margin-bottom: 65px;
			}
			select{
				width: 155px;
			}
			.col-md-6{
				margin-bottom: 15px;
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

		</style>
		<script>
			$(document).on('ready',function(datos){
				$("input").keyup(validar);
			})

			function validar(){
				var x = $(this);
				var num = $(this).val();
				num = num.replace(".", "");
				num = num.replace(".", "");
				num = num.replace(".", "");
				num = num.replace(".", "");
				x.val(formato_numero(num,0,',','.'));
			}

			function formato_numero(numero, decimales, separador_decimal, separador_miles){ // v2007-08-06
    numero=parseFloat(numero);
    if(isNaN(numero)){
        return "";
    }

    if(decimales!==undefined){
        // Redondeamos
        numero=numero.toFixed(decimales);
    }

    // Convertimos el punto en separador_decimal
    numero=numero.toString().replace(".", separador_decimal!==undefined ? separador_decimal : ",");

    if(separador_miles){
        // Añadimos los separadores de miles
        var miles=new RegExp("(-?[0-9]+)([0-9]{3})");
        while(miles.test(numero)) {
            numero=numero.replace(miles, "$1" + separador_miles + "$2");
        }
    }

    return numero;
}
		</script>
	</head>
	<body>
		<img src="<?=base_url()?>assets/img/banner.jpg" width="100%" class="banner" alt="">
		<div class="container">
			<div class="span12">
				<form action="<?=base_url()?>home/calcular" method="post">
				<div class="row">
					<div class="col-md-12">
						<hr>
						<h4>Ingresos</h4>
					</div>
 					<div class="col-md-6 clearLeft">
						<label for="renta">¿Cuál es tu sueldo bruto mensual?:</label>
					</div>
					<div class="col-md-6 clear">
						<input type="text" placeholder="$" name="renta" id="renta">
					</div>
					<div class="col-md-6 clearLeft">
						<label for="ahorro">¿Cuánto ahorras mensualmente fuera de lo obligatorio (AFP)? :</label>
					</div>
					<div class="col-md-6 clear">
						<input type="text" placeholder="$" name="ahorro" id="ahorro">
					</div>
					<div class="col-md-12 clear">
						<hr>
						<h4>Vivienda</h4>
					</div>
					<div class="col-md-6 clearLeft">
						<label for="conoceValor">¿Conoces el valor de tu vivienda? (propia o arrendada):</label>
					</div>
					<div class="col-md-6 clear">
						<select name="conoceValor" id="conoceValor">
							<option value="">-- Selección --</option>
							<option value="2">Si</option>
							<option value="1">No</option>
						</select>
					</div>
					<div class="col-md-6 clearLeft">
						<label for="valorVivienda">¿Cuál es el valor? (en pesos):</label>
					</div>
					<div class="col-md-6 clear">
						<input type="text" placeholder="$" name="valorVivienda">
					</div>
					<div class="col-md-6 clearLeft">
						<label for="dfl2">¿Sabes si tu vivienda es DFL2? :</label>
					</div>
					<div class="col-md-6 clear">
						<select id="dfl2" name="dfl2">
							<option value="0">-- Selección --</option>
							<option value="2">Si</option>
							<option value="1">No</option>
							<option value="0">No sabe</option>
						</select>
					</div>
					<div class="col-md-12 clear">
						<hr>
						<h4>Combustibles</h4>
					</div>
					<div class="col-md-6 clearLeft">
						<label for="bencina">¿Cuánto gastas mensualmente en bencina?:</label>
					</div>
					<div class="col-md-6 clear">
						<input type="text" placeholder="$" name="bencina" id="bencina">
					</div>
					<div class="col-md-6 clearLeft">
						<label for="diesel">¿Cuánto gastas mensualmente en diesel?:</label>
					</div>
					<div class="col-md-6 clear">
						<input type="text" placeholder="$" name="diesel" id="diesel">
					</div>
					<div class="col-md-12 clear">
						<hr>
						<h4>Cigarros</h4>
					</div>
 					<div class="col-md-6 clearLeft">
						<label for="fumas">¿Cuántas cajetillas fumas en una semana? :</label>
					</div>
					<div class="col-md-6 clear">
						<select name="fumas" id="fumas">
							<option value="">-- Selección --</option>
							<option value="0">-- No fumo --</option>
							<option value="1">-- 1 --</option>
							<option value="2">-- 2 --</option>
							<option value="3">-- 3 --</option>
							<option value="4">-- 4 --</option>
							<option value="5">-- 5 --</option>
							<option value="6">-- 6 --</option>
							<option value="7">-- 7 --</option>
							<option value="8">-- 8 --</option>
							<option value="9">-- 9 --</option>
							<option value="10">-- 10 --</option>
							<option value="15">-- 15 --</option>
							<option value="20">-- 20 --</option>
							<option value="25">-- 25 --</option>
						</select>
					</div>
					<div class="col-md-12 clear">
						<hr>
						<h4>Bebestibles</h4>
					</div>
					<div class="col-md-6 clearLeft">
						<label for="vino">¿En una semana, cuántas copas de vino tomas?:</label>
					</div>
					<div class="col-md-6 clear">
						<select id="vino" name="vino">
							<option value="">-- Selección --</option>
							<option value="0">-- No bebo --</option>
							<option value="1">-- 1 --</option>
							<option value="2">-- 2 --</option>
							<option value="3">-- 3 --</option>
							<option value="4">-- 4 --</option>
							<option value="5">-- 5 --</option>
							<option value="6">-- 6 --</option>
							<option value="7">-- 7 --</option>
							<option value="8">-- 8 --</option>
							<option value="9">-- 9 --</option>
							<option value="10">-- 10 --</option>
							<option value="15">-- 15 --</option>
							<option value="20">-- 20 --</option>
							<option value="25">-- 25 --</option>
						</select>
					</div>
					<div class="col-md-6 clearLeft">
						<label for="pisco">¿En una semana, cuántos vasos de pisco o piscolas tomas?:</label>
					</div>
					<div class="col-md-6 clear">
						<select id="pisco" name="pisco">
							<option value="">-- Selección --</option>
							<option value="0">-- No bebo --</option>
							<option value="1">-- 1 --</option>
							<option value="2">-- 2 --</option>
							<option value="3">-- 3 --</option>
							<option value="4">-- 4 --</option>
							<option value="5">-- 5 --</option>
							<option value="6">-- 6 --</option>
							<option value="7">-- 7 --</option>
							<option value="8">-- 8 --</option>
							<option value="9">-- 9 --</option>
							<option value="10">-- 10 --</option>
							<option value="15">-- 15 --</option>
							<option value="20">-- 20 --</option>
							<option value="25">-- 25 --</option>
						</select>
					</div>
					<div class="col-md-6 clearLeft">
						<label for="cerveza">¿En una semana, cuántos vasos de cerveza?:</label>
					</div>
					<div class="col-md-6 clear">
						<select id="cerveza" name="cerveza">
							<option value="">-- Selección --</option>
							<option value="0">-- No bebo --</option>
							<option value="1">-- 1 --</option>
							<option value="2">-- 2 --</option>
							<option value="3">-- 3 --</option>
							<option value="4">-- 4 --</option>
							<option value="5">-- 5 --</option>
							<option value="6">-- 6 --</option>
							<option value="7">-- 7 --</option>
							<option value="8">-- 8 --</option>
							<option value="9">-- 9 --</option>
							<option value="10">-- 10 --</option>
							<option value="15">-- 15 --</option>
							<option value="20">-- 20 --</option>
							<option value="25">-- 25 --</option>
						</select>
					</div>
					<div class="col-md-6 clearLeft">
						<label for="anhalcol">¿En una semana, cuántos vasos de bebidas no alcohólicas tomas? (jugos, gaseosas, aguas minerales saborizadas):</label>
					</div>
					<div class="col-md-6 clear">
						<select id="anhalcol" name="anhalcol">
							<option value="">-- Selección --</option>
							<option value="0">-- No bebo --</option>
							<option value="1">-- 1 --</option>
							<option value="2">-- 2 --</option>
							<option value="3">-- 3 --</option>
							<option value="4">-- 4 --</option>
							<option value="5">-- 5 --</option>
							<option value="6">-- 6 --</option>
							<option value="7">-- 7 --</option>
							<option value="8">-- 8 --</option>
							<option value="9">-- 9 --</option>
							<option value="10">-- 10 --</option>
							<option value="15">-- 15 --</option>
							<option value="20">-- 20 --</option>
							<option value="25">-- 25 --</option>
						</select>
					</div>
					<div class="col-md-6"></div>
					<div class="col-md-12"></div>
					<div class="col-md-3"></div>
					<div class="col-md-3">
						<input type="submit" class="btn btn-success" value="Calcular">
					</div>
					<div class="col-md-3">
						<input type="button" class="btn btn-warning" value="Cancelar" onclick="location.reload();">
					</div>
					<div class="col-md-3">
					</div>

				</div>
				</form>
			</div>
		</div>
                <script>
                  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                  ga('create', 'UA-16963493-14', 'whooohq.net');
                  ga('send', 'pageview');

                </script>
	</body>
</html>