<?php
ini_set("display_errors",1);

include_once "Vendedor.php";

$mostrar = new Vendedor();
try {
    $consulta = $mostrar->Mostrar();
}catch (Exception $e){
    die($e->getMessage());
}

?>

<h1 class="display-4">Vendedor</h1>
<table class="table table-bordered" style="border-collapse: collapse">
    <tr class="thead-dark">
        <th>Num Vendedor</th>
        <th>Nombre Vendedor</th>
        <th>Nombre Comercio</th>
        <th>Teléfono</th>
        <th>Calle</th>
        <th>Ciudad</th>
        <th>Provincia</th>
        <th></th>
    </tr>


    <form action="./controladores/insertar.php" method="post">
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
                    <?=$fila['numvend']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['nomvend']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['nombrecomer']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['telefono']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['calle']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['ciudad']?>
                </div>
            </td>

            <td class="td-tabla">
                <div class="campos">
                    <?=$fila['provincia']?>
                </div>
            </td>

            <td class="campos">
                <a href="" class="btn btn-primary mr-1" ><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="controladores/eliminar.php?id=<?=$fila['numvend']?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>


    <?php }

    ?>
</table>
