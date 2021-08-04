<html>
<head>
	<title>BARTDirectory</title>
	<link href="<?php echo base_url();?>css2/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo base_url();?>css2/style.css" rel="stylesheet" type="text/css" media="all" />

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="<?php echo base_url();?>js2/jquery.min.js"></script>
	
	<script src="<?php echo base_url();?>js2/simpleCart.min.js"> </script>		
</head>
<body>
	<!-- header -->
	<?php include('menu.php'); ?>
	<!-- header -->
	
	<!-- register -->
	<br><br><br><br>
	<div class="container">
		<div class="account_grid">
			<?php if(isset($mensaje)):?>
				<h2><?= $mensaje;?></h2>
			<?php endif;?>
			<div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
				<h3>Llena el siguiente formulario</h3>
				<form action="<?php echo base_url();?>Bartdirectoryc/recupera" method="POST">
					<div>
						<span>Contraseña<label>*</label></span>
						<input type="password"name="pass"value="<?= @set_value('pass')?>">
						<b><?php echo form_error('pass')?></b>
					</div>			
					<div>
						<span>Confirmar contraseña<label>*</label></span>
						<input type="password"name="pass2"value="<?= @set_value('pass2')?>"> 
						<b><?php echo form_error('pass2')?></b>
					</div>			
					<div>
						<span>Correo<label>*</label></span>
						<input type="text"name="cor"value="<?= @set_value('cor')?>">
						<b><?php echo form_error('cor')?></b>
					</div>
					<!--<a class="forgot" href="#">Forgot Your Password?</a>-->
					<input class="acount-btn"type ="submit"value="Aceptar">
				</form>
			</div>	
			<div class="clearfix"> </div>
		</div>
	</div>

</div>
<!-- register -->	

	<!-- footer-->
	<br><br><br><br><BR><BR><BR>
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