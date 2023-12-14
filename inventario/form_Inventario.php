<?php
include_once "Inventario.php";

$mostrar = new Inventario();
try {
    $consulta = $mostrar->Mostrar();
}catch (Exception $e){
    die($e->getMessage());
}

?>
<h1 class="display-4">Inventario</h1>
<table class="table table-bordered" style="border-collapse: collapse">
    <tr class="thead-dark">
        <th>Num Pieza</th>
        <th>Num Bin</th>
        <th>Cant. Disponible</th>
        <th>Fecha Recuento</th>
        <th>Periodo Recuento</th>
        <th>Cant. Minima</th>
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
                    <?=$fila['numbin']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['cantdisponible']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['fecharecuento']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['periodorecuen']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['cantminima']?>
                </div>
            </td>

            <td class="campos">
                <a href="" class="btn btn-primary mr-1"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="controladores/eliminar.php?id=<?=$fila['numbin']?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>


    <?php }

    ?>
</table>

