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
				</div>
				<div class="col-md-2">
		
					<button class="btn btn-primary" type="button">
					<a class="nav-link text-white siz letraNav" href="productos.php">Productos</a>
					</button>
				
				</div>
			</div>
		</div>
	</header>

    <div class="container p-5" >
        <div class="container ">
                    <div id="space_lista"></div>
        </div>
        <div class="form-group">
        <input type="email" id="dirusu" class="form-control" placeholder="Ingrese Direccion para el envio" id="email">
        </div>
        <div class="form-group">
        <input type="email" id="telusu" class="form-control" placeholder="Ingrese su telefono o celular" id="email">
        </div>
        <button onclick="procesarcompra()" class="btn btn-primary" type="button">Comprar</button>
	</div>
    
    <script type="text/javascript">
        $(document).ready(function(){
			$.ajax({
				url:'service/pedido/getPedidos.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					for(var i=0; i<data.datos.length; i++){
						html+=
                        '  <div class="media card-product " style="border-radius: 10px;">'+
                                '<img src="images/productos/'+data.datos[i].rutimapro+'" class="mr-3 mt-3 " style="width:150px;">'+
                                '<div class="text-white" style="font-size: 17px;">'+
                                    '<h4>'+data.datos[i].nompro+'</h4>'+
                                    '<p>Precio:'+data.datos[i].prepro+'</p>'+
                                    '<p>Fecha:'+data.datos[i].fecped+'</p>'+
                                    '<p>Estado:'+data.datos[i].estado+'</p>'+
                                    '<p>Direccion'+data.datos[i].dirusuped+'</p>'+
                                    '<p>Celular'+data.datos[i].telusuped+'</p>'+
                                '</div>'+
                            '</div>'+
                            '<br/>';
					}
					document.getElementById("space_lista").innerHTML=html;
				},
				error:function(err){
					console.log(err)
				},
			});
		});
        function procesarcompra(){
            let dirusu=document.getElementById("dirusu").value;
            let telusu=$("#telusu").val();

            if(dirusu=="" || telusu==""){
                alert("Complete los campos");
            }else{
                $.ajax({
				url:'service/pedido/confirmar.php',
				type:'POST',
				data:{
                    dirusu:dirusu,
                    telusu:telusu
                },
				success:function(data){
					console.log(data);
                    if(data.state){
                        window.location.href="pedido.php"
                    }else{
						alert(data.detail);
					}
				},
				error:function(err){
					console.log(err)
				},
			});

            }
        }
		
	</script>
    </body>
</html>
