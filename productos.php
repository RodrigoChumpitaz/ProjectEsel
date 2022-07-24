<?php
 session_start();

?>

	<?php include('includes/header.php') ?>

	<!-- ----------------------------------------------------------------------------------------------------------- -->
	<!-- PRODUCTOS -->





	<div class="container" >
		<div class="row" id="space_lista">

		</div>
	</div>

	<!-- ----------------------------------------------------------------------------------------------------------- -->
	<?php include('includes/footer.php')?>

	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url:'service/producto/getProductos.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					for(var i=0; i<data.datos.length; i++){
						html+=
						'<div class="col-10 col-md-3 py-5 mx-auto mx-md-0">'+
							'<a href="venta_address.php?p='+data.datos[i].codpro+'" class="text-decoration-none text-dark btn btn-outline-secondary border-0 p-1">'+
							'<div class="card border-0 shadow" >'+
								'<img class="card-img-top img-fluid" src="images/productos/'+data.datos[i].rutimapro+'" >'+
								'<div class="card-body">'+
									'<h4 class="card-title">'+data.datos[i].nompro+'</h4>'+
									'<p class="card-text">'+data.datos[i].despro+'</p>'+
									'<p class="card-text">'+formato_precio(data.datos[i].prepro)+'</p>'+
								'</div>'+
							'</div>'+
							'</a>'+
						'</div>';
					}
					document.getElementById("space_lista").innerHTML=html;
				},
				error:function(err){
					console.log(err)
				},
			});
		});
		function formato_precio(valor){
			let svalor=valor.toString();
			let array=svalor.split(".");
			return "s/. "+array[0]+".<span>"+array[1]+"</span>"
		}
	</script>

</body>

</html>