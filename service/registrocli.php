<?php

include('conexion2.php');
$con=conectar();


$codusu=$_POST['codusu'];
$nomusu=$_POST['nomusu'];
$apeusu=$_POST['apeusu'];
$emausu=$_POST['emausu'];
$pasusu=$_POST['pasusu'];
$estado=$_POST['estado'];

$sql="INSERT INTO  usuario VALUES('$codusu','$nomusu','$apeusu','$emausu','$pasusu','$estado') ";

$query=mysqli_query($con,$sql);

if($query){
    Header("Location: ../registrocli.php");
}else{

}
