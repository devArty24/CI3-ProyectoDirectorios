<html>
<body>
  <div id="wrapper">
    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Servicios |<small> Modificación</small></h1>
          </div>
        </div>
        <?php foreach($act as $object){
            $activo= $object->activo;
        }?>
        
        <?=form_open('serviciosc/updates','class="form-horizontal"');?>
          <center>
            <table>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Nombre del servicio</label>
                <div class="col-sm-5">
                  <input type="text"class="form-control"name="servicio" value="<?= $getedits->servicio;?>"/>
                  <?=form_hidden('ids',$getedits->ids);?>
                  <b><?php echo form_error('servicio')?></b>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Activo</label>
                <div class="col-sm-2">
                  <?php if($activo=='Si'){?>
                    <input type="radio" name="activo"value="Si"checked> Si
                    <input type="radio" name="activo"value="no"> No
                  <?php }else{ ?>
                    <input type="radio" name="activo"value="Si"> Si
                    <input type="radio" name="activo"value="no"checked> No
                  <?php } ?>
                </div>
              </div>

              <br><?php echo form_submit('submit','Guardar','class="btn btn-default"');?>
              &nbsp; <a href="<?php echo base_url();?>serviciosc/cargaservicios"><input type="button"class="btn btn-primary"value="Cancelar"></a>
        <?=form_close();?> <!--</form>-->
        <div class="text-right">
          <br>
          <i class="fa fa-arrow-circle-left"></i> BARTDirectory <i class="fa fa-arrow-circle-right"></i></a>
        </div>
			</div>
		</div>
</body>