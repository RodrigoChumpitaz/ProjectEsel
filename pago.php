<?php
//  session_start();

?>
<?php
require './service/cifrado.php';
require './service/database.php';
$db=new Database();
$con=$db->conectar();

$productos=isset($_SESSION['carrito']['producto']) ? $_SESSION['carrito']['producto']: null;

$lista_carrito=array();

if($productos!=null){
    foreach($productos as $clave=> $cantidad){
        $sql=$con->prepare("SELECT codpro,nompro,prepro,rutimapro,$cantidad as cantidad FROM producto WHERE 
        codpro=? AND estado=1");
        $sql->execute([$clave]);
        $lista_carrito[]=$sql->fetch(PDO::FETCH_ASSOC);
    }
}else{
    header("Location:productos.php");
    exit;
}

// print_r($_SESSION);



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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

    

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
							<span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
							</a>
                    </div>
                    <div class="mx-auto d-block contact-nav contact mt-2">
                        <a href="pedido.php" style="font-size: 16px;" class="text-white"><i class="bi bi-basket"> </i>pedidos</a>
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
            <div class="row">
            
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($lista_carrito==null){
                                    echo '<tr><td colspan="5" class="text-center"><b>Lista Vacia</b></td></tr>';
                                } else{
                                    $total=0;
                                    foreach($lista_carrito as $producto){
                                        $cod=$producto['codpro'];
                                        $nombre=$producto['nompro'];
                                        $precio=$producto['prepro'];
                                        $cantidad=$producto['cantidad'];
                                        $subtotal=$cantidad*$precio;
                                        $total+=$subtotal;
                                    ?>
                                <tr>
                                    <td><?php echo $nombre ?> </td>
                                    <td><div id="subtotal_<?php echo $cod ?>" name="subtotal[]"><?php echo MONEDA. number_format($subtotal,2,'.',','); ?></div> </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                <td colspan="1"></td>
                                    <td colspan="2">
                                        <p class="h3" id="total"><?php echo MONEDA. number_format($total,2,'.',','); ?></p>
                                    </td>
                                </tr>

                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Pagar Con :</h3>
                    <div id="paypal-button-container">
                    </div>

                </div>
            </div>
        </div>
    </div>
	</main>


    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID;?>&currency=<?php echo CURRENCY;?>"> 
    </script>
    <script>
        paypal.Buttons({ 
            style:{
                color:'',
                shape:'pill',
                label:'pay'
            },
            createOrder:function(data,actions){
                return actions.order.create({
                    purchase_units:[{
                        amount:{
                            value: <?php echo $total  ;?>
                        }
                    }]
                });
            },
            onApprove: function(data,actions){
                let URL='capturar.php'
                actions.order.capture().then(function(detalles){
                    console.log(detalles)
                    // window.location.href="/service/pruebas/completado.html"
                    let url='/service/capturar.php'

                    return fetch(url,{
                        method:'POST',
                        headers:{
                            'content-type':'aplication/json'
                        },
                        body:JSON.stringify({
                            detalles:detalles
                        })
                    } )

                   
                });
            },

            onCancel:function(data){
                alert("Pago cancelado");
                console.log(data)
            }
         }).render('#paypal-button-container')
    </script>

	<!-- ----------------------------------------------------------------------------------------------------------- -->




</body>

</html>