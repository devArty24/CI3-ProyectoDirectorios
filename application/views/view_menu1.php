<html>
  <!-- Establecimiento -->
<?php foreach(@$dat as $object){
        @$idd= $object->idd;
        @$nombre= $object->nombre;
        @$usuario= $object->usuario;
	      #$tipo= $object->tipo;
 }?>
 
 <?php foreach(@$use as $ob){
        @$idu= $ob->idu;
        @$nomuser= $ob->nomuser;
	      #$tipo= $object->tipo;
 }?>
<body>
  <div id="wrapper">
    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Menú |<small> Registro</small></h1>
          </div>
        </div>
        
        <form action="<?php echo base_url();?>menuc/agregar" method="post" class="form-horizontal">
          <table>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label"></label>
              <div class="col-sm-10">
                <input type="hidden"name="clave"class="form-control"value="<?= @$object->idd;?>"readonly="readonly" required/><!--linea cambiada-->
	              <b><?php echo form_error('clave')?></b>
              </div>
            </div> 
	          <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
              <div class="col-sm-10">
                <input type="text"name="us"class="form-control"value="<?= $ob->nomuser;?>" readonly="readonly" required>
                <b><?php echo form_error('us')?></b>	  
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nombre </label>
              <div class="col-sm-10">
                <input type="text"name="platillo"value="<?= @set_value('platillo')?>"class="form-control"placeholder="Ingresa el nombre del platillo o bebida"/>
	              <b><?php echo form_error('platillo')?></b>
              </div>
            </div>  
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Precio </label>
              <div class="input-group">
	              <span class="input-group-addon">$</span>
                <input type="text"name="precio"value="<?= @set_value('precio')?>"class="form-control"placeholder="Ingresa el precio del platillo o bebida"/>
	              <b><?php echo form_error('precio')?></b>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Tipo</label>
              <div class="col-sm-10">
                <div class="radio">
                  <label>
                    <input type="radio" name="tipo"value="bebida"checked>Bebida
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="tipo"value="comida">Comida
                  </label>
                </div>
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
          </table>
        </form>
        
        <div class="text-right">
          <i class="fa fa-arrow-circle-left"></i> BARTDirectory <i class="fa fa-arrow-circle-right"></i></a>
        </div>
			</div>
    </div>
</body>
