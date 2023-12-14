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
include_once "../conexion.php";
include_once "../acciones.php";
include_once "Suministra.php";


ini_set("display_errors",1);


$id = $_REQUEST['id'][0];
$nombre = $_REQUEST['id'][1];


$suministra = new Suministra();

try {
    $suministra = $suministra->Mostrar($id);
}catch (Exception $e){
    die($e->getMessage());
}


?>

<h1 class="display-4"><?= $nombre?></h1>
<table class="table table-bordered" style="border-collapse: collapse">

    <tr class="thead-dark">
        <th>Num Pieza</th>
        <th>Precio Unitario</th>
        <th>Diassum</th>
        <th>Descuento</th>
    </tr>

    <?php
    foreach ($suministra as $fila){?>
        <tr>
            <td class="">
                <div class="campos">
                    <?=$fila['numpieza']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['preciounit']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['diassum']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['descuento']?>
                </div>
            </td>
        </tr>


    <?php }

    ?>
</table>


</body>
</html>




