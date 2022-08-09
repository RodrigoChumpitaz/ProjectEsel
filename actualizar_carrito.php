<?php
require './service/cifrado.php';
require './service/database.php';

if(isset($_POST['action'])){
    $action=$_POST['action'];
    $cod=isset($_POST['codpro']) ? $_POST['codpro'] : 0;   

    if($action=='agregar'){
        $cantidad=isset($_POST['cantidad'])? $_POST['cantidad']:0;
        $respuesta=agregar($cod,$cantidad);
        if($respuesta>0){
            $datos['ok']=true;
        }else{
            $datos['ok']=false;
        }

        $datos['sub']=MONEDA. number_format($respuesta,2,'.',','); 
    }else if($action=="eliminar"){
        $datos['ok']=eliminar($cod);
    } else{
        $datos['ok']=false;
    }
    
}else{
    $datos['ok']=false;
}

echo json_encode($datos);

function agregar($cod,$cantidad){
    $res=0;
    if($cod>0 && $cantidad>0 && is_numeric(($cantidad))){
        if(isset($_SESSION['carrito']['producto'][$cod])){
            $_SESSION['carrito']['producto'][$cod]=$cantidad;

            $db=new Database();
            $con=$db->conectar();
            $sql=$con->prepare("SELECT prepro FROM producto WHERE codpro=? AND estado=1 LIMIT 1");
			$sql->execute([$cod]);
			$row=$sql->fetch(PDO::FETCH_ASSOC);
			$precio=$row['prepro'];
            $res=$cantidad*$precio;

            return $res;
        }
    }else{
        return $res;
    }
}

function eliminar($cod){
    if($cod > 0){
        if(isset($_SESSION['carrito']['producto'][$cod])){}
            unset($_SESSION['carrito']['producto'][$cod]);
            return true;
    }else{
        return false;
    }

}