<?php
include_once "../conexion.php";
include_once "../acciones.php";

class Inventario extends Conexion implements acciones
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Mostrar(){
        try {
            $mostrar = $this->conectar()->prepare("Select * FROM inventario");
            $mostrar->execute();
            return $mostrar->fetchAll();
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

    public function Insertar($valores){
        try {
            $sentencia = 'INSERT INTO inventario VALUES (?,?,?,?,?,?)';
            $insercion = $this->conectar()->prepare($sentencia);
            $insercion->execute($valores);
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

    public function Eliminar($id)
    {
        $eliminar = $this->conectar()->prepare("DELETE FROM inventario WHERE numbin = :codigo");
        $eliminar->bindParam(':codigo', $id);
        $eliminar->execute();
    }

}