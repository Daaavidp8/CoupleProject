<?php
include_once "Linped.php";

$mostrar = new Linped();
try {
    $consulta = $mostrar->Mostrar();
}catch (Exception $e){
    die($e->getMessage());
}

?>
<h1 class="display-4">Linea Pedido</h1>
<table class="table table-bordered" style="border-collapse: collapse">
    <tr class="thead-dark">
        <th>Num Pedido</th>
        <th>Num Linea</th>
        <th>Num Pieza</th>
        <th>Precio Compra</th>
        <th>Cant Pedida</th>
        <th>Fecha Recepcion</th>
        <th>Cantidad Recibida</th>
        <th></th>
    </tr>


    <form action="controladores/insertar.php" method="post">
        <tr>
            <?php
                for ($i = 0;$i < 7;$i++){?>
                    <td>
                        <input type="text" class="form-control" name="valores[]" required>
                    </td>
                <?php } ?>

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
                    <?=$fila['numlinea']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['numpieza']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['preciocompra']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['cantpedida']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['fecharecep']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['cantrecibida']?>
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

