
<?php
	require './service/cifrado.php';
	
 	if(isset($_POST['codpro'])){

		$cod=$_POST['codpro'];
		$token=$_POST['token'];

		$token_tmp=hash_hmac('sha1',$cod,KEY_TOKEN);
 
		if($token == $token_tmp){

			if(isset($_SESSION['carrito']['producto'][$cod])){

				$_SESSION['carrito']['producto'][$cod] +=1;

			}else{
				$_SESSION['carrito']['producto'][$cod] =1;
			}

			$datos['numero']=count($_SESSION['carrito']['producto']);
			$datos['ok']=true;

		}else{
			$datos['ok']=false;
		}

	}else{
		$datos['ok']=false;
	}

echo json_encode($datos);


