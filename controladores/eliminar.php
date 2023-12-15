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


$valor = $_REQUEST['id'];

if (isset($_REQUEST['suministra'])){
    $suministra = true;
    $_SESSION['idTablaActual'] = 5;
}else{
    $suministra = false;
}


switch ($_SESSION['idTablaActual']){
    case 0:
        $eliminar = new Vendedor();
        $valor = (int)$valor;
        break;

    case 1:
        $eliminar = new Pieza();
        break;

    case 2:
        $eliminar = new Pedido();
        break;

    case 3:
        $eliminar = new Inventario();
        break;

    case 4:
        $eliminar = new Linped();
        break;

    case 5:
        $eliminar = new Suministra();
        $valor = (int)$valor;
        break;

    default:
        throw new Exception("El id de la tabla actual no es válido");
}



if ($suministra){
    $eliminar->Eliminar($valor,$_REQUEST['numpieza']);
}else{
    $eliminar->Eliminar($valor);
}

if ($suministra){
    $nombre = $_REQUEST['nombre'];
    header("Location: ../suministra/form_suministra.php?id[]=$valor&id[]=$nombre");
}else{
    header("Location: ../index.php");
}
exit();