<body>
<div class="table-responsive">
 <table class="table table-bordered table-hover table-striped">
 <thead>
<tr><td colspan="11"align="center"><h3>REGISTROS ENCONTRADOS</h3></td></tr>
<tr><th><b>CLAVE</th><th><b>NOMBRE</th><th><b>TELEFONO</th><th><b>HORARIO</th><th><b>RESEÑA</th><th><b>REDES SOCIALES</th><th><b>MUNICIPIO</th><th><b>CATEGORIA</th><th><b>DIRECCION</th><th><b>ESTATUS</th><th><b>IMAGEN</th><th colspan="2"><center><b>OPCIONES</center></th></tr></thead>
<?php
foreach($resultado as $object)
{
	$iddpr=$object->idd;
	$nombre=$object->nombre;
	$telefono=$object->telefono;
	$horario=$object->horario;
	$resena=$object->resena;
	$redsocial=$object->redsocial;
	$idm=$object->lugar;
	$calle=$object->calle;
	$numero=$object->numero;
	$cp=$object->cp;
	$activo=$object->activo;
	$categoria=$object->categoria;
	$nombrei=$object->nombrei;
	
echo "
<tr><td>$iddpr</td><td>$nombre</td><td>$telefono</td><td>$horario</td><td>$resena</td><td>$redsocial </td><td>$idm </td><td>$categoria </td><td>$calle,$numero,$cp</td><td>$activo</td>"?>
<td><img src="<?php echo base_url();?>img/<?php echo $nombrei;?> " width="50" ></td>
<td><a href="<?php echo base_url()?>index.php/directorioc/edit_d/<?=$object->idd;?>"><button class='btn btn-warning'>Modificar</button></a></td>
<td><a class='eliminar' href="<?php echo base_url('index.php/directorioc/eliminadirectorio')."?idd=$iddpr"?>"><button type='button' class='btn btn-danger'>ELIMINAR</button></a></td></tr>
<?php
}
?>
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
<div class="text-right"><br>
                                   <i class="fa fa-arrow-circle-left"></i> BARTDirectory <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
								</div>
</div>
</div>
</body>
</html>