<html>
<body>
<div align=center>
<table border=1>
<p>Los productos son: </p>
<tr><td>Clave</td><td>Nombre</td><td>Cantidad</td><td>Costo</td><td>Total</td></tr>
<?php
#SE DECLARA LA VARIABLE TOTAL=0
$total=0;
foreach($resultado as $object)
{
	$cvepr= $object->cve;
	$nombrep = $object->nombre;
	$cantp = $object->cant;
	$costop = $object->costo;
	$totalp = $object->total;
	
	$subt= $costop*$cantp;
	$total= $total+$subt;
	
echo "<tr><td>$cvepr</td><td>$nombrep</td><td>$cantp</td><td>$costop</td><td>$totalp</td></tr>";
}
echo "<tr><td colspan=4>Total</td><td>$total</td></tr>";
?>
</table>
</div>
</body>
</html>
