<html>
<body>
  <div id="wrapper">
    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Menú |<small> Modificación</small></h1>
            </div>
          </div>
          <?php foreach($act as $object){
              $activo= $object->activo;
	            $tipo= $object->tipo;
          }?>
          <body>
            <?=form_open('menuc/updates','class="form-horizontal"');?>
              <center>
                <table>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Nombre del platillo o bebida</label>
                    <div class="col-sm-5">
                      <input type="text"class="form-control" name="platillo" value="<?= $get_editm->platillo;?>"/>
                      <?=form_hidden('idme',$get_editm->idme);?>
                      <b><?php echo form_error('platillo')?></b>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Precio</label>
                    <div class="col-sm-5">
                      <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="text"class="form-control"name="precio"value="<?= $get_editm->precio;?>"/>
	                      <b><?php echo form_error('precio')?></b>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Tipo</label>
                    <div class="col-sm-2">
                      <?php if($tipo=='bebida'){?>
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
                      <?php }else{ ?>
                        <div class="radio">
                          <label>
                            <input type="radio" name="tipo"value="bebida">Bebida
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="tipo"value="comida"checked>Comida
                          </label>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Activo</label>
                    <div class="col-sm-2">
                      <?php if($activo=='Si'){?>
                        <input type="radio" name="activo"value="Si"checked>Si
                        <input type="radio" name="activo"value="No">No
                      <?php }else { ?>
                        <input type="radio" name="activo"value="Si">Si
                        <input type="radio" name="activo"value="No"checked>No
                      <?php } ?>
                    </div>
                  </div>
                  <br>
                  <?php echo form_submit('submit','Guardar','class="btn btn-default"');?>
                  <a href="<?php echo base_url();?>menuc/cargamenu"><input type="button"class="btn btn-primary"value="Cancelar"></a>
            <?=form_close();?>
            <!--</form>-->
            <div class="text-right">
              <br>
              <i class="fa fa-arrow-circle-left"></i> BARTDirectory <i class="fa fa-arrow-circle-right"></i></a>
            </div>
				  </div>
				</div>
</body>