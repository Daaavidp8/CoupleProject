<?php

ini_set("display_errors",1);

include_once "../conexion.php";
include_once "../acciones.php";
include_once "../inventario/Inventario.php";
include_once "../pedido/Pedido.php";
include_once "../suministra/Suministra.php";
include_once "../linped/Linped.php";
include_once "../vendedor/Vendedor.php";
include_once "../pieza/Pieza.php";


session_start();


switch ($_SESSION["idTablaActual"]){
    case 0:
        $tabla = new Vendedor();
        break;

    case 1:
        $tabla = new Suministra();
        break;

    case 2:
        $tabla = new Pieza();
        break;

    case 3:
        $tabla = new Pedido();
        break;

    case 4:
        $tabla = new Inventario();
        break;

    case 5:
        $tabla = new Linped();
        break;


    default:
        throw new Exception("El id de la tabla actual no es válido");
}

$tabla->Insertar($_REQUEST["valores"]);
header("Location:../index.php");