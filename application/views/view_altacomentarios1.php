<html>
<?php
 foreach ($use as $object)
 {
     @$idu= $object->idu;
     @$nombre= $object->nomuser;
	 #$tipo= $object->tipo;
 }?>
<body>
<div id="wrapper">
  <div id="page-wrapper">
<div class="container-fluid">
 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Comentarios |<small> Registro</small>
                        </h1>
                       <!--  <ol class="breadcrumb">
                           <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>--> 
                    </div>
                </div>

<form action="agregarcomentario" method="post" class="form-horizontal">
<table>

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">clave</label>
    <div class="col-sm-10">
      <input type="text"name="clave"class="form-control"value="<?= $object->idu;?>"readonly/>
	  <b><?php echo form_error('clave')?></b>
    </div>

  </div>

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Comentario</label>
    <div class="col-sm-10">
     <textarea class="form-control" rows="3"name="comentario"value="<?= @set_value('precio')?>"placeholder="Comentario"></textarea>
	  <b><?php echo form_error('comentario')?></b>
    </div>

  </div>
  
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Lugar</label>
    <div class="col-sm-10">
     <?php
echo form_open('form/register');
echo "<p><label for='directorio'> </label>";
echo "<select name='idd'>";
if (count($directorio)) {
    foreach ($directorio as $list) {
        echo "<option value='". $list['idd'] . "'>" . $list['nombre'] . "</option>";
    }
}
echo "</select><br/>";

echo form_close();
?>
    </div>

  </div>
<!--<tr><td>Lugar</td></tr>
<tr><td>

</td></tr>-->
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Activo</label>
    <div class="col-sm-10">
     <input type = 'radio' name = 'activo' value = 'Si' checked>Si
<input type = 'radio' name = 'activo' value = 'No'>No 

    </div>

  </div>
<center>
<?php echo form_submit('submit','Registrar','class="btn btn-default"'); ?>
<a href="<?php echo base_url();?>index.php/directorioc/muestradirectorio"><input type="button"class="btn btn-primary"value="Cancelar"></a>
</form>
</table>
<div class="text-right">
                                   <i class="fa fa-arrow-circle-left"></i> BARTDirectory <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
								</div>
</div>
