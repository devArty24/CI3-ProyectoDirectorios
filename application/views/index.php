<html>
<head>
	<title>BARTDirectory</title>
	<link href="<?php echo base_url();?>css2/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo base_url();?>css2/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url();?>css2/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
 	<link href="<?php echo base_url();?>css2/stylesheet.css" rel="stylesheet" type="text/css" media="all"> 
	
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

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700' rel='stylesheet' type='text/css'>
	<script src="<?php echo base_url();?>js2/jquery.min.js"></script>
	<link rel="shortcut icon" href="<?php echo base_url();?>images2/siglas.ico">
	<script src="<?php echo base_url();?>js2/simpleCart.min.js"> </script>		
</head>
<body>
<!-- header -->
<html>
<body>
	<div class="head-top"></div>
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="<?php echo base_url();?>bartdirectoryc/index">
					<img src="<?php echo base_url();?>images2/logo.png" class="img-responsive">
				</a>
			</div>
			<div class="header-left">
				<div class="head-nav">
					<span class="menu"> </span>
					<ul>
						<li class=""><a href="<?php echo base_url();?>bartdirectoryc/index">Home</a></li>
						<!--<li><a href="index.php/bartdirectoryc/lugares">Lugares</a></li>-->
						<li><a href="<?php echo base_url();?>bartdirectoryc/login">Iniciar Sesión</a></li>
						<li><a href="<?php echo base_url();?>bartdirectoryc/contacto">Contacto</a></li>
							<div class="clearfix"> </div>		
					</ul>

					<!-- script-for-nav -->	
					<script>
						$("span.menu").click(function(){
							$(".head-nav ul").slideToggle(300, function(){
								// Animation complete.
							});
						});
					</script>
						
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
					<!-- script-for-nav --> 
				</div>
					<!--<div class="header-right1">
						<div class="cart box_1">
							<a href="checkout.html">
								<h3> <span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span> items)<img src="images/bag.png" alt=""></h3>
							</a>	
							<p><a href="javascript:;" class="simpleCart_empty">empty card</a></p>
							<div class="clearfix"> </div>
						</div>
					</div>-->
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- header -->
	
	<!-- banner -->
	<div class="banner">
		<div class="container">
			<div class="b_room">
				<div class="booking_room"><br />
					<div class="reservation">
						<div class="book-top">
							<div class="clearfix"> </div>
						</div>
						<ul>
							<li class="span1_of_1">
								 <!----------start section_room----------->
								<div class="section_room">
									<form action ='<?php echo base_url();?>bartdirectoryc/cargainformacion' method='GET'>
									  	<select name="lugar" class="frm-field required">
											<option value="null">Municipio</option>
											<option value="Toluca">Toluca</option>         
											<option value="Lerma">Lerma</option>
											<option value="Metepec">Metepec</option>
											<option value="San Mateo Atenco">San Mateo Atenco</option>
									  	</select>
								</div>	
								<br>
								<div class="section_room">
										<select name="categoria" class="frm-field required">
											<option value="null">Categoria</option>
											<option value="Antro">Antros</option>
											<option value="Bar">Bares</option>
											<option value="Restaurante">Restaurantes</option>
											<option value="Taqueria">Taquerias</option>
										</select>
								</div>
							</li>			  
							<li class="span1_of_3">
								<div class="date_btn">		
										<button type='submit' class="acount-btn" >Buscar</a>
									</form>
								</div>
							</li>
							<div class="clearfix"></div>
						</ul>
					</div>
				</div>	
			</div>
		</div>
	</div>
	<!-- banner -->
	
	<!-- latis -->	
 	<div id="content-full">
        <div class="container cont-main">
            <div class="transparent-bg"></div>
            <div id="boxed-area" class="page-content">
                <div class="row" >	
                    <div class="col-lg-12">
                        <div class="center">
                            <h4 class="center">Has llegado al sitio perfecto para anunciar tu negocio, ganar clientes y aumentar tus ingresos!.<br><br>
							<b>Registrate ahora! <a href="<?php echo base_url();?>bartdirectoryc/login"><img src="<?php echo base_url();?>images2/flecha.png" width="22"></a></h4>
                        </div>
                    </div>
                </div>

                <div class="row">	
					<div class="col-lg-2">
                        <div class="list">
                            <div>    
                                <h4></h4>
                                <div class="section justify"> </div>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-4">
                        <div class="list">
                            <div>    
                                <h4></h4>
                                <div class="section" "justify"> ✔ Registra y promociona tu Bar,<br> &nbsp;&nbsp;&nbsp;  Antro, Restaurante o Taqueria.</div>
                            </div>
                        </div>
                    </div>   
                    <div class="col-lg-4">
                        <div class="list">
                            <div>                                    
                                <h4></h4>
								<div class="section" "justify">✔ Las TIC al servicio de tu negocio<br>&nbsp;&nbsp;&nbsp; BARTDirectory, conocenos y <br> &nbsp;&nbsp;&nbsp; te convenceras.<br></div>    
                            </div>
                        </div>
                    </div>
				</div>
				
				<div class="row">			  
					<div class="col-lg-2">
                        <div class="list">
                            <div>    
                                <h4></h4>
                                <div class="section" "justify"> </div>
                            </div>
                        </div>
                    </div>	
                    <div class="col-lg-4">
                        <div class="list">
                            <div>       
                            	<h4></h4>
								<div class="section" "justify">✔ El sitio indicado para ti<br> &nbsp;&nbsp;&nbsp; y tu negocio.</div>    
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="list">
                            <div>       
                                <h4> </h4>
                                <div class="section" "justify">✔ BARTDirectory sitio web<br>&nbsp;&nbsp;&nbsp;&nbsp;multiplataforma.<br></div>
                        	</div>
                        </div>
                    </div>
                </div>
          	</div>
        </div>
 	</div>
	
	<!-- footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-left">
				<p>Copyrights © BARTDirectory</p>
			</div>
			<div class="footer-right">
				<ul>
					<li><a href="#"><i class="fbk"></i></a></li>
					<!--<li><a href="#"><i class="googpl"></i></a></li>
					<li><a href="#"><i class="rss"></i></a></li>
					<li><a href="#"><i class="twt"></i></a></li>-->
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