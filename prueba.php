<?php
ini_set("display_errors",1);


include_once "./conexion2.php";

$select = new Conexion2();

$select = $select->conectar()->prepare("Select * FROM vendedor");

$select->execute();

foreach ($select as $fila){
    foreach ($fila as $valor){
        echo $valor;
    }
}

?>
