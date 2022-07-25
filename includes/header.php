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

                        echo '<a href="#" class="text-white"><i class="bi bi-person-circle"> </i>' . $_SESSION['nomusu'] . '</a>';
                    } else {
                    ?>
                        <div class="mx-auto d-block contact-nav contact">
                            <a href="login.php" class="text-white"><i class="bi bi-person-circle"> </i></a>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="mx-auto d-block contact-nav contact ">
                            <a href="carrito.php" class="text-white"><i class="bi bi-cart4"> </i></a>
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