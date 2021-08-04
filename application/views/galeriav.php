<body>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <td colspan="6"align="center"><h3>REGISTROS ENCONTRADOS</h3></td>
            </tr>
            <tr>
                <td><b>CLAVE</td><td><b>IMAGEN</td><td><b>DESCRIPCIÓN</td><td colspan="2"><center><b>OPCIONES</center></td>
            </tr>
            <?php foreach($resultado as $object){
	            $id_imgpr=$object->id_img;
	            $nombre=$object->nombre;
	            #$ruta=$object->ruta;
	            $descripcion=$object->descripcion;
            echo "<tr>
                <td>$id_imgpr</td>"?>
                <td><img src="<?php echo base_url();?>img/<?php echo $nombre;?> " width="50" ></td>
                <?php echo "<td>$descripcion</td>"?>
                <td><center><a href="<?php echo base_url()?>galeriac/edit_g/<?=$object->id_img;?>"><button class='btn btn-warning'>MODIFICAR</button></a></td>
                <td><center><a class='eliminar' href="<?php echo base_url('galeriac/eliminaimagen')."?id_img=$id_imgpr"?>"><button type='button' class='btn btn-danger'>ELIMINAR</button></a></td></TR>
            <?php } ?>
            
            <script type="text/javascript">
                $(".eliminar").each(function() {
                    var href = $(this).attr('href');
                    $(this).attr('href', 'javascript:void(0)');
                    $(this).click(function() {
                        if (confirm("¿Seguro desea eliminar este registro?")) {
                            location.href = href;
                        }
                    });
                });
            </script>
        </table>
    <div class="text-right">
        <br>
        <i class="fa fa-arrow-circle-left"></i> BARTDirectory <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

</div>
</div>
</body>
</html>