<?php
session_start();
$response=new stdClass();
if(!isset($_SESSION['codusu'])){
    $response->state=false;
    $response->detail="no esta logeado";
    $response->open_login="true";
}else{
    
    $response->detail="Producto agregado al carrito";
}




header('Content-Type: application/json');

echo json_encode($response);