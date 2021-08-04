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
	
	<link rel="shortcut icon" href="<?php echo base_url();?>images2/siglas.ico">
	<script src="<?php echo base_url();?>js2/simpleCart.min.js"> </script>
</head>
<body>
	<!---BOTON UP-->						
	<script type="text/javascript">
    	$(document).ready(function(){
        	$(window).scroll(function(){
            	if($(this).scrollTop() > 100){
                	$('.scrollup').fadeIn();
            	}else{
                	$('.scrollup').fadeOut();
            	}
        	});  
        	$('.scrollup').click(function(){
            	$("html, body").animate({ scrollTop: 0 }, 600);
            	return false;
        	});
    	});
	</script>
	<!---FIN BOTON UP-->	
	
	<!-- header -->
	<?php include('menu.php'); ?>
	<!-- header -->

	<!-- register -->
	<br><br><br><br>
	<div class="container">
		<div class="account_grid">
			<div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
				<h3>NUEVO USUARIO</h3>
				<a class="acount-btn" href="<?php echo base_url()?>bartdirectoryc/registro">Crear cuenta</a>
			</div>
			<div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
				<h3>INGRESA TU INFORMACIÓN</h3>
				<?php if(isset($mensaje)):?>
			        <h2><?= $mensaje;?></h2>
			    <?php endif;?>
				
				<form action="<?php echo base_url();?>Logg/logeo" method="POST">
					<div>
						<!--<span>Usuario<label>*</label></span>-->	
						<input type="text"name="username"placeholder="Usuario *"value="<?= @set_value('username')?>" required> 
					</div>	
					<div>
						<!--<span>Password<label>*</label></span>-->
						<input type="password"name="password"placeholder="Password *" required>
					</div>
						<input class="acount-btn"type ="submit"value="Ingresar">
					<div></div>
					<div>
						<a class="forgot"href="<?php echo base_url()?>bartdirectoryc/recup">¿Has olvidado tu contraseña?</a>
					</div>
				</form>
			</div>	
			<div class="clearfix"> </div>
		</div>
	</div>

</div>
<!-- register -->	

	<!-- footer-->
	<br><br><br><br><br><br><br>
	<div class="footer">
		<div class="container">
			<div class="footer-left">
				<p>Copyrights © BARTDirectory</p>
			</div>
			<div class="footer-right">
				<ul>
					<li><a href="#"><i class="fbk"></i></a></li>
					<li><a href="#"><i class="link"></i></a></li>
				</ul>
			</div>	
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- footer-->

	<!---BOTON UP-->	
	<a href="#" class="scrollup">Scroll</a>
</body>
</html>