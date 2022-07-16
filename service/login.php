<?php
  //1 error de conexion
    //2 email invalido
    //2 Contraseña incorrecta
include('conexion.php');
$emausu=$_POST['emausu'];
$sql="Select * from usuario where emausu='$emausu' ";

$result=mysqli_query($con,$sql);

if($result){
    $row=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);
    if($count!=0){
        $pasusu=$_POST['pasusu'];
        if($row['pasusu']!=$pasusu){  
        header('Location: ../login.php?e=3');
        }else{
            session_start();
            $_SESSION['codusu']=$row['codusu'];
            $_SESSION['emausu']=$row['emausu'];
            $_SESSION['nomusu']=$row['nomusu'];
            header('Location: ../productos.php');
        }
    }
    else{
        header('Location: ../login.php?e=2');
    }
    
}else{
    //1 error de conexion
    header('Location: ../login.php?e=1');
}

