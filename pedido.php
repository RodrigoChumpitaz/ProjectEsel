<?php
 session_start();
 if (!isset($_SESSION['codusu'])) {
     header('location: index.php');
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
	<link rel="stylesheet" href="css/styles.css">
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

	<header class="header">
		<div class="container-fluid p-0">
			<div class="row">
				<div class="col-sm-3 text-left logo">
					<a class="navbar-brand m-0" href="index.php"><img src="images/Logito.png" class="logito" alt=""></a>
				</div>
				<div class="col-sm-6 text-center align-self-center contacto">
					<div class="mx-auto d-block contact-nav contact">
						<a href="tel:+5101994191411" class="text-white"><i class="bi bi-telephone"> </i>01-994191411</a>
						<div style="margin-top:10px ;margin-bottom: 8px;">
							<a href="mailto:ventas@eselindustrial.com" class="text-white"><i class="bi bi-envelope">
								</i>Correo para
								ventas</a>
						</div>
					</div>
				</div>
				<div class="col-sm-3 text-right align-self-center ingreso">
					<?php
					if (isset($_SESSION['codusu'])){
					
						echo '<a href="#" class="text-white"><i class="bi bi-person-circle"> </i>'.$_SESSION['nomusu'].'</a>';
					}else{
					?>
					<div class="mx-auto d-block contact-nav contact">
						<a href="login.php" class="text-white"><i class="bi bi-person-circle"> </i></a>
					</div>
					<?php
					}
					?>
					   <div class="mx-auto d-block contact-nav contact mt-2 " >
                            <a href="carrito.php"  style="font-size: 16px;"  class="text-white"><i class="bi bi-cart4"> </i>carrito</a>
                    </div>
				</div>
				<div class="col-md-2">
		
				<button class="btn btn-form mb-3" type="button">
					<a class="nav-link text-white siz letraNav" href="productos.php"><i class="bi bi-arrow-90deg-left"> </i>Productos</a>
					</button>
				
				</div>
			</div>
		</div>
	</header>

    <div class="container p-5" >
		<div class="row" >
			<div class="col-md-8 " >
				<h3>Mis pedidos</h3>
				<div id="space_lista"></div>
			</div>
			<div class="col-md-4 card card-body " style="border-radius: 10px;box-shadow: 10px 3px 10px  gray;" >
				<div class="form-group">
					<label for="">Monto Total:</label>
					<div id="montototal"></div>
				</div>
				<div class="form-group">
					<label for="">Banco: BCP</label>
					<div></div>
				</div>
				<div class="form-group">
					<label for="">Numero de cuenta:9827372973213</label>
					<div></div>
				</div>
				<div class="form-group">
					<label for="">Representante:Jose Aguilar mamani</label>
					<div></div>
				</div>
				<div class="form-group card minicard" >
					<b><div>Si en caso no compro con tarjeta de credito o debito: </b>
						Para Concretar la venta comunicarse al wsp de la empresa <a href="" style="color: white;">98989898</a> o al correo <a href="" style="color: white;">Esel@gmail.com</a>
				</div>
			</div>
		</div>
    </div>
		

    
    <script type="text/javascript">
        $(document).ready(function(){
			$.ajax({
				url:'service/pedido/getProcesados.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					let monto=0;
					for(var i=0; i<data.datos.length; i++){
						html+=
                        '  <div class="media card-product " style="border-radius: 10px; ">'+
                                '<img src="images/productos/'+data.datos[i].rutimapro+'" class="mr-3 mt-3 " style="width:150px;">'+
                                '<div class="text-white" style="font-size: 17px;">'+
                                    '<h4>'+data.datos[i].nompro+'</h4>'+
									'<p>codigo: '+data.datos[i].codped+'</p>'+
                                    '<p>Precio: '+'S/.'+data.datos[i].prepro+'</p>'+
                                    '<p>Fecha: '+data.datos[i].fecped+'</p>'+
                                    '<p>Estado: '+data.datos[i].estadotext+'</p>'+
									'<p>Cantidad: '+data.datos[i].cantidadp+'</p>'+
                                    '<p>Direccion: '+data.datos[i].dirusuped+'</p>'+
                                    '<p>Celular: '+data.datos[i].telusuped+'</p>'+
                                '</div>'+
                            '</div>'+
                            '<br/>';
							if(data.datos[i].estado=="2" || data.datos[i].estado=="3"){
								monto+=parseFloat(data.datos[i].prepro*data.datos[i].cantidadp);
							}
						
					}
					document.getElementById("montototal").innerHTML=monto;
					document.getElementById("space_lista").innerHTML=html;
				},
				error:function(err){
					console.log(err)
				},
			});
		});
	</script>
    </body>
</html>
