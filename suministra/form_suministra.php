<?php
include_once "Suministra.php";

$suministra = new Suministra();

try {
    $suministra = $suministra->Mostrar();
}catch (Exception $e){
    die($e->getMessage());
}

?>

<h1 class="display-4">Suministra</h1>
<table class="table table-bordered" style="border-collapse: collapse">

    <tr class="thead-dark">
        <th>Num Pieza</th>
        <th>Num Vendedor</th>
        <th>Precio Unitario</th>
        <th>Diassum</th>
        <th>Descuento</th>
        <th></th>
    </tr>

    <form action="controladores/insertar.php" method="post">
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
    foreach ($suministra as $fila){?>
        <tr>
            <td class="">
                <div class="campos">
                    <?=$fila['numpieza']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['numvend']?>
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

            <td class="campos">
                <a href="" class="btn btn-primary mr-1"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="controladores/eliminar.php?id[]=<?= $fila['numvend']?>&id[]=<?=$fila['numpieza']?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>


    <?php }

    ?>
</table>

