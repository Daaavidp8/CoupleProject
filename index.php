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


    $directorio = __DIR__;

    // Obtener la lista de archivos y carpetas en el directorio
    $archivos = scandir($directorio);

    // Filtrar solo las carpetas
    $numcarpetas = array_filter($archivos, function ($item) use ($directorio) {
        // Ignorar las carpetas "." y ".." y seleccionar solo directorios no ocultos
        return is_dir($directorio . '/' . $item) && $item[0] != '.';
    });

    $numcarpetas = count($numcarpetas) - 2;

    if (isset($_REQUEST["pasar"])) {
        if ($_SESSION['idTablaActual'] === 0 && $_REQUEST["pasar"] == -1) {
            $_SESSION['idTablaActual'] = $numcarpetas;
        } else if ($_SESSION['idTablaActual'] === $numcarpetas && $_REQUEST["pasar"] == 1) {
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
