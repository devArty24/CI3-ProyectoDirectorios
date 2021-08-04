      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Ejemplo de Subir IMG</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		<p>
          			<h1>IMG Salvada</h1>
          			<?php $file_name = $upload_data['file_name']; ?>

          			<img src="<?php echo base_url(); ?>img/<?php echo $file_name; ?>" width='200'><br>

          			<hr>

          			<h4><i class="fa fa-angle-right"></i> Datos de la variable $upload_data </h4>
	                <hr>
	                <table class="table">
	                <thead>
		                <tr>
		                	<th>Variable</th>
		                	<th>Contenido</th>
		                </tr>
	            	</thead>
						<?php foreach ($upload_data as $item => $value):?>
							<tbody>
								<tr>
									<td><?php echo $item;?></td>
									<td><?php echo $value;?></td>
								</tr>
							</tbody>
						<?php endforeach; ?>
					</table>

					<hr>

					<a href='<?php echo base_url(); ?>index.php/directorioc/img'>
						<button type="button" class="btn btn-primary btn-lg btn-block">Subir otra Imagen</button>
					</a>


              </p>
          		</div>
          	</div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
