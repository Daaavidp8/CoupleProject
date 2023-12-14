<?php
session_start();

include_once "acciones.php";

switch ($_SESSION['idTablaActual']){
    case 0:
        $tabla = "vendedor";
        break;

    case 1:
        $tabla = "suministra";
        break;


    case 2:
        $tabla = "pieza";
        break;

    case 3:
        $tabla = "inventario";
        break;
}

if (!empty($tabla)){
    try {
        $eliminar = new Acciones();
        $eliminar->Eliminar($tabla,$_REQUEST['id']);
        header("Location: ../index.php");
        exit();
    }catch (Exception $e){
        die($e->getMessage());
    }
}




