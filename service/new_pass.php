<?php
  
  include('conexion2.php');
  $con=conectar();
  

if(isset($_POST['emausu']) && !empty($_POST['emausu'])){
    $pasusu=substr(md5(microtime()),1,5);
    $email=$_POST['emausu'];

    $sql="UPDATE usuario set pasusu='$pasusu' where emausu='$email'";

    $query=mysqli_query($con,$sql);

    $to=$_POST['emausu'];
    $from="From:"."Papercut@papercut.com";
    $subject="Recordar contraseña";
    $message="El sistema le asigno la siguiente clave ".$pasusu;

    mail($to,$subject,$message,$from);
    echo 'Correo enviado satisafactoriamente a'. $_POST['emausu'];

}
else{
    echo 'Informacion Incompleta';
}