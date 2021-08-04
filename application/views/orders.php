<html>
<head>
	<title>BARTDirectory</title>
	<link type="images2/x-icon" href="<?php echo base_url();?>favicon.ico" rel="icon" />
	
	<!--Galeria-->
	<link rel="stylesheet" href="<?php echo base_url();?>css/estilos.css">

    <!-- Responsive Lightbox: Shadowbox -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/shadowbox.css">
    <script type="text/javascript" src="<?php echo base_url();?>js/shadowbox.js"></script>
    <script type="text/javascript">Shadowbox.init();</script>
	
	<link rel="stylesheet" href='<?php echo base_url();?>css4/hoverbox.css' type="text/css" media="screen, projection" />
	<link href="<?php echo base_url();?>css2/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo base_url();?>css2/style.css" rel="stylesheet" type="text/css" media="all" />
 	<link href="<?php echo base_url();?>css2/stylshet.css" rel="stylesheet" type="text/css" media="all"> <!--Cuadro white-->
  	<link href="<?php echo base_url();?>css2/galeria.css" rel="stylesheet" type="text/css" media="all"> <!--galeria-->

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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

	<!-- about -->	
	<div class="orders">
		<div class="container">
			<div class="order-top">
				<?php foreach($resultado as $object){
						$iddpr=$object->idd;
						$nombree=$object->nombre;
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
						$nombrei=$object->nombrei  ?? "";
					}
				?>

				<!--INICIO INFO. LUGAR-->
			 	<div id="content-full">
            		<div class="container cont-main">
                		<div class="transparent-bg"></div>
                		<div id="boxed-area" class="page-content">
                   			<div class="row">
                        		<div class="col-lg-12">
									<li class="im-g">
										<a href="#">
											<img src="<?php echo base_url();?>img/<?php echo $nombrei;?> " class="img-responsive" width="90%" height="" alt="">
										</a>
									</li>                            
									<li class="data"><h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $categoria ?> |&nbsp;<?php echo $idm ?></h5>
										<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Dirección:</b> Calle &nbsp;<?php echo $calle?>&nbsp;No. &nbsp;<?php echo $numero?>, &nbsp;<?php echo $cp ?></p>
										<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Horario:</b> <?php echo $horario ?></p>
										<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Telefono:</b> <?php echo $telefono ?></p>
										<div class="footer-center">
											<ul>
												<li><a href="#"><i class="fbk"></i></a></li>
												<li><a href="#"><i class="googpl"></i></a></li>
												<li><a href="#"><i class="link"></i></a></li>
												<li><a href="#"><i class="rss"></i></a></li>
												<li><a href="#"><i class="twt"></i></a></li>
											</ul>
										</div>	
									</li>
                        		</div>
                    		</div>
          				</div>
                    </div>
 				</div>

				<!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15063.735186282784!2d-99.457954!3d19.285245!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb4ed8fc945cce278!2sLos+Cochinitos!5e0!3m2!1ses-419!2smx!4v1475097092797" width="400" height="220" frameborder="0" style="border:0" allowfullscreen></iframe></CENTER>-->
						
				<!--DESCRIPCION DEL LUGAR--->
				<div id="content-full">
            		<div class="container cont-main">
                		<div class="transparent-bg"></div>
                		<div id="boxed-area" class="page-content">
                   			<div class="row" >
                        		<div class="col-lg-12">
									<li class="data"><h5>Descripción del lugar</h5><h5><?php echo $categoria ?>&nbsp; </h5>
										<p align="justify"><?php echo $resena ?></p>
									</li>
									<CENTER><img src="<?php echo base_url();?>img/<?php echo $nombrei;?> " class="img-responsive" width="400" height="400"></CENTER>	
                        		</div>
                    		</div>
          				</div>
                    </div>
 				</div>

				<!--GALERIA CENTRADA-->
		 		<div id="content-full">
            		<div class="container cont-main">
                		<div class="transparent-bg"></div>
                		<div id="boxed-area" class="page-content">
                    		<div class="row" >
                        		<div class="col-lg-12">
                            		<div class="center">
                                		<h5 class="center">Galeria<br><br></a></h5>
								 		<div id="galeria">
          									<?php foreach($resultado as $object){
												$nombre=$object->nombre;
											?>
            								<a href="<?php echo base_url();?>img/<?php echo $nombre;?>"  rel="shadowbox[gru1]" title="">
												<img src="<?php echo base_url();?>img/<?php echo $nombre;?>" width="120">
											</a>
             								<?php }?>
        								</div>
                            		</div>
                        		</div>
                    		</div>
						</div>
                    </div>
				</div>

				<!--SERVICIOS CENTRADOS-->
	 			<div id="content-full">
            		<div class="container cont-main">
                		<div class="transparent-bg"></div>
                		<div id="boxed-area" class="page-content">
                    		<div class="row" >
					   			<div class="center">
					         		<div class="col-lg-3">
                            	</div>
                        		<div class="col-lg-6">
                                	<h5 class="center">Servicios<br><br></a></h5>
   									<table class="table table-bordered table-hover">
										<tr bgcolor="#f0f0ef"><td><b><center>Nombre</td></tr>
										<?php foreach($resultados as $object){
												$servicio=$object->servicio;
												echo "<tr><td> <center> $servicio</td></tr>";
										?>
										<?php }?>
									</table>
                            	</div>
                        	</div>
                    	</div>
					</div>
                </div>
			</div>
	
			<!--MENU CENTRADO-->
			<div id="content-full">
				<div class="container cont-main">
					<div class="transparent-bg"></div>
					<div id="boxed-area" class="page-content">
						<div class="row" >
							<div class="col-lg-3"></div>
							<div class="col-lg-6">
								<div class="center">
									<h5 class="center">Menú<br><br></a></h5>
									<table class="table table-bordered table-hover">
										<tr bgcolor="#f0f0ef"><td><b><center>Nombre</b></td><td><b><center>Precio</b></td></tr>
										<?php foreach($resultadom as $object){
											$platillo=$object->platillo;
											$precio=$object->precio;
											echo "<tr><td><center>$platillo</td><td><center>$ $precio</td></tr>";
										} ?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
										
			<!--PRMOCIONES CENTRADO--->
			<div id="content-full">
            	<div class="container cont-main">
                	<div class="transparent-bg"></div>
                	<div id="boxed-area" class="page-content">
                    	<div class="row" >
					 		<div class="col-lg-3"></div>
                        	<div class="col-lg-6">
                            	<div class="center">
                                	<h5 class="center" >Promociones<br><br></a></h5>
   									<table class="table table-bordered table-hover">
										<tr bgcolor="#f0f0ef"><td><b>Descripción</b></td><td><b>Vigencia</b></td></tr>
										<?php foreach($resultadop as $object){
											$descripcion=$object->descripcion;
											$vigencia=$object->vigencia;
											echo "<tr><td>$descripcion</td><td> $vigencia</td></tr>";
										}?>
									</table>
                            	</div>
                        	</div>
                    	</div>
					</div>
                </div>
			</div>
			<!----FIN PROMOCIONES--->					
		</div>		
		<div class="clearfix"></div>
	</div>
</div>

	<!-- about -->
	<!-- feature 				
	<script type="text/javascript">
		$(window).load(function() {				
			$("#flexiselDemo3").flexisel({
				visibleItems: 8,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 2
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 3
					},
					tablet: { 
						changePoint:768,
						visibleItems: 3
					}
				}
			});			
		});
	</script>
	<script type="text/javascript" src="<?php echo base_url();?>js2/jquery.flexisel.js"></script>
	feature -->	

<!-- footer-->
<br><br><br>
	<div class="footer">
		<div class="container">
			<div class="footer-left">
				<b><p>Copyrights © BARTDirectory</p></b>
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
	</div>
</div>
	
<!-- footer-->

<!---BOTON UP-->	
<a href="#" class="scrollup">Scroll</a>	
</body>
</html>