<?php

include('conexion2.php');
$con=conectar();


/* $codusu=$_POST['codusu']; */
$nomusu=$_POST['nomusu'];
$apeusu=$_POST['apeusu'];
$emausu=$_POST['emausu'];
$pasusu=$_POST['pasusu'];
$estado=$_POST['estado'];


if(isset($_POST['user_type'])){
    $user_type=$_POST['user_type'];
    $sql="INSERT INTO  usuario(nomusu,apeusu,emausu,pasusu,estado,user_type) VALUES('$nomusu','$apeusu','$emausu','$pasusu',$estado,'$user_type') ";
}
$sql="INSERT INTO  usuario(nomusu,apeusu,emausu,pasusu,estado,user_type) VALUES('$nomusu','$apeusu','$emausu','$pasusu',$estado,'cliente') ";


 
$query=mysqli_query($con,$sql);

if($query){
    Header("Location: ../login.php");
}else{

}
