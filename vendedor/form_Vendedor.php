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


    <form action="controladores/insertar.php" method="post">
        <tr>
            <?php for ($i = 0;$i < 7;$i++){?>
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

    foreach ($consulta as $fila){
        $nombres = [$fila['numvend'],$fila['nomvend'],$fila['nombrecomer'],$fila['telefono'],$fila['calle'],$fila['ciudad'],$fila['provincia']];?>
        <tr>
            <?php
            foreach ($nombres as $campo){ ?>
                <td>
                    <div class="campos">
                        <?=$campo?>
                    </div>
                </td>
        <?php } ?>

            <td class="campos">
                <a href="" class="btn btn-primary mr-1" ><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="controladores/eliminar.php?id=<?=$fila['numvend']?>" class="btn btn-danger mr-1"><i class="fa-solid fa-trash-can"></i></a>
                <a href="suministra/form_suministra.php?id[]=<?=$fila['numvend']?>&id[]=<?= $fila['nomvend']?>" class="btn btn-secondary"><i class="fa-solid fa-eye"></i></a>
            </td>
        </tr>


    <?php }

    ?>
</table>
