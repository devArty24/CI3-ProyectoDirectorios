<html>
<body>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Promociones |<small> Modificación</small></h1>
                    </div>
                </div>
                <?php foreach ($act as $object){
                    $activo= $object->activo;
                }?>
<body>
                <?=form_open('promocionesc/updates','class="form-horizontal"');?>
                    <center>
                        <table>
                            <div class="form-group">
	                            <label for="inputEmail3" class="col-sm-4 control-label">Promoción</label>
	                            <div class="col-sm-5">
	                                <textarea rows="3" type="text"class="form-control" name="descripcion"><?= $get_editp->descripcion;?></textarea>
	                                <?=form_hidden('idp',$get_editp->idp);?>
	                                <b><?php echo form_error('descripcion')?>
                                </div>
                            </div>
                            <div class="form-group">
	                            <label for="inputEmail3" class="col-sm-4 control-label">Descuento</label>
	                            <div class="col-sm-5">
	                                <input type="text"class="form-control"name="descuento" value="<?= $get_editp->descuento;?>"/>
	                                <b><?php echo form_error('descuento')?></b>
                                </div>
                            </div>
                            <div class="form-group">
	                            <label for="inputEmail3" class="col-sm-4 control-label">Vigencia</label>
	                            <div class="col-sm-5">
	                                <textarea rows="3" type="text"class="form-control" name="vigencia"><?= $get_editp->vigencia;?></textarea>
	                                <b><?php echo form_error('vigencia')?></b>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Activo</label>
                                <div class="col-sm-2">
                                    <?php if($activo=='Si'){?>
                                        <input type="radio" name="activo"value="Si"checked>Si
                                        <input type="radio" name="activo"value="no">No
                                    <?php }else{ ?>
                                        <input type="radio" name="activo"value="Si">Si
                                        <input type="radio" name="activo"value="no"checked>No
                                    <?php } ?>
                                </div>
                            </div>
                            <br>
                            <?php echo form_submit('submit','Registrar','class="btn btn-default"');?>
                            <a href="<?php echo base_url();?>promocionesc/cargapromos"><input type="button"class="btn btn-primary"value="Cancelar"></a>
                <?=form_close();?><!--</form>-->
                <div class="text-right">
                    <br>
                    <i class="fa fa-arrow-circle-left"></i> BARTDirectory <i class="fa fa-arrow-circle-right"></i></a>
                </div>
			</div>
		</div>

</body>