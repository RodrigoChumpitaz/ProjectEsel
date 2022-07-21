<!DOCTYPE html>
<html lang="en">
<?php
 session_start();

?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Servicios</title>
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

	<!-- ------------------------------------------------------------------------------------------------ -->
	<section class="font_image-s3 p-5 mb-5 font_white-s3">
		<div class="container">
			<div class="row">
				<div class="col-md-8 text-white">
					<h2>Nuestros Servicios</h2>
					<p>Ofrecemos un completo espectro de servicios para ayudar a que las organizaciones funcionen mejor.
						Todo, desde la creación de normas de excelencia, hasta capacitar a su gente para trabajar de
						maneras más efectivas, evaluando cómo lo está haciendo y ayudándole a desempeñarse mejor en el
						futuro. </p>
					<a href="" class="btn stretched-link  mas" style="height:60px ;padding: 16px 32px;">Contactenos</a>
				</div>
			</div>
		</div>
	</section>

	<!-- ------------------------------------------------------------------------------------------------ -->

	<section class="text-large pt-4 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<img src="images/about.jpg" class="img-fluid mx-auto d-block" alt="">
				</div>
				<div class="col-md-6">
					<div>
						<h2>Ofrecemos una amplia gama de servicios y soluciones para distintas organizaciones.</h2>
						<p>- En ESEL INDUSTRIAL somos conscientes de la necesidad de mantener en condiciones adecuadas
							sus balanzas. Esta es la razón para poner a su disposición personal altamente calificado
							para solucionar estos problemas.<br>
							- Contamos con instalaciones propias para realizar mantenimiento preventivo y correctivo de
							cualquier balanza.<br>
							- Nuestros patrones trazables, certificados por INACAL, garantizan correcciones de acuerdo
							con las normas metrológicas.<br>
							- Nuestros técnicos pueden llegar a sus instalaciones en cualquier punto del país, en tiempo
							oportuno a su solicitud.<br>
							- Nuestro servicio técnico incluye repuestos originales para todas las aplicaciones de
							pesaje.
						</p>
						<div>
							<div class="sign">
								<img src="images/logito2.png" alt="">
							</div>
							<div>
								<h5><b>Elmer Carranza</b></h5>
								<span><b>ESEL INDUSTRIAL</b> </span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!--------------------------------------------------------------------------------------------------------------->
	<section class="yellow-section text-large p-4">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 d-flex align-items-center">
					<h2>Brindamos Servicios y Soluciones Integrales para la INDUSTRIA.</h2>
				</div>
				<div class="col-lg-3 text-lg-right">
					<a href="contactenos.html" class="btn-section p-3">Contactenos</a>
				</div>
			</div>
		</div>
	</section>



	<!------------------------------------------------------------------------------------------------------------- -->
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