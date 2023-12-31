<?php


class Pieza extends Conexion implements acciones
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Mostrar(){
        try {
            $mostrar = $this->conectar()->prepare("Select * FROM pieza");
            $mostrar->execute();
            return $mostrar->fetchAll();
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

    public function Insertar($valores){
        try {
            $sentencia = 'INSERT INTO pieza VALUES (?,?,?)';
            $insercion = $this->conectar()->prepare($sentencia);
            $insercion->execute($valores);
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

    public function Eliminar($id)
    {
        $eliminar = $this->conectar()->prepare("DELETE FROM pieza WHERE numpieza = :codigo");
        $eliminar->bindParam(':codigo', $id);
        $eliminar->execute();
    }

}