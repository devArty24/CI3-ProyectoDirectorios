<html>
<body>
 <div id="wrapper">
 <div id="page-wrapper">

            <div class="container-fluid">
<center>

<h2>Registro de usuarios</h2><br>
<form action="agregaru" method="post">
<table>
<tr><td><b>Nombre Completo</b></td></tr>
<tr><td>Nombre(s)</td><td>Apellido Paterno</td><td>Apellido Materno</td></tr>
<tr><td> <input type="text"class="form-control"name="nombre"/></td><td> <input type="text"class="form-control"name="app"/></td><td> <input type="text"class="form-control"name="apm"/></td></tr>
<tr><td colspan="3"><b><?php echo form_error('nombre')?></b></td></tr>
<tr><td>Nombre de usuario</td></tr>
<tr><td> <input type="text"class="form-control"name="nomuser"/></td></tr>
<tr><td><b><?php echo form_error('nomuser')?></b></td></tr>
<tr><td>Password</td></tr>
<tr><td> <input type="password"class="form-control"name="pass"/></td></tr>
<tr><td><b><?php echo form_error('pass')?></b></td></tr>
<tr><td>correo</td></tr>
<tr><td> <input type="text"class="form-control"name="correo"/></td></tr>
<tr><td><b><?php echo form_error('correo')?></b></td></tr>
<tr><td>Activo</td></tr>
<tr><td><input type = 'radio' name = 'activo' value = 'Si' checked>Si
<input type = 'radio' name = 'activo' value = 'No'>No </td></tr>
<tr><td><?php echo form_submit('submit','Registrar','class="btn btn-default"');?>
<a href="<?php echo base_url();?>index.php/directorioc/muestradirectorio"><input type="button"class="btn btn-primary"value="Cancelar"></td></tr>

</form>
</table>
<br><br><br><br><br><br><br><br>
</body>