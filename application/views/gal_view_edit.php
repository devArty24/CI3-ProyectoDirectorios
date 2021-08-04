

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Galeria |<small> Modificacion</small></h1>
                    </div>
                </div>
                <center>
				    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i>  <strong>Editar descripcion de la imagen</strong>
                            </div>
                        </div>
                    </div>
                    <?php foreach($img as $object){
	                    $nombre=$object->nombre;
                    }?>
                    <body>
                        <?=form_open('galeriac/updates');?>
                            <center>
                                <table>
                                    <td align="center"><img src="<?php echo base_url();?>img/<?php echo $nombre;?> " width="200">
                                    <!--<form action="agregaru" method="post">-->
                                    <?=form_hidden('id_img',$geteditg->id_img);?></td></tr>
                                    <tr>
                                        <td><b><?php echo form_error('descripcion')?></b></td>
                                    </tr>
                                    <br>
                                    <tr>
                                        <td align="center"><br><br><b>Descripcion</td>
                                    </tr>
                                    <tr>
                                        <td><textarea rows="5" type="text"class="form-control" name="descripcion"><?=$geteditg->descripcion;?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Establecimiento</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php
                                                echo form_open('form/register');
                                                echo "<p><label for='directorio'> </label>";
                                                echo "<select name='idd'>";
                                                if($directorio){
                                                        echo "<option value='". $directorio->idd . "'>" . $directorio->nombre . "</option>";
                                                }
                                                echo "</select><br/>";
                                                echo form_close();
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"><br><?php echo form_submit('submit','Guardar','class="btn btn-default"');?>
                                        <a href="<?php echo base_url();?>galeriac/cargagaleria"><input type="button"class="btn btn-primary"value="Cancelar"></td>
                                    </tr>
                        <?=form_close();?> <!--</form>-->
                    </body>