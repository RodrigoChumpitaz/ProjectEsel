<?php
//incluir la conexion en el llamado 
include('../conexion.php');

//OJO stdclass es para crear objetos genericos y luego agregarles sus propiedades
$response=new stdClass();

//query comun
//estado1=== activo
$sql="select*from producto where estado=1";

//resultado del llamado, tiene como parametros la varible de conexion y el query
$result=mysqli_query($con,$sql);

//creo variable de tipo arreglo
$datos=[];

//creo iniciador en 0
$i=0;

//recorrer el resultado en la varible row y lo itera
while($row=mysqli_fetch_array($result)){

    //creo un objeto con los mismos campos de la base de datos
    $obj=new stdClass();
    $obj->codpro=$row['codpro'];
    $obj->nompro=$row['nompro'];
    $obj->despro=$row['despro'];
    $obj->prepro=$row['prepro'];
    $obj->rutimapro=$row['rutimapro'];
    $datos[$i]=$obj;
    $i++;

}
$response->datos=$datos;


//despues de que acabo de ejecutarse todo cierro mi conexion
mysqli_close($con);
//para que me diga que es json
header('Content-Type: application/json');
//que lo muestre en formato json
echo json_encode($response);