<?php
include_once "acciones.php";


//TODO El name de los valores será valores[] dentro del formulario

try {
    $insert = new acciones();
    $insert->Insertar($_POST["valores[]"]);
}catch (Exception $e){
    die($e->getMessage());
}
