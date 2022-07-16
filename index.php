<?php
 session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ESEL INDUSTRIAL SAC</title>
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

	<!--LOADER-->
	<div class="contenedor_loader carga">
		<div>
			<img src="images/Logito.png" class="hcarg" alt="">
		</div>
		<div class="loader">
		</div>
	</div>

	<!--HEADER-->
	<header class="header">
		<div class="container-fluid p-0">
			<div class="row">
				<div class="col-sm-3 text-left logo">
					<a class="navbar-brand m-0" href="#"><img src="images/Logito.png" class="logito" alt=""></a>
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
						<a href="#" class="text-white"><i class="bi bi-person-circle"> </i></a>
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


	<!--CAROUSEL-->
	<!------------------------------------------------------------------------------------->
	<div id="demo" class="carousel slide" data-ride="carousel">

		<!-- Indicators -->
		<ul class="carousel-indicators">
			<li data-target="#demo" data-slide-to="0" class="active"></li>
			<li data-target="#demo" data-slide-to="1"></li>
			<li data-target="#demo" data-slide-to="2"></li>
		</ul>

		<!-- The slideshow -->
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="images/carousel/imagen4.jpg" class="img-fluid" alt="">
			</div>
			<div class="carousel-item">
				<img src="images/carousel/imagen5.jpg" class="img-fluid" alt="">
			</div>
			<div class="carousel-item">
				<img src="images/carousel/imagen6.jpg" class="img-fluid" alt="">
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="carousel-control-prev" href="#demo" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		</a>
		<a class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>
	</div>
	<br><br>
	<!------------------------------------------------------------------------------------->

	<div class="container tarjetas mb-5">
		<div class="row py-3">
			<div class="col-md-4 ">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title titu"><i class="bi bi-gear"></i> Ingeniería</h4>
						<p class="card-text">Brindamos servicios en ingeniería básica e ingeniería de detalle para
							proyectos
							especiales de nuestros clientes. EXPLÍCANOS TU PROYECTO ¿Qué tipo de pesaje buscas?, ¿ m3 /
							hora?,
							¿Toneladas/hora ? ¿necesita automatizar su proceso? ¿Cuántas horas de producción?, </p>
					</div>
				</div><br>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title titu"><i class="bi bi-person-workspace"></i> Trabajo Profesional</h4>
						<p class="card-text">Amplia experiencia en soluciones de diverso tipo y en variados sectores
							industriales
							nos respaldan. Contamos con personal profesional capacitado en diversas áreas de la
							industria con lo que
							garantizamos servicio preventivo y correctivo de sus equipos e instalaciones.</p>
					</div>
				</div><br>
			</div>
			<div class="col-md-4 ">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title titu"><i class="bi bi-tree"></i> Medio Ambiente</h4>
						<p class="card-text">En ESEL INDUSTRIAL SAC somos cuidadosos de nuestro planeta, por eso
							implementamos
							jornadas de cuidado al medio ambiente en nuestras instalaciones y en los trabajos que
							desarrollamos en las
							instalaciones de nuestros clientes al ejecutarse las obras</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row py-3">
			<div class="col-md-4 ">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title titu"><i class="bi bi-award"></i> ESEL en la Industria</h4>
						<p class="card-text">Desde nuestro inicio, buscamos las mejores marcas del mundo para brindarle
							la solución
							perfecta a la necesidad del cliente.</p>
					</div>
				</div><br>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title titu"><i class="bi bi-kanban"></i> Proyectos & Ingenieria</h4>
						<p class="card-text">Pesaje sencillo. Pesaje complejo. Instalaciones metálicas. Instalaciones
							eléctricas.
						</p>
					</div>
				</div><br>
			</div>
			<div class="col-md-4 ">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title titu"><i class="bi bi-bezier"></i> Productos & Soluciones</h4>
						<p class="card-text">Consulte con nuestros profesionales, encontraremos lo que necesita y
							cumpliremos su
							necesidad</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="font_image font_white">
		<div class="container mt-5  p-5 mb-0 ">
			<div class="row ">
				<div class="col-md-4 ">
					<div class="card">
						<img src="images/industria/sideru.jpg" alt="">
						<div class="card-body">
							<h4 class="card-title">INDUSTRIA SIDERÚRGICA</h4>
							<p class="card-text">Some example text some example text. John Doe is an architect and
								engineer John Doe
								is an architect and engineer</p>
							<a href="#" class="btn stretched-link mas">Ver más</a>
						</div>
					</div><br>
				</div>
				<div class="col-md-4">
					<div class="card">
						<img src="images/industria/elect.jpg" alt="">
						<div class="card-body">
							<h4 class="card-title">ELECTRONICA</h4>
							<p class="card-text">Some example text some example text. John Doe is an architect and
								engineer John Doe
								is an architect and engineer </p>
							<a href="#" class="btn stretched-link mas">Ver más</a>
						</div>
					</div><br>
				</div>
				<div class="col-md-4 ">
					<div class="card">
						<img src="images/industria/horm.jpg" alt="">
						<div class="card-body">
							<h4 class="card-title">INDUSTRIA HORMIGÓN</h4>
							<p class="card-text">Some example text some example text. John Doe is an architect and
								engineer john Doe
								is an architect and engineer</p>
							<a href="#" class="btn stretched-link mas">Ver más</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><br>
	<!-- ------------------------------------------------------------------------------------------------------ -->
	<div class="container my-4">
		<h2 class="text-large">
			Empresas y aliados que producen o suministran bienes, servicios o fuentes de ingresos.
		</h2><br>
		<p class="text-large">
			Innumerables empresas han confiado en nosotros. Resolvemos las necesidades puntuales de cada una optimizando
			los
			recursos y respondiendo en forma inmediata. Es para nosotros un motivo de orgullo alcanzar los resultados
			propuestos con cada uno de nuestros clientes. Lo anterior demuestra que nuestro esfuerzo por ofrecerles lo
			mejor
			de nuestra calidad, arroja los resultados esperados, y nos motiva a seguir implementando procesos de alto
			nivel,
			haciendo énfasis en el servicio y agregando valor entre quienes deciden confiar en nosotros.
		</p>
	</div>
	<div class="container">
		<div class="row mx-auto">
			<div class="col-md-4 w-100">
				<img src="images/sm/hbm.png" alt="" style="display: block;
            margin: 0px auto;padding-bottom: 15px;">
			</div>
			<div class="col-md-4 w-100">
				<img src="images/sm/cardinal.png" alt="" style="display: block;
            margin: 0px auto;padding-bottom: 15px;">
			</div>
			<div class="col-md-4 w-100">
				<img src="images/sm/sipel.png" alt="" style="display: block;
            margin: 0px auto;padding-bottom: 15px;">
			</div>
		</div>
	</div><br>

	<!-- --------------------------------------------------------------------------------------------------------------- -->

	<div class="container-fluid font-warranty mt-5  p-5 mb-0">
		<div class="row mx-auto">
			<div class="col-md-6 ">
				<img src="images/sello-satisfaccion.png " class="img-fluid mx-auto d-block">
			</div>
			<div class="col-md-6  mx-auto">
				<h1 class="text-large2 ">Garantia de Satisfaccion</h1>
				<p class="text-large3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error eligendi nihil,
					ipsum
					tempore,
					quis quisquam ratione unde porro, voluptatum velit consequatur delectus odio autem maiores assumenda
					placeat
					dicta quae hic.
					Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae animi nulla corrupti, quam libero non
					similique
					veritatis magnam totam
					numquam odio aliquid, dignissimos rerum, modi recusandae. Maxime asperiores aliquid esse.
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo numquam omnis itaque corrupti,
					inventore odit
					delectus! Enim laborum
					tempora corrupti quae, nesciunt rem dolorem nemo minus accusamus esse cumque modi.
				</p>
			</div>
		</div>
	</div><br>
	<div class="container-fluid  mt-5 p-0 mb-5">
		<div class="row mx-auto">
			<div class="col-md-6 ">
				<h1 class="text-large ">Mas de 20 años presente en la industria</h1>
				<div style="text-align: center;">
					<a href="#" class="btn stretched-link mas"
						style="width: 200px;height:60px;padding: 16px 32px;">Contactenos</a>
				</div><br>
			</div>
			<div class="col-md-6 mb-0 p-0  mx-auto">
				<iframe
					src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Fesel642020%2Fvideos%2F1253312854776570%2F&show_text=false&width=560&t=0"
					width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
					allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; 
          web-share" allowFullScreen="true" class="container-fluid mx-auto d-block "></iframe>
			</div>
		</div>
	</div>
	<!-- ----------------------------- -->
	<div class="container my-4">
		<h2 class="text-large">
			Nuestra empresa es una de las mejores y nuestros clientes lo confirman
		</h2><br>
		<p class="text-large">
			La credibilidad es como el respeto, ¡se gana! Y para ganar la credibilidad de tus clientes es necesario
			establecer
			las bases de la confianza. Recuerda que la construcción de una reputación sólida requiere consistencia.
		</p>
	</div>
	<div class="container">
		<div class="row mx-auto">
			<div class="col-md-4 w-100">
				<img src="images/sm/hbm.png" alt="" style="display: block;
        margin: 0px auto;padding-bottom: 15px;">
			</div>
			<div class="col-md-4 w-100">
				<img src="images/sm/cardinal.png" alt="" style="display: block;
        margin: 0px auto;padding-bottom: 15px;">
			</div>
			<div class="col-md-4 w-100">
				<img src="images/sm/sipel.png" alt="" style="display: block;
        margin: 0px auto;padding-bottom: 15px;">
			</div>
		</div>
	</div><br>

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