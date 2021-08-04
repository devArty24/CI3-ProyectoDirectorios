<html>
<body>
<div id="wrapper">
  <div id="page-wrapper">
<div class="container-fluid">
 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Comentarios |<small> Modificación</small>
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
<?=form_open('comentariosc/updates','class="form-horizontal"');?>
<center>
<table>
 <div class="form-group">
	<label for="inputEmail3" class="col-sm-4 control-label">Comentario</label>
	<div class="col-sm-5">
	<textarea rows="3" type="text"class="form-control" name="comentario" value=""/><?= $geteditco->comentario;?></textarea>
<?=form_hidden('idco',$geteditco->idco);?>
<b><?php echo form_error('comentario')?></b>
   </div>
   </div>
   
   
    <div class="form-group">
	<label for="inputEmail3" class="col-sm-4 control-label">Lugar</label>
	<div class="col-sm-1">
	<?php

echo "<p><label for='directorio'> </label>";
echo "<select name='idd'>";
if (count($directorio)) {
    foreach ($directorio as $list) {
        echo "<option value='". $list['idd'] . "'>" . $list['nombre'] . "</option>";
    }
}
echo "</select><br/>";

?>
   </div>
   </div>
<!--<form action="agregaru" method="post">-->


<!--<tr><td>Lugar</td></tr>
<tr><td>

</td></tr>-->
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Activo</label>
    <div class="col-sm-2">
    <?php if($activo=='Si'){?>
           
      
        <input type="radio" name="activo"value="Si"checked>Si
      
      
        <input type="radio" name="activo"value="no">No
       
         <?php }
		 else { ?>
      
        <input type="radio" name="activo"value="Si">Si
       
        
        <input type="radio" name="activo"value="no"checked>No
       
        <?php } ?>

    </div>

  </div>
  <br>
<?php echo form_submit('submit','Registrar','class="btn btn-default"');?>
<a href="<?php echo base_url();?>index.php/comentariosc/cargacomentarios"><input type="button"class="btn btn-primary"value="Cancelar"></a>
<?=form_close();?>
<!--</form>-->
<div class="text-right"><br>
                                   <i class="fa fa-arrow-circle-left"></i> BARTDirectory <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
								</div>
								</div>
</body>