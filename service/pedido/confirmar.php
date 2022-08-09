<?php
session_start();
$response=new stdClass();

    include_once('../conexion.php');
    $codusu=$_SESSION['codusu'];
    $dirusu=$_POST['dirusu'];
    $telusu=$_POST['telusu'];
    $tipopago=$_POST['tipopago'];
    // $cantidad=$_POST['cantidad'];
    
    if($tipopago==1){
        $estado=2;
    }else{
        $estado=3;
    }

    $sql="UPDATE  pedido SET dirusuped='$dirusu', telusuped='$telusu',estado=$estado where estado=1 ";

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