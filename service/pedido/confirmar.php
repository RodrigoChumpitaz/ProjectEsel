<?php
session_start();
$response=new stdClass();

    include_once('../conexion.php');
    $codusu=$_SESSION['codusu'];
    $dirusu=$_POST['dirusu'];
    $telusu=$_POST['telusu'];
    $sql="UPDATE  pedido SET dirusuped='$dirusu', telusuped='$telusu' where estado=1 ";

    $result=mysqli_query($con,$sql);
    if($result){
        $response->state=true;
        $response->detail="Producto agregado" ;
    }
    else{
        $response->state=false;
        $response->detail="no se pudo actualizar el pedido" ;
    }
    // $response->state=true;
    // $response->detail="Esta logeado" ;
    mysqli_close($con);





header('Content-Type: application/json');

echo json_encode($response);