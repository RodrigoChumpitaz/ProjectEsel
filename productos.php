
<?php
require './service/cifrado.php';
require './service/database.php';
$db=new Database();
$con=$db->conectar();

$sql=$con->prepare("SELECT codpro,nompro,prepro,rutimapro FROM producto WHERE estado=1");
$sql->execute();
$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

// session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

</head>

<body>
    <!--HEADER-->
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
                    if (isset($_SESSION['codusu'])) {

                        echo '
                        <div class="dropdown">
                        <button class="btn btn-dark mt-2 dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"> </i>' . $_SESSION['nomusu'] . '
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                      </div>
                        ';
                    } else {
                    ?>
                        <div class="mx-auto d-block contact-nav contact mt2">
                            <a href="login.php" class="text-white"><i class="bi bi-person-circle"> </i></a>
                        </div>

                    <?php
                    }
                    ?>
					
                    <div class="mx-auto d-block contact-nav contact mt-2 " >
                            <a href="carrito_vista.php"  style="font-size: 16px;"  class="text-white">carrito
							<i class="bi bi-cart4"> </i><span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
							</a>
                    </div>
                    <div class="mx-auto d-block contact-nav contact mt-2">
                        <a href="pago.php" style="font-size: 16px;" class="text-white"><i class="bi bi-basket"> </i>pedidos</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-md navbar-dark nav py-0 my-0 ">
        <button class="navbar-toggler mb-3" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-white siz letraNav" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white siz letraNav" href="productos.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white letraNav" href="servicios.php">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white letraNav" href="contactenos.php">Contactenos</a>
                </li>
            </ul>
        </div>
    </nav>

	<!-- ----------------------------------------------------------------------------------------------------------- -->
	<!-- PRODUCTOS -->

	<!-- <div class="container" >
		<div class="row" id="space_lista">

		</div>
	</div> -->


	<main>
	<div class="container">

		<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 pt-5 pb-5">
		<?php foreach ($resultado as $row) { ?>

			<div class="col">
				<div class="card shadow-sm">
					<?php 
					$rutima=$row['rutimapro'];
					$img="/images/productos/$rutima";

						if(!!file_exists($img)){
							$img="/images/productos/No-carga.jpg";
						}
					?>
					<img src="<?php echo $img; ?>" alt="" style="height: 370px;">
					<div class="card-body">
						<h5 class="card-title"><?php echo $row['nompro']; ?></h5>
						<p class="card-text">$<?php echo number_format( $row['prepro'],2,'.',','); ?></p>
						<div class="d-flex justify-content-between align-items-center">

						<div class="btn-group">
							<a href="venta_address.php?codpro=<?php echo $row['codpro'];?>&token=<?php echo 
							hash_hmac('sha1',$row['codpro'],KEY_TOKEN ); ?>" class="btn btn-primary">Detalles</a>
						</div>
							<button type="button" class="btn btn-success" onclick="addProduct(
								<?php echo $row['codpro']; ?>,'<?php echo hash_hmac('sha1',$row['codpro'],KEY_TOKEN ); ?>')">Agregar al carrito </button>

						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</main>

	<script>
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
	</script>


	<!-- ----------------------------------------------------------------------------------------------------------- -->
	<?php include('includes/footer.php')?>

	

</body>

</html>