<?php
$host = "localhost";
$bd = "id20937534_portalsldad";
$usuario = "id20937534_root";
$contrasenia = "miguel123+A";
try{
        $conexion = new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
} catch (Exceptiom $ex){
    echo $ex->getMessage();
}
?>