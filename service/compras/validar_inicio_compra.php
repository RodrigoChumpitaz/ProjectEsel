<?php
session_start();
$response=new stdClass();
if(!isset($_SESSION['codusu'])){
    $response->state=false;
    $response->detail="no esta logeado";
    $response->open_login="true";
}else{
    include_once('../conexion.php');
    $codusu=$_SESSION['codusu'];
    $codpro=$_POST['codpro'];
    $sql="INSERT INTO pedido 
    (codusu,codpro,fecped,estado,dirusuped,telusuped)
    VALUES ('$codusu','$codpro',now(),1,'','')";

    $result=mysqli_query($con,$sql);
    if($result){
        $response->state=true;
        $response->detail="Producto agregado" ;
    }
    else{
        $response->state=false;
        $response->detail="no se pudo agregar producto" ;
    }
    // $response->state=true;
    // $response->detail="Esta logeado" ;
    mysqli_close($con);
}




header('Content-Type: application/json');

echo json_encode($response);