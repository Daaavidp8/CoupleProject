<?php

class Suministra extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Mostrar($id){
        try {
            $mostrar = $this->conectar()->prepare("Select * FROM preciosum where numvend=:numvend");
            $mostrar->bindParam(':numvend', $id);
            $mostrar->execute();
            return $mostrar->fetchAll();
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

        public function Insertar($valores){
        try {
            $sentencia = 'INSERT INTO preciosum VALUES (?,?,?,?,?)';
            $insercion = $this->conectar()->prepare($sentencia);
            $insercion->execute($valores);
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

    public function Eliminar($id)
    {
        if (is_int($id)){
            $eliminar = $this->conectar()->prepare("DELETE FROM preciosum WHERE numvend = :numvend");
            $eliminar->bindParam(':numvend', $id);
            $eliminar->execute();
        }
//        else if(is_string($id)){
//            $eliminar = $this->conectar()->prepare("DELETE FROM preciosum WHERE numpieza = :numpieza");
//            $eliminar->bindParam(':numpieza', $id);
//            $eliminar->execute();
//        }
    }
}