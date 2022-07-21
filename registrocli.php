
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
						<a href="#" class="text-white"><i class="bi bi-person-circle"> </i></a>
					</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</header>

    <div class="container pt-5">
    <form action="service/registrocli.php" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nomusu" placeholder="Ingrese su nombre" id="nombre">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" name="apeusu" placeholder="Ingrese su apellido" id="apellido">
        </div>
        <div class="form-group">
            <label for="email">Correo:</label>
            <input type="email" class="form-control" name="emausu" placeholder="Ingrese su correo electronico" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <input type="password" class="form-control" name="pasusu" placeholder="Ingrese su contraseña" id="pwd">
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" class="form-control" name="estado" placeholder="Essss" id="est">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>

</body>
</html>