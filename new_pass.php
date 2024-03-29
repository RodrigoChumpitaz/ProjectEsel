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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
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
					if (isset($_SESSION['codusu'])) {

						echo '<a href="#" class="text-white"><i class="bi bi-person-circle"> </i>' . $_SESSION['nomusu'] . '</a>';
					} else {
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

	<div class="container my-5 p-3">
		<div class=" col-sm-8 col-lg-6 col-md-7  mx-auto">
			<div class="card bg-dark text-white shadow">
				<div class="card-body">
					<form action="service/new_pass.php" method="POST">
						<div class="form-group">
							<label for="email">Correo:</label>
							<input type="email" class="form-control" name="emausu" placeholder="Enter email" id="email">
						</div>
						<button type="submit" class="btn btn-primary my-3">Enviar Nueva Contraseña al correo</button>
					</form>
				</div>
			</div>
		</div>
	</div>


	?>
</body>

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</html>