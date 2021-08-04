<html lang="en">
    <?php foreach ($use as $object){
        @$nombre= $object->nomuser;
	    #$tipo= $object->tipo;
    }?>
    
<head>
    <title> Sistema BART</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="<?php echo base_url();?>images2/siglas.ico">
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>directorioc/Muestradirectorio">BARTDirectory</a>
            </div>
            
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown" id="infoUser">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $object->nomuser;?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                            <!--<ul>
                               <a href="<?php echo base_url();?>index.php/usuariosc/altausuarios">Registrar</a>
                            </ul>-->
                        </li>
						<li>
                            <i class="fa fa-fw fa-arrows-v"></i> Mi negocio <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul>
                               <a href="<?php echo base_url();?>directorioc/altadirectorio">Registrar</a>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url();?>logg/logout"><i class="fa fa-fw fa-power-off"></i> Cerrar sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="">
                        <a href="<?php echo base_url();?>directorioc/muestradirectorio"><i class="fa fa-fw fa-dashboard"></i> <b>Inicio</b></a>
                    </li>
					
					<!--MENU-->
					  <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-arrows-v"></i> <b>Menú</b> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>menuc/menu"><b>Buscar</b></a>
                            </li>
                            <li>
                               <a href="<?php echo base_url();?>menuc/altamenu"><b>Registrar</b></a>
                            </li>
                        </ul>
                    </li>
					
					<!--SERVICIOS-->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> <b>Servicios</b> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                               <a href="<?php echo base_url();?>serviciosc/servicios"><b>Buscar</b></a>
                            </li>
                            <li>
                               <a href="<?php echo base_url()?>serviciosc/altaservicios"><b>Registrar</b></a>
                            </li>
                        </ul>
                    </li>
					
					<!--PROMOCIONES-->
					  <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-arrows-v"></i> <b>Promociones</b> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>promocionesc/promociones"><b>Buscar</b></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>promocionesc/altapromos"><b>Registrar</b></a>
                            </li>
                        </ul>
                    </li>
					
					<!--GALERIA-->
					  <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-arrows-v"></i> <b>Galeria</b> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo4" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>galeriac/galeria"><b>Buscar</b></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>galeriac/img"><b>Registrar</b></a>
                            </li>
                        </ul>
                    </li>
					
					<!--COMENTARIOS-->
					 <!--<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="fa fa-fw fa-arrows-v"></i> <b>Comentarios</b> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo5" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>index.php/comentariosc/comentarios"><b>Buscar</b></a>
                            </li>
                            <!--<li>
                                <a href="<?php echo base_url();?>index.php/comentariosc/altacomentarios"><b>Registrar</b></a>
                            </li>-->
                        </ul>
                    </li>-->
                  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/morris/morris-data.js"></script>

</body>

</html>
