<html>
<body>
<div id="wrapper">
  <div id="page-wrapper">
<div class="container-fluid">
 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Usuario |<small> Modificación</small>
                        </h1>
                       <!--  <ol class="breadcrumb">
                           <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>-->
                    </div>
                </div>
<?php
foreach($act as $object)
{
	$activo=$object->activo;
}
?><body>
<?=form_open('usuariosc/update','class="form-horizontal"');?>
<center>
<table>

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Nombre</label>
    <div class="col-sm-5">
     <input type="text" class="form-control" name="nombre" value="<?= $get_edit->nombre;?>"/>
<?=form_hidden('idu',$get_edit->idu);?>
<b><?php echo form_error('nombre')?>
    </div>

  </div>
<!--<form action="agregaru" method="post">-->
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Apellido Paterno</label>
    <div class="col-sm-5">
     <input type="text"  class="form-control" name="app"value="<?= $get_edit->app;?>"/>
    </div>

  </div>

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Apellido Materno</label>
    <div class="col-sm-5">
     <input type="text"  class="form-control" name="apm"value="<?= $get_edit->apm;?>"/>
    </div>

  </div>
  
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Nombre de usuario</label>
    <div class="col-sm-5">
     <input type="text"   class="form-control"  name="nomuser"value="<?= $get_edit->nomuser;?>"/>
	 <b><?php echo form_error('nomuser')?></b>
    </div>

  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Contraseña</label>
    <div class="col-sm-5">
     <input type="password"   class="form-control"  name="pass"value="<?= $get_edit->pass;?>"/>
	 <b><?php echo form_error('pass')?></b>
    </div>

  </div>
  
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Correo</label>
    <div class="col-sm-5">
    <input type="text"   class="form-control"  name="correo"value="<?= $get_edit->correo;?>"/>
	<b><?php echo form_error('correo')?></b>
    </div>

  </div>



    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Activo</label>
    <div class="col-sm-2">
    <?php if ($activo=='Si')
	{
		echo"<input type =  radio  name =  activo  value = si checked > Si <input type =  radio  name =  activo  value =  no > No ";
	}
	else 
	{
		echo"<input type =  radio  name =  activo  value = si > Si<input type =  radio  name =  activo  value =  no checked> No ";
	}?>

    </div>

  </div>
<?php echo form_submit('submit','Guardar','class="btn btn-default"');?>
<a href="<?php echo base_url();?>index.php/usuariosc/cargausuarios"><input type="button"class="btn btn-primary"value="Cancelar"></a>
<?=form_close();?>
<!--</form>-->
<div class="text-right"><br>
                                   <i class="fa fa-arrow-circle-left"></i> BARTDirectory <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
								</div>
								</div>
</body>