<?php
 session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <div class="container p-5 mt-5" >
		<div class="row d-flex align-items-center justify-content-around flex-column-md">
            <div class="col-md-5 mb-3 mb-lg-0">
                <img id="idimg" class="img-fluid shadow" src="images/productos/1.jpg" alt="">
            </div>
            <div class="col-md-6">
				<div class="card my-lg-0 shadow my-sm-3" style="max-width: 100%;">
					<div class="card-body text-center p-2 p-md-3 p-lg-4">
						<img src="images/industria/industry_image.svg" class="img-fluid " alt="">
						<div class="card-header text-center bg-white py-4"><img src="images/Logito.png" class="img-fluid" alt=""></div>
						<h2 id="idtitle">NOMBRE PRINCIPAL</h2>
						<h1 class="text-warning " id="idprice">S/. 35.<span>99</span></h1>
						<p class="card-text" id="iddescription">Descripcion del producto</p>
						<div class="d-flex align-items-center justify-content-center">
							<button class="btn btn-secondary btn-lg"  onclick="iniciar_compra()" type="button">Comprar</button>
						</div>
					</div>
				</div>
            </div>
		</div>
	
	</div>
   

    <script type="text/javascript">
		var p='<?php echo $_GET["p"]; ?>';
	</script>

<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url:'service/producto/getProductos.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					for (var i = 0; i < data.datos.length; i++) {
						if (data.datos[i].codpro==p) {
							document.getElementById("idimg").src="images/productos/"+data.datos[i].rutimapro;
							document.getElementById("idtitle").innerHTML=data.datos[i].nompro;
							document.getElementById("idprice").innerHTML=formato_precio(data.datos[i].prepro);
							document.getElementById("iddescription").innerHTML=data.datos[i].despro;
						}
					}
				},
				error:function(err){
					console.error(err);
				}
			});
		});
		function formato_precio(valor){
			//10.99
			let svalor=valor.toString();
			let array=svalor.split(".");
			return "S/. "+array[0]+".<span>"+array[1]+"</span>";
		}
        function iniciar_compra(){
            $.ajax({
				url:'service/compras/validar_inicio_compra.php',
				type:'POST',
				data:{
                    codpro:p
                },
				success:function(data){
					console.log(data);
                    if(data.state){
                        
                    }else{
                        alert(data.detail);
                        if(data.open_login){
                            open_login();
                        }
                        
                    }
				},
				error:function(err){
					console.error(err);
				}
			});
        }
        function open_login(){
            window.location.href="login.php"
        }
		
		
	</script>
    </body>
</html>
