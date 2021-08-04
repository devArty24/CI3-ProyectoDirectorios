<html>
<?php foreach ($use as $object){
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
            <h1 class="page-header"> Directorio <small>Registro</small> </h1>
          </div>
        </div>
			  
        <center>
	        <div class="col-lg-12">
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="fa fa-info-circle"></i>  <strong>Bienvenido!</strong> al sistema BARTDirectory</a> comencemos!<br>
							En este apartado debes ingresar la informacion de tu negocio. Todos los campos con * son obligatorios.
            </div>
          </div>
				</center>

        <!--<form action="agregardirectorio" method="post" class="form-horizontal">-->
        <?php echo form_open_multipart('directorioc/uploadimg','class="form-horizontal"'); ?> 
        <table>
          <div class="form-group">
            <label class="col-sm-2 control-label">Seleccionar imagen </label>
            <div class="col-sm-10">
              <input type="file" name="userfile" id="BSbtndanger" required>
              <b><?php echo form_error('userfile')?></b>
            </div>
          </div>
          
          <script>
            $('#BSbtndanger').filestyle({
                buttonName : 'btn-danger',
                buttonText : 'File Select'
            });         
          </script>
				
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
            <div class="col-sm-10">
              <input type="text" name='user' class="form-control" value="<?= $object->nomuser;?>" readonly="readonly"> 
	  	        <b><?php echo form_error('user')?></b>
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">* Nombre del lugar</label>
            <div class="col-sm-10">
              <input type="text"name="nombre"class="form-control"placeholder="Ingresa el nombre de tu establecimiento"value="<?= @set_value('nombre')?>"/>
	            <b><?php echo form_error('nombre')?></b>
            </div>
          </div>
  
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">* Telefono</label>
            <div class="col-sm-10">
              <input type="text"name="telefono"class="form-control"placeholder="Telefono de tu establecimiento"value="<?= @set_value('telefono')?>"/>
	            <b><?php echo form_error('telefono')?></b>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">* Horario</label>
            <div class="col-sm-10">
              <input type="text"name="horario"class="form-control"placeholder="Horario de tu establecimiento"value="<?= @set_value('horario')?>"/>
	            <b><?php echo form_error('horario')?></b>
            </div>
          </div>

          <div class="form-group">
	          <label for="inputEmail3" class="col-sm-2 control-label">* Reseña</label>
	          <div class="col-sm-10">
	            <textarea class="form-control"rows="3"name="resena"placeholder="Descripción de tu establecimiento"><?= @set_value('resena')?></textarea>
	            <b><?php echo form_error('resena')?></b>
            </div>
          </div>
   
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Red(es) social(es)</label>
            <div class="col-sm-10">
              <input type="text"name="redsocial"class="form-control"placeholder="facebook - twitter"value="<?= @set_value('redsocial')?>"/>
              <b><?php echo form_error('redsocial')?></b>   
	          </div>
          </div>
  
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">* Categoria</label>
            <div class="col-sm-1">
              <select name="categoria">
                <option value='Bar'>Bar</option>
                <option value='Antro'>Antro</option>
                <option value='Restaurante'>Restaurante</option>
                <option value='Taqueria'>Taqueria</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">* Municipio</label>
            <div class="col-sm-1">
              <?php
                echo form_open('form/register');
                echo "<p><label for='municipios'> </label>";
                echo "<select name='idm'>";
                
                if(count($municipios)){
                  foreach($municipios as $list){
                    echo "<option value='". $list['idm'] . "'>" . $list['lugar'] . "</option>";
                  }
                }

                echo "</select><br/>";
                echo form_close();
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Dirección <small></small></h1>
              <!--  <ol class="breadcrumb">
                <li class="active">
                  <i class="fa fa-dashboard"></i> Dashboard
                </li>
              </ol>-->
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">* Calle</label>
            <div class="col-sm-10">
              <input type="text"name="calle"class="form-control"placeholder="Calle"value="<?= @set_value('calle')?>"/>
	            <?php echo form_error('calle')?></b>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-5 control-label">* Número</label>
              <div class="col-sm-6">
                <input type="text"name="numero"class="form-control"placeholder="Número"value="<?= @set_value('numero')?>"/>
	              <b><?php echo form_error('numero')?></b>
              </div>
            </div>
          </div>

          <div class="col-lg-30">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-1 control-label">* C.P.</label>
              <div class="col-sm-3">
                <input type="text"name="cp"class="form-control"placeholder="Codigo Postal"value="<?= @set_value('cp')?>"/>
	  	          <b><?php echo form_error('cp')?></b>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Activo</label>
              <div class="col-sm-10">
                <input type = 'radio' name = 'activo' value = 'Si' checked>Si
                <input type = 'radio' name = 'activo' value = 'No'>No 
            </div>
          </div>
        
          <center>
            <?php echo form_submit('submit','Registrar','class="btn btn-default"');?>
            <a href="<?php echo base_url();?>directorioc/muestradirectorio"><input type="button"class="btn btn-primary"value="Cancelar"></a>
        </form>
        <div class="text-right">
          <i class="fa fa-arrow-circle-left"></i> BARTDirectory <i class="fa fa-arrow-circle-right"></i></a>
        </div>
			</div>
    </div>
</body>