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
}
// session_destroy();
print_r($_SESSION);



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

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantida</th>
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
                            <td><?php echo MONEDA. number_format($precio,2,'.',','); ?> </td>
                            <td><input type="number" min="1" max="10" step="1" value="<?php echo $cantidad?>" size="5" id="cantidad_<?php echo $cod;?>" onchange="actualizaCantidad(this.value,<?php echo $cod;?>)"> </td>
                            <td><div id="subtotal_<?php echo $cod ?>" name="subtotal[]"><?php echo MONEDA. number_format($subtotal,2,'.',','); ?></div> </td>
                            <td><button  id="eliminar" class="btn btn-danger btn-sm" data-bs-id="<?php echo $cod; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal" >Eliminar</button> </td>
                        </tr>
                        <?php } ?>

                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">
                                <p class="h3" id="total"><?php echo MONEDA. number_format($total,2,'.',','); ?></p>
                            </td>
                        </tr>

                    </tbody>
                    <?php } ?>
                </table>
            </div>
		</div>

        <?php if($lista_carrito!=null){ ?>
        <div class="container ">
            <div class="row ">
                <div class="col-md-6 " >
                        <div class="">
                            <a href="pago.php" class="btn btn-success " >Realizar pago</a>
                        </div>
                </div>
            </div>
        </div><?php }?>

	</main>
    


    <!-- Modal -->
    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminaModalLabel">Eliminar del carrito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Seguro que desea eliminar el producto de su carrito?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button id="btn-elimna" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
            </div>
            </div>
        </div>
    </div>
    
	<!-- <script>
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
	</script> -->

    
   
<script>

    let eliminaModal=document.getElementById('eliminaModal')
    eliminaModal.addEventListener('show.bs.modal',function(event){
        let button=event.relatedTarget
        let cod=button.getAttribute('data-bs-id')
        let buttonElimina=eliminaModal.querySelector('.modal-footer #btn-elimna')
        buttonElimina.value=cod
    })
		function actualizaCantidad(cantidad,codpro){
			let url='/actualizar_carrito.php'
			let formData=new FormData()
            formData.append('action','agregar')
			formData.append('codpro',codpro)
			formData.append('cantidad',cantidad)

			fetch(url,{
				method:'POST',
				body:formData,
				mode:'cors'
			}).then ( response => response.json())
			.then(data=>{
				if(data.ok){
                    let divsubtotal=document.getElementById('subtotal_'+codpro)
                    divsubtotal.innerHTML=data.sub
					// let elemento =document.getElementById("num_cart")
					// elemento.innerHTML=data.numero

                    let total=0.00
                    let list=document.getElementsByName('subtotal[]')

                    for(let i=0 ; i<list.length; i++){
                        total+=parseFloat(list[i].innerHTML.replace(/[$,]/g,''))
                    }
                    total=new Intl.NumberFormat('en-US',{
                        minimumFractionDigits:2
                    }).format(total)
                    document.getElementById('total').innerHTML='<?php echo MONEDA;?>'+total
				}
			})

		}

        function eliminar(){
            let botonElimina= document.getElementById('btn-elimna')
            let codpro=botonElimina.value  

			let url='/actualizar_carrito.php'
			let formData=new FormData()
            formData.append('action','eliminar')
			formData.append('codpro',codpro)


			fetch(url,{
				method:'POST',
				body:formData,
				mode:'cors'
			}).then ( response => response.json())
			.then(data=>{
				if(data.ok){
                    location.reload()
				}
			})

		}


        
		
	</script>


	<!-- ----------------------------------------------------------------------------------------------------------- -->


</body>

</html>