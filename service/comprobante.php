
<?php
require '../service/cifrado.php';
require '../service/database.php';
$db=new Database();
$con=$db->conectar();

$sql=$con->prepare("SELECT dp.codped,dp.nombre,dp.cantidadp,dp.precio,cp.total,usu.nomusu,usu.apeusu,cp.dirusuped,cp.fecped FROM detallepedido dp INNER JOIN pedido cp ON dp.codped = cp.codped INNER JOIN usuario usu ON usu.codusu= cp.codusu WHERE cp.codped = (SELECT MAX(cp.codped) FROM pedido cp)");
$sql->execute();
$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


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
   


  
<div  class="container pt-3">

    <h2 class="">Factura</h2>

    <div class="row my-3">
    <div class="col-10">
        <h1>Esel industrial S.A</h1>
        <p>Calle Los Arandanos </p>
        <p>Manzana N lote 19 - Lima</p>
    </div>
    <div class="col-2">
        <img src="../images//Logito.png"  style="width: 250px ;"/>
    </div>
    </div>
    <hr />
    <div class="row fact-info mt-3">
    <div class="col-3">
        <h5>Facturar a</h5>
        <p>
        <?php foreach ($resultado as $row) { ?> <?php } ?>
        <p>
            <?php echo $row['nomusu']; ?>
            <?php echo $row['apeusu']; ?>
        </p>
               
        </p>
    </div>
    <div class="col-3">
        <h5>Enviar a</h5>
        <?php foreach ($resultado as $row) { ?> <?php } ?>
        <p>
            <?php echo $row['dirusuped']; ?>
        </p>
    </div>
    <div class="col-3">
        <h5>N° de factura</h5>
        <h5>Fecha de facturacion</h5>
    </div>
    <div class="col-3">
        <?php foreach ($resultado as $row) { ?> <?php } ?>
        <h5>
            <?php echo $row['codped']; ?>
        </h5>
        <p><?php echo date('Y-m-d',strtotime($row['fecped'])); ?></p>
    </div>
    </div>

    <div class="row my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>codigo</th>
                    <th>Producto</th>
                    <th>cantidad</th>
                    <th>precio</th>
                </tr>
            </thead>
                <tbody>
                    <?php foreach ($resultado as $row) { ?>
                    <tr>
                        <td > <?php echo $row['codped']; ?></td>
                        <td > <?php echo $row['nombre']; ?></td>
                        <td > <?php echo $row['cantidadp']; ?></td>
                        <td >$<?php echo number_format( $row['precio'],2,'.',','); ?></td> 
                    </tr>
                <?php } ?>
                
                </tbody>      
        </table>
            <p class="h3 d-flex  align-items-right" style="position: relative; right: -930px;">Total :<?php echo number_format( $row['total'],2,'.',','); ?></p>
    </div>


</div>

<a href="../productos.php"><buttonm class="btn btn-info">seguir comprado</buttonm></a>

</body>

</html>