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

	<!-- contact -->
	<div class="contact">
		<div class="container">
			<div class="contact-head">
				<h3>CONTACTANOS</h3>
					Envianos tu información si quieres que tu negocio tenga un espacio en nuestro sitio!!			 
			</div>
			<?php if(isset($mensaje)):?>
				<h4 class="text-center"><?= $mensaje;?></h4>
			<?php endif;?>
		  	<div class="contact-grid">
				<div class="row">
					<form action="<?php echo base_url();?>Correo/envia" method="post">
						<div class="col-md-6">
							<input type="text"name="nombre"placeholder="Nombre" required value="<?= @set_value('nombre')?>"/>
							<b><?php echo form_error('nombre')?>
						</div>
						<div class="col-md-6">
							<input type="text"name="correo"placeholder="E-mail" required value="<?= @set_value('correo')?>"/>
							<b><?php echo form_error('correo')?>
						</div>
						<div class="col-md-6">
							<input type="text"name="telfono"placeholder="Telefono" required value="<?= @set_value('telfono')?>"/>
							<b><?php echo form_error('telfono')?></b>
						</div>
						<div class="col-md-6">
							<input type="text"name="cm"placeholder="Ciudad/Municipio" required value="<?= @set_value('cm')?>"/>
							<b><?php echo form_error('cm')?></b>
						</div>
						<div class="col-md-12">
							<textarea name="mensaje"placeholder="Mensaje"><?= @set_value('mensaje')?></textarea>
							<b><?php echo form_error('mensaje')?></b>
						</div>
						<div class="col-md-12">
							<input type="submit" value="ENVIAR"/>
						</div>
					</form>
				</div>
		  	</div>
		</div>		
	</div>
	<!-- contact -->

	<!-- footer-->
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