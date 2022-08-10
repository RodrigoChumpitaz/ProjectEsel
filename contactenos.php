
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contactenos</title>
	<!-- CSS only -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
	<link rel="stylesheet" href="css/styles.css">
</head>

<body>

	
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

	<!------------------------------------------------------------------------------------------------------------------->
	<section class="font_image-s5 p-5 font_white-s3">
		<div class="container">
			<div class="row">
				<div class="col-md-8 text-white">
					<h2>Contactenos</h2>
					<p>Usted puede ponerse en contacto con nosotros, visitándonos, llamándonos, enviándonos un e-mail, o
						a través de las redes sociales. Estaremos gustosos de atenderlo.</p>
					<a href="#form" class="btn stretched-link  mas" style="height:60px ;padding: 16px 32px;">Escribenos</a>
				</div>
			</div>
		</div>
	</section>

	<!------------------------------------------------------------------------------------------------------------------->
	<div class="container-fluid p-0 position-relative">
		<div class="embed-responsive embed-responsive-16by9">
			<iframe
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.451082528506!2d-77.0047453!3d-12.0124356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c58bf64f0a25%3A0xfca58f84752122a3!2sESEL%20INDUSTRIAL%20SAC!5e0!3m2!1ses!2spe!4v1657644039443!5m2!1ses!2spe"
				class="embed-responsive-item" style="border:0;" allowfullscreen="" loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		<div class="map-info text-large">
			<p>En Esel Industrial nos dedicamos a la fabricación, importación y comercialización de productos que
				brindan soluciones efectivas y económicas, en los campos de agricultura, minería, construcción entre
				otros.</p>
		</div>
	</div>


	<!------------------------------------------------------------------------------------------------------------------->
	<section id="form" class="my-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="text-large">
						<h2>Pongáse en contacto</h2>
						<p>Estaremos encantados de ayudarle a resolver sus dudas respecto a los productos y servicios de
							Esel Industrial, por favor contáctese con nosotros, a través de estos canales:</p>
						<div class="m-10 text-left">
							<i class="bi bi-person-lines-fill" style="font-size: 30px;color: black;">
							</i>
							<div style="text-align: justify">
								<p class="m-0">01-994191411</p>
								<p>ventas@eselindustrial.com</p>
							</div>
						</div>
						<div class="m-10 text-left">
							<i class="bi bi-geo-alt-fill" style="font-size: 30px;color: black;">
							</i>
							<div style="text-align: justify">
								<p> Calle Los Arandanos Manzana N lote 19</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<form method="post" class="contact-form" action="mail.php">

						<!-- ALERTA -->
						<div class="row">
							<div class="col-12">
								<div class="alert alert-success contact__msg" style="display: none" role="alert">
									Tu mensaje fue enviado exitosamente.
								</div>
							</div>
						</div>
						<!-- ENTRADA DE DATOS -->
						<div class="row">
							<div class="col-lg-6">
								<input class="p-3" id="empresa" type="text" placeholder="Telefono" required="">
							</div>
							<div class="col-lg-6">
								<input class="p-3" name="ruc" id="ruc" class="form-control" type="text" placeholder="RUC"
									required="">
							</div>
							<div class="col-lg-6">
								<input class="p-3" id="persona_contacto" type="text" placeholder="Persona Contacto" required="">
							</div>
							<div class="col-lg-6">
								<input class="p-3" id="email" type="text" placeholder=" Email" required="">
							</div>
							<div class="col-lg-12">
								<input class="p-3" id="motivo" type="text" placeholder="Motivo" required="">
								<textarea class="p-3" id="mensaje" class="text-msg" placeholder="Mensaje" required=""></textarea>
								<button onclick="" class="btn-form p-3" type="button">Enviar
									Mensaje</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>





	<!-- ----------------------------------------------------------------------------------------------------------- -->
	<div class=" jumbotron-fluid px-4 footer">
		<footer class="page-footer font-small indigo">

			<div class="row">
				<div class="col-md-3 mx-auto">
					<h5 class="font-weight-bold text-uppercase mt-3 mb-4 p1-title">ESEL INDUSTRIAL</h5>
					<p class="p1">Nos especializamos en Automatización y Control Industrial, Optimización de procesos,
						Administración de Potencia y Energía, Control Inteligente de motores, Soluciones de Información,
						Soluciones de Ingeniería, y su respectivo soporte técnico.</p>
					<div style="font-size: 30px;color: white;">
						<a class="fb-ic text-primary" href="https://es-la.facebook.com/esel642020/" target="_blank"><i
								class="bi bi-facebook"></i></a>
						<a class="ws-ic text-success" href="https://wa.me/51994191411" target="_blank"><i
								class="bi bi-whatsapp"></i></a>
					</div>
				</div>
				<hr class="clearfix w-100 d-md-none">
				<div class="col-md-3 mx-auto">
					<h5 class="font-weight-bold text-uppercase mt-3 mb-4 p1-title">Servicio Técnico</h5>
					<p class="p1">Soporte técnico presencial o remoto. Si solicita soporte técnico presencial, los
						brindamos en
						cualquier punto del país. Equipo de técnicos con dedicación exclusiva a viajar 24/7</p>
				</div>
				<hr class="clearfix w-100 d-md-none">
				<div class="col-md-3 mx-auto">
					<h5 class="font-weight-bold text-uppercase mt-3 mb-4 p1-title">Nuestras Soluciones</h5>
					<p class="p1">Industria, Metalúrgica, Agricultura, Pesquería, Ganadería, Electrónica y mas..</p>
				</div>
				<hr class="clearfix w-100 d-md-none">
				<div class="col-md-3 mx-auto">
					<div>
						<h5 class="font-weight-bold text-uppercase mt-3 mb-4 p1-title">Contactenos</h5>
						<a class="nav-link p-0" href="https://goo.gl/maps/7xxZpnWtRXw1RCft5" target="_blank"><i
								class="bi bi-geo-alt-fill" style="font-size: 30px;color: white;">
								<p class="p1" style="display:inline;font-size: 22px;">Ubicacion</p>
							</i>
						</a>
						<div class="p1" style="text-align: justify">
							<p> Calle Los Arandanos Manzana N lote 19</p>
						</div>
					</div>
					<div>
						<i class="bi bi-person-lines-fill" style="font-size: 30px;color: white;">
							<p class="p1" style="display:inline;font-size: 22px;">Lineas</p>
						</i>
						<div class="p1" style="text-align: justify ">
							<p class="m-0">01-994191411</p>
							<p>ventas@eselindustrial.com</p>
						</div>
					</div>
				</div>
			</div>

			<div class="footer-copyright text-center py-2 text-white">© 2022 Copyright:
				<a href="/" class="text-white"> Idatinos.pe</a>
			</div>
		</footer>
	</div>
	<a href="https://wa.me/51994191411" target="_blank">
		<div class="nuevo"> <img src="images/ws.gif" class="ws" alt=""></i>ESEL INDUSTRIAL SAC</div>
		<div class="nuevo-min"> <img src="images/ws.gif" class="ws-min" alt=""></div>
	</a>


	<script src="js/script.js"></script>

</body>

</html>