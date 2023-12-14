<?php

include_once "Pieza.php";

$mostrar = new Pieza();
try {
    $consulta = $mostrar->Mostrar();
}catch (Exception $e){
    die($e->getMessage());
}


?>

<h1 class="display-4">Pieza</h1>
<table class="table table-bordered" style="border-collapse: collapse">
    <tr class="thead-dark">
        <th>Numero Pieza</th>
        <th>Nombre Pieza</th>
        <th>Precio Venta</th>
        <th></th>
    </tr>


    <form action="./insertar.php" method="post">
        <tr>
            <td>
                <input type="text" class="form-control" name="valores[]" required>
            </td>

            <td>
                <input type="text" class="form-control" name="valores[]" required>
            </td>

            <td>
                <input type="text" class="form-control" name="valores[]" required>
            </td>

            <td class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Insertar</button>
            </td>

        </tr>
    </form>

    <?php
    foreach ($consulta as $fila){?>
        <tr>
            <td class="">
                <div class="campos">
                    <?=$fila['numpieza']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['nompieza'] === null ? "Sin nombre": $fila['nompieza']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['preciovent']?>
                </div>
            </td>

            <td class="campos">
                <a href="" class="btn btn-primary mr-1"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="controladores/eliminar.php?id=<?=$fila['numpieza']?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>


    <?php }

    ?>
</table>


