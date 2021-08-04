<html>
<head>
	<title>BARTDirectory</title>
	<link href="<?php echo base_url();?>css2/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo base_url();?>css2/style.css" rel="stylesheet" type="text/css" media="all" />

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<script type="application/x-javascript">
		addEventListener("load", function(){
			setTimeout(hideURLbar, 0);
		}, false);
		function hideURLbar(){
			window.scrollTo(0,1);
		}
	</script>
	<script src="<?php echo base_url();?>js2/jquery.min.js"></script>
	<link rel="shortcut icon" href="<?php echo base_url();?>images2/siglas.ico">
	<script src="<?php echo base_url();?>js2/simpleCart.min.js"> </script>		
</head>
<body>
	<!-- header -->
	<?php include('menu.php'); ?>
	<!-- header -->
	
	<!-- register -->
	<div class="main-1">
		<div class="container">
			<div class="register">
				<?php if(isset($mensaje)):?>
					<h2><?= $mensaje;?></h2>
				<?php endif;?>
		  	  	
				<form action="<?php echo base_url();?>Usuariosc/agregaru" method="post"> 
					<div class="register-top-grid">
						<h3>INFORMACIÓN PERSONAL</h3>
					 	<div class="wow fadeInLeft" data-wow-delay="0.4s">
							<!--<span>Nombre<label>*</label></span>-->
							<input type="text"name="nombre"placeholder="Nombre *"value="<?= @set_value('nombre');?>">
                        	<b><?php echo form_error('nombre');?></b>						
					 	</div>
					 	<div class="wow fadeInRight" data-wow-delay="0.4s">
							<!--<span>Apellido Paterno<label>*</label></span>-->
							<input type="text"name="app"placeholder="Apellido Paterno *"value="<?= @set_value('app');?>">
							<b><?php echo form_error('app');?>
					 	</div>
					 	<div class="wow fadeInRight" data-wow-delay="0.4s">
							<!--<span>Apellido Materno<label>*</label></span>-->
							<input type="text"name="apm"placeholder="Apellido Materno *"value="<?= @set_value('apm');?>"> 
							<b><?php echo form_error('apm');?></b>						
					 	</div>					 
					 	<div class="wow fadeInRight" data-wow-delay="0.4s">
							<!--<span>Usuario<label>*</label></span>-->
							<input type="text"name="nomuser"placeholder="Usuario *"value="<?= @set_value('nomuser');?>"> 
							<b><?php echo form_error('nomuser');?>
					 	</div>					 
					 	<div class="wow fadeInRight" data-wow-delay="0.4s">
							<!--<span>Contraseña<label>*</label></span>-->
							<input type="password"name="pass"placeholder="Contraseña">
							<b><?php echo form_error('pass')?><br>
							<span><label></label></span>
							<input type="password"name="pass2"placeholder="Confirmar Contraseña *">
							<b><?php echo form_error('pass2')?>				
					 	</div>
					 	<div class="wow fadeInRight" data-wow-delay="0.4s">
							<!--<span>Correo Electronico<label>*</label></span>-->
							<input type="text"name="correo"placeholder="Correo Electronico"value="<?= @set_value('correo');?>">
							<b><?php echo form_error('correo')?>
					 	</div>
					</div>		
					<div class="clearfix"> </div>
					
					<input class="acount-btn"type="submit" value="Aceptar">
					<div class="clearfix"> </div>
				</form>
			</div>
		</div>
	</div>

</div>
<!-- register -->	

<!-- footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-left">
				<p>Copyrights © BARTDirectory</p>
			</div>
			<div class="footer-right">
				<ul>
					<li><a href="#"><i class="fbk"></i></a></li>
					<li><a href="#"><i class="googpl"></i></a></li>
					<li><a href="#"><i class="link"></i></a></li>
					<li><a href="#"><i class="rss"></i></a></li>
					<li><a href="#"><i class="twt"></i></a></li>
				</ul>
			</div>	
				<div class="clearfix"></div>
		</div>
	</div>
<!-- footer-->	
</body>
</html>