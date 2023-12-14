<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/9082f21abd.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./estilosPrincipales.css">

</head>
<body class="container mt-5">
<?php
session_start();


ini_set("display_errors",1);


if (!isset($_SESSION['idTablaActual'])) {
    $_SESSION['idTablaActual'] = 0;
}


if ($_SERVER['REQUEST_METHOD'] === "GET") {

    if (isset($_REQUEST["pasar"])) {
        $numTablas = 5;
        if ($_SESSION['idTablaActual'] === 0 && $_REQUEST["pasar"] == -1) {
            $_SESSION['idTablaActual'] = $numTablas - 1;
        } else if ($_SESSION['idTablaActual'] === $numTablas - 1 && $_REQUEST["pasar"] == 1) {
            $_SESSION['idTablaActual'] = 0;
        }else {
            $_SESSION['idTablaActual'] += $_REQUEST['pasar'];
        }
    }
}




    $ruta = "";
    switch ($_SESSION['idTablaActual']){
        case 0:
            $ruta = "./vendedor/form_Vendedor.php";
            break;

        case 1:
            $ruta = "./suministra/form_suministra.php";
            break;


        case 2:
            $ruta = "./pieza/form_pieza.php";
            break;

        case 3:
            $ruta = "./pedido/form_Pedido.php";
            break;

        case 4:
            $ruta = "./inventario/form_Inventario.php";
            break;

        default:
            $ruta = "./vendedor/form_Vendedor.php";
            $_SESSION['idTablaActual'] = 0;
            break;
    }
    include_once  $ruta;
?>

<div>
    <a href="index.php?pasar=-1">Anterior</a>
    <a href="index.php?pasar=1">Siguiente</a>
</div>
</body>
</html>
