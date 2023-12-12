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


    $tablaActual = "";
    //TODO $_SESSION['idTablaActual'] en el switch
    switch (0){
        case 0:
            $tablaActual = "./inventario/form_Inventario.php";
            break;

        case 1:
            $tablaActual = "./vendedor/form_Vendedor.php";
            break;


    }
    include_once $tablaActual;
?>
</body>
</html>
