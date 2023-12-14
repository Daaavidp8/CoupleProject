<?php
ini_set("display_errors",1);

session_start();

include_once "../conexion.php";
include_once "../acciones.php";
include_once "../vendedor/Vendedor.php";
include_once "../suministra/Suministra.php";
include_once "../pieza/Pieza.php";
include_once "../pedido/Pedido.php";
include_once "../linped/Linped.php";
include_once "../inventario/Inventario.php";


switch ($_SESSION['idTablaActual']){
    case 0:
        $eliminar = new Vendedor();
        break;

    case 1:
        $eliminar = new Suministra();
        break;

    case 2:
        $eliminar = new Pieza();
        break;

    case 3:
        $eliminar = new Pedido();
        break;

    case 4:
        $eliminar = new Inventario();
        break;

    case 5:
        $eliminar = new Linped();
        break;

    default:
        throw new Exception("El id de la tabla actual no es válido");
}

$eliminar->Eliminar($_REQUEST['id']);
header("Location: ../index.php");
exit();