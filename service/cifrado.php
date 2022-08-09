<?php

define("CLIENT_ID","AWUR1Vo9ZRAMNbLXXSLE58x4IM2XmtjRTdBB3l9Wj7C0Hjc9KR2ngNafxYtMcV5SEnGRrKYjQJt5A1n3");
define("CURRENCY","USD");
define("KEY_TOKEN","ABC.mnm-123*");

define("MONEDA","$");

session_start();

$num_cart=0;

if(isset ($_SESSION['carrito']['producto'])){

    $num_cart=count($_SESSION['carrito']['producto']);
}
?>