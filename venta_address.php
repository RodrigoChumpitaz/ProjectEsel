<?php
//  session_start();

?>

<?php
require'./service/cifrado.php';
require './service/database.php';
$db=new Database();
$con=$db->conectar();

$cod=isset($_GET['codpro']) ? $_GET['codpro'] : '';
$token=isset( $_GET['token']) ? $_GET['token'] : '';

if($cod=='' || $token== ''){
	echo 'Error al procesar la peticion';
	exit;
}else{
	$token_tmp=hash_hmac('sha1',$cod,KEY_TOKEN);

	if($token==$token_tmp){
		$sql=$con->prepare("SELECT count(codpro) FROM producto WHERE codpro=? AND estado=1");
		$sql->execute([$cod]);
		if($sql->fetchColumn() > 0){
			$sql=$con->prepare("SELECT codpro,nompro,prepro,despro,rutimapro FROM producto WHERE codpro=? AND estado=1 LIMIT 1");
			$sql->execute([$cod]);
			$row=$sql->fetch(PDO::FETCH_ASSOC);
			$nombre=$row['nompro'];
			$descripcion=$row['despro'];
			$img=$row['rutimapro'];
			$precio=$row['prepro'];
		}
	
	}else{
		echo 'Error al procesar la peticion';
	exit;
	}
}

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
					 <div class="mx-auto d-block contact-nav contact mt-2 " >
                            <a href="carrito_vista.php"  style="font-size: 16px;"  class="text-white">carrito
							<span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
							</a>
                    </div>
                    <div class="mx-auto d-block contact-nav contact mt-2">
                            <a href="pedido.php" style="font-size: 16px;" class="text-white"><i class="bi bi-basket"> </i>pedidos</a>
                </div>	
				</div>
				<div class="col-md-2">
		
				<button class="btn btn-form mb-3" type="button">
					<a class="nav-link text-white  letraNav" href="productos.php"><i class="bi bi-arrow-90deg-left"> </i></a>
					</button>
				
				
				</div>

			</div>
		</div>
	</header>

	<main>
		<div class="container">
			<div class="row">
				<div class="col-md-6 order-md-1 pt-3">
				<?php 
					$ruta="/images/productos/$img";

						if(!!file_exists($ruta)){
							$img="/images/productos/No-carga.jpg";
						}
					?>
					<img src="<?php echo $ruta; ?>" alt="" class="img-fluid" style="height: 530px;"> 
				</div>
				<div class="col-md-6 order-md-2 pt-3">
					<h2><?php echo $nombre ?></h2>
					<h2><?php echo MONEDA . number_format( $precio,2,'.',',')?></h2>
					<p class="lead">
						<?php echo $descripcion ?>
					</p>
					<div class="d-grid gap3 col10 mx-auto">
						<button type="button" class="btn btn-primary">Comprar ahora</button>
						<button type="button" class="btn btn-success" onclick="todos()">Agregar al carrito </button>
					</div> 
				</div>
			</div>
			
		</div>
	</main>


	<script>
		function todos(){
			 iniciar_compra();
			 addProduct(<?php echo $cod;?>,'<?php echo $token_tmp; ?>');
			
		}

		function addProduct(codpro,token){
			let url='/carrito.php'
			let formData=new FormData()
			formData.append('codpro',codpro)
			formData.append('token',token)

			fetch(url,{
				method:'POST',
				body:formData,
				mode:'cors'
			}).then ( response => response.json())
			.then(data=>{
				if(data.ok){
					let elemento =document.getElementById("num_cart")
					elemento.innerHTML=data.numero
				}
			})

		}

	function iniciar_compra(){
            $.ajax({
				url:'service/compras/validar_inicio_compra.php',
				type:'POST',
				
				success:function(data){
					console.log(data);
                    if(data.state){
                        alert(data.detail);
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
