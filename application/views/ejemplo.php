<html>
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
            <h1 class="page-header">Galeria |<small> Registro</small></h1>
          </div>
        </div>
        
        <section class="wrapper site-min-height">
		      <center>
            <br>
          	<h3><i class="fa fa-angle-right"><b>Elegir imagen</i></h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		  <p>
                  <!--<?php echo $error;?>
                  <!-- <form action="<?php echo base_url(); ?>index.php/controller_sistema/do_upload" method="POST" enctype="multipart/form-data"> -->
                <?php echo form_open_multipart('galeriac/uploadimg'); ?>
                  <table>
                    <tr>
                      <td>
                        <div class="form-group"> 
                          <!--<label>Enviar Imagen </label>-->
                          <input type="file" name="userfile" id="BSbtndanger">
                        </div>
                      </td>
                    </tr>
				            <tr>
                      <td><b>Descripcion</td>
                    </tr>
			              <tr>
                      <td><textarea class="form-control"rows="3"name="descripcion"><?= @set_value('precio')?></textarea><b><?php echo form_error('descripcion')?></b></td>
                    </tr>
                    <tr>
                      <td><br><b></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"></label>
                          <div class="col-sm-10">
                            <input type="hidden"name="clave"class="form-control"value="<?= $object->idd;?>"readonly="readonly"/>
	                          <b><?php echo form_error('clave')?></b>
                          </div>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td><br><b></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
                          <div class="col-sm-10">
                            <input type="text"name="us"class="form-control"value="<?= $ob->nomuser;?>"readonly="readonly"/>
	                          <b><?php echo form_error('us')?></b>
                          </div>
                        </div> 
                      </td>
                    </tr>
                  </table>
                  <script>
                    $('#BSbtndanger').filestyle({
                        buttonName : 'btn-danger',
                        buttonText : 'File Select'
                    });
                  </script>
                  <br/><br/>
                  <input type="submit" value="Registrar" class="btn btn-danger">
				          <a href="<?php echo base_url();?>directorioc/muestradirectorio"><input type="button"class="btn btn-primary"value="Cancelar"></a>
                </form>
                </p>
          	  </div>
          	</div>
		    </section> <!--/wrapper -->
        <div class="text-right">
          <i class="fa fa-arrow-circle-left"></i> BARTDirectory <i class="fa fa-arrow-circle-right"></i></a>
        </div>