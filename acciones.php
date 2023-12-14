<?php

include_once "conexion.php";

class acciones extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Mostrar($tabla){
        try {
            $mostrar = $this->conectar()->prepare("Select * FROM $tabla");
            $mostrar->execute();
            return $mostrar->fetchAll();
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

    public function Insertar($valores){
        try {
            $array = $valores;
            $nombresTablas = ["inventario", "vendedor"];
            $nombreTablaActual = $nombresTablas[$_SESSION["idTablaActual"]];
            $sentencia = "INSERT INTO " . $nombreTablaActual . " VALUES (". implode(',', $array) .")";
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

    public function Eliminar($tabla,$id){
        $eliminar = $this->conectar()->prepare("DELETE FROM $tabla WHERE codigo=:codigo");
        $eliminar->bindParam(':codigo', $id);
        $eliminar->execute();
    }

}