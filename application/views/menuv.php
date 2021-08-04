<body>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <td colspan="8"align="center"><h2>Registros encontrados</h2></td>
                        </tr>
                        <th><b>CLAVE</th>
                        <th><b>PLATILLO</th>
                        <th><b>PRECIO</th>
                        <th><b>ACTIVO</th>
                        <th><b>TIPO</th>
                        <th colspan="2"><center><B><center>OPCIONES</B></th>
                        </TR>
                    </thead>
                    <?php foreach($resultado as $object){
	                    $idmepr=$object->idme;
	                    $platillo=$object->platillo;
	                    $precio=$object->precio;
	                    $activo=$object->activo;
	                    #$idd=$object->nombre;
	                    $tipo=$object->tipo;
                        echo "<tbody>
                                <tr>
                                    <td>$idmepr</td>
                                    <td>$platillo</td>
                                    <td>$precio</td>
                                    <td>$activo</td>
                                    <td>$tipo</td>"
                    ?>
                                    <td><center><a href="<?php echo base_url()?>menuc/edit_m/<?=$object->idme;?>"><button class='btn btn-warning'>MODIFICAR</button></a></td>
                                    <!-- Indicates a dangerous or potentially negative action -->
                                    <td><center><a class='eliminar' href="<?php echo base_url('menuc/eliminamenu')."?idme=$idmepr"?>"><button type='button' class='btn btn-danger'>ELIMINAR</button></a></td></TR>
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
                        </tbody>
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