<html>
<head>
	<title>BARTDirectory</title>
	
	<link href="<?php echo base_url();?>css2/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo base_url();?>css2/style.css" rel="stylesheet" type="text/css" media="all" />
 	<link href="<?php echo base_url();?>css2/styleshet.css" rel="stylesheet" type="text/css" media="all"> <!--Cuadro white-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	
	<script type="application/x-javascript">
		addEventListener("load", function(){
			setTimeout(hideURLbar, 0);
		}, false);
		function hideURLbar(){
			window.scrollTo(0,1);
		}
	</script>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700' rel='stylesheet' type='text/css'>
	<script src="<?php echo base_url();?>js2/jquery.min.js"></script>
	<link rel="shortcut icon" href="<?php echo base_url();?>images2/siglas.ico">
	<script src="<?php echo base_url();?>js2/simpleCart.min.js"> </script>		
</head>
<body>
	<!---BOTON UP-->
	<script type="text/javascript">
    	$(document).ready(function(){
        	$(window).scroll(function(){
            	if($(this).scrollTop() > 100) {
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
	
	<!-- about -->
	<div class="orders">
		<div class="container">
		<?php if(empty($resultado)){?>
			<p class="text-center" style="font-size:3em;">No hay resultados para mostrar.</p>
		<?php }else{?>
			<?php foreach($resultado as $object){
				$iddpr=$object->idd;
				$nombre=$object->nombre;
				$telefono=$object->telefono;
				$horario=$object->horario;
				$resena=$object->resena;
				$redsocial=$object->redsocial;
				$idm=$object->lugar;
				$calle=$object->calle;
				$numero=$object->numero;
				$cp=$object->cp;
				$activo=$object->activo;
				$categoria=$object->categoria;
				$nombrei=$object->nombrei;
				#echo $nombrei;
			?>
				<div class="order-top">
					<div id="content-full">
						<div class="container cont-main">
							<div class="transparent-bg"></div>
							<div id="boxed-area" class="page-content">
								<div class="row">
									<div class="col-lg-12">
										<li class="im-g">
											<a href="<?php echo base_url('bartdirectoryc/informacion')."?idd=$iddpr"?>">
												<img src="<?php echo base_url();?>img/<?php echo $nombrei;?> " class="img-responsive" width="90%" height="" alt="">
											</a>
										</li>                          
										<li class="data">
											<h4><b><?php echo $nombre ?></h4><h5><?php echo $categoria ?> <?php echo $idm ?></h5>
											<p><b>Dirección:</b>&nbsp;<?php echo $calle?>&nbsp;Número &nbsp;<?php echo $numero?>&nbsp; C.P. &nbsp;<?php echo $cp ?></p>
											<P><?php echo $resena ?></P>
										</li>
										<li class="bt-nn">
											<a class="morebtn hvr-rectangle-in" href="<?php echo base_url('bartdirectoryc/informacion')."?idd=$iddpr"?>">Acerca de</a>
										</li>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php }?>
	</div>
	
	<br><br><br>
	<ul class="pager">
  		<li><a href="#">Anterior</a></li>
  		<li><a href="#">Siguiente</a></li>
	</ul>
	<br>
</div>
<!-- about -->

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