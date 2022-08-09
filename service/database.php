<?php

class Database{
    private $host="localhost";
    private $database="solucionweb";
    private $user="root";
    private $pass="";
    private $char="utf8";

    function conectar(){

        try{
        $conexion="mysql:host=".$this->host.";dbname=".$this->database.";charset".$this->char;
        $options=[
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES=>false
        ];

        $pdo=new PDO($conexion,$this->user,$this->pass,$options);

        return $pdo;
    }catch(PDOException $e){
        echo'ERROR conexion:'.$e->getMessage();
        exit;

    }

        
    }
}


?>