<?php
ini_set("display_errors",1);


include_once "./conexion.php";

$select = new Conexion();

$select = $select->conectar()->prepare("Select * FROM vendedor");

$select->execute();

foreach ($select as $fila){
    foreach ($fila as $valor){
        echo $valor;
    }
}

?>
