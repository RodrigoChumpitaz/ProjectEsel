<?php
include('conexion.php');
$emausu=$_POST['emausu'];
$sql="Select * from usuario where emausu='$emausu' ";

$result=mysqli_query($con,$sql);

if($result){
    $row=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);
    
}else{
    //1 error de conexion
    header('Location:../login.php?e=1');
}
