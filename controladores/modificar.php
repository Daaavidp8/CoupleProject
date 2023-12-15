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


switch ($_SESSION['idTablaActual']){
    case 0:
        $modificar = new Vendedor();
        break;

    case 1:
        $modificar = new Pieza();
        break;

    case 2:
        $modificar = new Pedido();
        break;

    case 3:
        $modificar = new Inventario();
        break;

    case 4:
        $modificar = new Linped();
        break;

    case 5:
        $modificar = new Suministra();
        break;

    default:
        throw new Exception("El id de la tabla actual no es válido");
}

$datos = $modificar->Mostrar($_REQUEST['id']);

$columnas = array_keys($datos[0]);
$campos = [];

?>



    <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
        <div class="container mt-4">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <?php
                    foreach ($columnas as $columna){
                        if (is_string($columna)){
                            $campos[] = $columna;
                            ?>
                            <th><?= $columna ?></th>
                        <?php }
                    } ?>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    $valores = [];
                    foreach ($columnas as $columna){
                        $valores[] = $datos[0][$columna];
                    }
                    $contador = 0;
                    for ($i = 0; $i < count($valores); $i += 2){?>
                        <td>
                            <input type="text" class="form-control" name="<?= $campos[$contador]?>" value="<?=$valores[$i]?>">
                        </td>
                        <?php
                        $contador++;
                    } ?>
                    <td>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </form>
</body>

