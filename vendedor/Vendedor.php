<?php
include_once "../conexion.php";
include_once "../acciones.php";

class Vendedor extends Conexion implements acciones
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Mostrar(){
        try {
            $mostrar = $this->conectar()->prepare("Select * FROM vendedor");
            $mostrar->execute();
            return $mostrar->fetchAll();
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

    public function Insertar($valores){
        try {
            $array = $valores;
            $sentencia = "INSERT INTO vendedor VALUES (". implode(',', $array) .")";
            $this->conectar()->exec($sentencia);
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

    public function Eliminar($id)
    {
        $eliminar = $this->conectar()->prepare("DELETE FROM vendedor WHERE numvend = :codigo");
        $eliminar->bindParam(':codigo', $id);
        $eliminar->execute();
    }

}