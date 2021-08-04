<body>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <td colspan="7"align="center"><h3>REGISTROS ENCONTRADOS</h3></td>
            </tr>
            <tr>
                <td><b>CLAVE</td><td><b>SERVICIO</td><td><b>ACTIVO</b></td><td colspan="2"><CENTER><B>OPCIONES</td>
            </tr>
            <?php foreach($resultado as $object){
	            $idspr=$object->ids;
	            $servicio=$object->servicio;
	            #$idd=$object->nombre;
	            $activo=$object->activo;

            echo "<tr>
                    <td>$idspr</td>
                    <td>$servicio</td>
                    <td>$activo</td>"?>
            <td><center><a href="<?php echo base_url()?>serviciosc/edit_s/<?=$object->ids;?>"><button class='btn btn-warning'>MODIFICAR</button></a>
            <!-- Indicates a dangerous or potentially negative action -->
            <td><center><a class='eliminar' href="<?php echo base_url('serviciosc/eliminaservicio')."?ids=$idspr"?>"><button type='button' class='btn btn-danger'>ELIMINAR</button></a></td></TR>
            <?php } ?>
            
            <script type="text/javascript">
                $(".eliminar").each(function() {
                    var href = $(this).attr('href');
                    $(this).attr('href', 'javascript:void(0)');
                    $(this).click(function(){
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
