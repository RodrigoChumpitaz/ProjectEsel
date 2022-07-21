<?php     
function conectar(){
    $con= mysqli_connect('localhost','root','','solucionweb');
        return $con;
   }

?>