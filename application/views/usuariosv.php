<html>
<body>
<div class="table-responsive">
 <table class="table table-condensed">

<tr><td></td><td></td><td></td><td colspan="8"><h3>REGISTROS ENCONTRADOS</h3></td></tr>
<tr><td></td><td></td><td></td><td><b>CLAVE</td><td><b>NOMBRE</td><td><b>NOMBRE DE USUARIO</td><td><b>CONTRASEÑA</td><td><b>CORREO</td><td><b>ACTIVO</td><TD ><B><center>OPCIONES</TD></TR>
<?php
foreach($resultado as $object)
{
	$idupr=$object->idu;
	$nombre=$object->nombre;
	$app=$object->app;
	$apm=$object->apm;
	$nomuser=$object->nomuser;
	$pass=$object->pass;
	$correo=$object->correo;
	$activo=$object->activo;

	
echo "
<tr><td></td><td></td><td></td><td>$idupr</td><td>$nombre $app $apm</td><td>$nomuser</td><td type='password'>$pass</td><td>$correo</td><td>$activo</td>"?>
<td><a href="<?php echo base_url()?>index.php/usuariosc/edit/<?=$object->idu;?>"><button class='btn btn-warning'>Modificar</button></a></td>
<!-- Indicates a dangerous or potentially negative action -->
<td><a class='eliminar' href="<?php echo base_url('index.php/usuariosc/eliminausuario')."?idu=$idupr"?>"><button type='button' class='btn btn-danger'>ELIMINAR</button></a></td></TR>
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