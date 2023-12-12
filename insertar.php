<?php

//TODO El name de los valores será valores[] dentro del formulario
$array = $_POST["valores"];
$nombresTablas = ["inventario", "vendedor"];
$nombreTablaActual = $nombresTablas[$_SESSION["idTablaActual"]];
$sentencia = "INSERT INTO " . $nombreTablaActual . " VALUES (". implode(',', $array) .")";

echo $sentencia;