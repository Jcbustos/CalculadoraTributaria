<!doctype html>
<html>
    <head>
        <link href='<?Php echo base_url() ?>assets/img/favicon.ico' rel='shortcut icon' type='image/x-icon'>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
        <title>
            Calculadora tributaria
        </title>
         <style type="text/css">
         	body{margin-top: 80px;}
         	form{
					/*text-align: left;*/
					margin: 0px auto;
				}
         </style>
		 <script>
			function validar(){
				$.post('<?=base_url()?>administrator/validar',
				{
					usuario:$("#usuario").val(),
					password:$("#password").val()
				},function(datos){
					if(datos.response){
						$(".alert-error").hide();
						location.href=datos.url;
					}else{
						$(".alert-error").show();
					}
				},'json');
			}
		 </script>
    </head>
    <body>
        <div class="container">
            <div class="span5 offset6">    
	            <form class="form-horizontal" method="post" action="<?=base_url()?>administrator/validar">
	              <legend>Ingreso</legend>
	              <div class="control-group">
				    <label class="control-label" style="text-align:left;" for="usuario">Email</label>
				    <div class="controls">
				      <input type="text" id="usuario" name="usuario" required placeholder="Email">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" style="text-align:left" for="password">Password</label>
				    <div class="controls">
				      <input type="password" required id="password" name="password" placeholder="Password">
				    </div>
				  </div>
         			<div class="alert alert-error" style="display:none">
					  <center>E-mail o password incorrectos</center>
					</div>
				  <div class="control-group">
				    <div class="controls">
				      <button type="button" onclick="validar()" class="btn btn-success">Ingresar</button>
				    </div>
				  </div>
				</form>
	        </div>
        </div>
    </body>
</html>