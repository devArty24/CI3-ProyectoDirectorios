<html>
<body>
<div id="wrapper">
  <div id="page-wrapper">
<div class="container-fluid">
 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Directorio |<small> Modificación</small>
                        </h1>
                       <!--  <ol class="breadcrumb">
                           <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>-->
                    </div>
                </div>
<?php
 foreach ($act as $object)
 {
     $activo= $object->activo;
 }?>
<body>
<?=form_open('directorioc/updates','class="form-horizontal"');?>

<table>
<center>
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Categoria</label>
    <div class="col-sm-5">
     <input type="text"class="form-control"name="categoria" value="<?= $get_editd->categoria;?>" readonly='readonly'/>
    </div>

  </div>
  
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Nombre del establecimiento</label>
    <div class="col-sm-5">
    <input type="text"class="form-control"name="nombre" value="<?= $get_editd->nombre;?>"/>
<?=form_hidden('idd',$get_editd->idd);?>
<?php echo form_error('nombre')?>
    </div>

  </div>
  
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Teléfono</label>
    <div class="col-sm-5">
   <input type="text"class="form-control"name="telefono" value="<?= $get_editd->telefono;?>"/>
<b><?php echo form_error('telefono')?></b>
    </div>

  </div>
  
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Horario</label>
    <div class="col-sm-5">
  <input type="text"class="form-control"name="horario" value="<?= $get_editd->horario;?>"/>
<?php echo form_error('horario')?>
    </div>

  </div>
  
   <div class="form-group">
	<label for="inputEmail3" class="col-sm-4 control-label">Reseña</label>
	<div class="col-sm-5">
	<textarea rows="3" type="text"class="form-control" name="resena" value=""/><?= $get_editd->resena;?></textarea>
	<b><?php echo form_error('resena')?></b>
   </div>
   </div>

     <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Red(es) Social(es)</label>
    <div class="col-sm-5">
  <input type="text"class="form-control"name="redsocial" value="<?= $get_editd->redsocial;?>"/>
<b><?php echo form_error('redsocial')?></b>
    </div>

  </div>

<!--<tr><td>Municipio</td></tr>
<tr><td>
<?php
/*
echo "<p><label for='municipios'> </label>";
echo "<select name='idm'>";
if (count($municipios)) {
    foreach ($municipios as $list) {
        echo "<option value='". $list['idm'] . "'>" . $list['lugar'] . "</option>";
    }
}
echo "</select><br/>";*/

?>
</td></tr>
<tr><td><b><?php echo form_error('nombre')?></b></td></tr>-->
</center>

 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dirección <small></small>
                        </h1>
                       <!--  <ol class="breadcrumb">
                           <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>-->
                    </div>
                </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Calle</label>
	
    <div class="col-sm-7">
     <input type="text"class="form-control"name="calle" value="<?= $get_editd->calle;?>"/>
	  <b><?php echo form_error('calle')?></b>
    </div>
	
  </div>

  <div class="col-lg-7">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-6 control-label">Número</label>
	
    <div class="col-sm-4">
      <input type="text"class="form-control"name="numero" value="<?= $get_editd->numero;?>"  MAXLENGTH="5"/>
	 <b><?php echo form_error('numero')?></b>
    </div>
	
  </div>
</div>

<div class="col-lg-13">

   <div class="form-group">
    <label for="inputEmail3" class="col-sm-1 control-label">C.P.</label>
	
    <div class="col-sm-2">
      <input type="text"class="form-control"name="cp" value="<?= $get_editd->cp;?>" MAXLENGTH="5"/>
	  	<b><?php echo form_error('cp')?></b>
    </div>

  </div>

      <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Activo</label>
    <div class="col-sm-10">
    <?php if($activo=='si'){?>
           
        <div class="radio"><label>
        <input type="radio" name="activo"value="si"checked>Si
        </label></div>
        <div class="radio"><label>
        <input type="radio" name="activo"value="no">No
        </label></div>
         <?php }
		 else { ?>
        <div class="radio"><label>
        <input type="radio" name="activo"value="si">Si
        </label></div>
        <div class="radio"><label>
        <input type="radio" name="activo"value="no"checked>No
        </label></div>
        <?php } ?>

    </div>

  </div>
  

<center><?php echo form_submit('submit','Registrar','class="btn btn-default"');?>
<a href="<?php echo base_url();?>index.php/directorioc/cargainformacion"><input type="button"class="btn btn-primary"value="Cancelar"></a>
<?=form_close();?>
<!--</form>-->
<div class="text-right"><br>
                                   <i class="fa fa-arrow-circle-left"></i> BARTDirectory <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
								</div>
								</div>
</body>