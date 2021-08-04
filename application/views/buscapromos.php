<body>
	<div id="wrapper">
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Búsqueda |<small> Promociones</small>
                        </h1>
                    </div>
                </div>
				<div class="form-group">
					<!-- Send AJAX -->
					<form name='frmcrit' id='frmcrit' method='POST' align='center'>
						<input  name='criterio' id='criterio' type='text' class="form-control" placeholder="Escribe criterio de búsqueda"><br>
						<button type='submit' class="btn btn-primary">Buscar</button>
					</form>
				</div>
				<div class="col-sm-12">
					<div id="table-search">
					</div>
				</div>
    		</center>
</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script>
		$(document).ready(function(){
			$("#frmcrit").submit(function(e){
				e.preventDefault();
				load1(1);
			});
			load1(1);
		});
	
		function load1(page){
			var formData = new FormData(document.getElementById("frmcrit"));
			
			/*formData.append("action","ajax");
			formData.append("page",page);*/
			
			$.ajax({
				url:('<?=base_url()?>Promocionesc/cargapromos'),
				type:"POST",
				dataType:"html",
				data: formData,
				cache: false,
				contentType:false,
				processData: false,
				success:function(data){
					console.log(data);
					$("#table-search").html(data).fadeIn('slow');
				},
				error:function(error){
					console.log(error);
				}
			})
		}
  	</script>
</html>
