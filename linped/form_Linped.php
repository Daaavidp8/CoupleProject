<?php
include_once "Linped.php";

$mostrar = new Pedido();
try {
    $consulta = $mostrar->Mostrar();
}catch (Exception $e){
    die($e->getMessage());
}

?>
<h1 class="display-4">Pedido</h1>
<table class="table table-bordered" style="border-collapse: collapse">
    <tr class="thead-dark">
        <th>Num Pedido</th>
        <th>Fecha</th>
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
                    <?=$fila['numpedido']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['fecha']?>
                </div>
            </td>

            <td class="campos">
                <a href="" class="btn btn-primary mr-1"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="controladores/eliminar.php?id=<?=$fila['numpedido']?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>


    <?php }

    ?>
</table>

