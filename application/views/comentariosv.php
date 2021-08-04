<body>
<div class="table-responsive">
 <table class="table table-bordered table-hover table-striped">
 <tr><td colspan="8"align="center"><h2>REGISTROS ENCONTRADOS</h2></td></tr>
<tr><td><b>CLAVE</td><td><b>COMENTARIO</td><td><b>ACTIVO</td><td colspan="2"><CENTER><B>OPCIONES</TD></TR>
<?php
foreach($resultado as $object)
{
	$idcopr=$object->idco;
	$comentario=$object->comentario;
	#$idd=$object->nombre;
	$activo=$object->activo;
	
echo "
<tr><td>$idcopr</td><td>$comentario</td><td>$activo</td>"?>
<td><center><a href="<?php echo base_url()?>index.php/comentariosc/edit_co/<?=$object->idco;?>"><button class='btn btn-warning'>MODIFICAR</button></a></td>
<td><center><a class='eliminar' href="<?php echo base_url('index.php/comentariosc/eliminacomentarios')."?idco=$idcopr"?>"><button type='button' class='btn btn-danger'>ELIMINAR</button></a></td></TR>
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