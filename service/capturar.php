<?php
require '../service/cifrado.php';
require '../service/database.php';
$db=new Database();
$con=$db->conectar();

$json=file_get_contents('php://input');
$datos=json_decode($json,true);


print_r($datos);

if(is_array($datos)){

    $codusu=$_SESSION['codusu'];
    $id_transaccion=$datos['detalles']['id'];
    $total=$datos['detalles']['purchase_units'][0]['amount']['value'];
    $status=$datos['detalles']['status'];
    $fecha=$datos['detalles']['update_time'];
    $fecha_registrar=date('Y-m-d H:i-s',strtotime($fecha));
    $idcliente=$datos['detalles']['payer']['payer_id'];

    $sql=$con->prepare("INSERT INTO pedido (id_transaccion,codusu,id_cliente,fecped,estado,dirusuped,telusuped,total) VALUES (
        ?,?,?,?,?,?,?,?)");
    $sql->execute([$id_transaccion,$codusu,$idcliente ,$fecha_registrar, $status,'','',$total]);
    $cod=$con->lastInsertId();

    if($cod >0){

        $productos=isset($_SESSION['carrito']['producto']) ? $_SESSION['carrito']['producto']: null;

        if($productos!=null){
            
            foreach($productos as $clave=> $cantidad){
                $sql=$con->prepare("SELECT codpro,nompro,prepro FROM producto WHERE codpro=? AND estado=1");

                $sql->execute([$clave]);
                $row_prod=$sql->fetch(PDO::FETCH_ASSOC);

                $precio=$row_prod['prepro'];


                $sql_insert=$con->prepare("INSERT INTO detallepedido (codped ,codpro ,nombre,precio,cantidadp) VALUES
                (?,?,?,?,?)");
                $sql_insert->execute([$cod,$clave,$row_prod['nompro'], $precio,$cantidad]);
            
               
            }
        }
        unset($_SESSION['carrito']);
    }

}