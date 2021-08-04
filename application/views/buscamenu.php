<!DOCTYPE html>
<html lang="en">
<head> </head>
<body>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Búsqueda |<small> Menú</small></h1>
                    </div>
                </div>

				<div class="form-group">
                    <form action ='<?php echo base_url();?>menuc/cargamenu' method='POST' align='center'>
                        <input  name='criterio' type='text' class="form-control" placeholder="Escribe criterio de búsqueda"><br>
						<button type='submit' class="btn btn-primary">Buscar</button>
					</form>
                </div>
            </div>
		</div>
	</div>		
    <!-- /.container-fluid -->
</body>
</html>