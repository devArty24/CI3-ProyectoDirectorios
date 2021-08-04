<div class="table-responsive">
 	<table class="table table-bordered table-hover table-striped">
		<tr>
			<td colspan="8"align="center"><h2>REGISTROS ENCONTRADOS</h2></td>
		</tr>
		<tr>
			<td><b>CLAVE</td><td><b>PROMOCION</td><td><b>VIGENCIA</td><td><b>ACTIVO</td><td colspan="2"><CENTER><B>OPCIONES</td>
		</tr>
		<?php foreach($resultado as $object){
		$idppr=$object->idp;
		$descripcion=$object->descripcion;
		$vigencia=$object->vigencia;
		#$idd=$object->nombre;
		$activo=$object->activo;
		echo "<tr>
			<td>$idppr</td>
			<td>$descripcion</td>
			<td>$vigencia</td>
			<td>$activo</td>"
		?>
			<td><center>
				<a href="<?php echo base_url()?>promocionesc/edit_p/<?=$object->idp;?>"><button class='btn btn-warning'>MODIFICAR</button></a>
			</td>
			<!-- Indicates a dangerous or potentially negative action -->
			<td><center>
				<a class='eliminar' href="<?php echo base_url('promocionesc/eliminapromo')."?idp=$idppr"?>"><button type='button' class='btn btn-danger'>ELIMINAR</button></a>
			</td>
		</tr>
		<?php } ?>
		
		<script type="text/javascript">
    		$(".eliminar").each(function(){
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
</html>