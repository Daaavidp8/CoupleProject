<?php
include_once "../conexion.php";

include_once "../acciones.php";

class Suministra extends Conexion implements acciones
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Mostrar(){
        try {
            $mostrar = $this->conectar()->prepare("Select * FROM preciosum");
            $mostrar->execute();
            return $mostrar->fetchAll();
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

        public function Insertar($valores){
        try {
            $array = $valores;
            $sentencia = "INSERT INTO preciosum VALUES (". implode(',', $array) .")";
            $this->conectar()->exec($sentencia);
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

    public function Eliminar($id)
    {
        // Usar claves foraneas
        $id = implode($id);


        $eliminar = $this->conectar()->prepare("DELETE FROM preciosum WHERE numvend = :numvend and numpieza= :numpieza");
        $eliminar->bindParam(':numvend', $id[0]);
        $eliminar->bindParam(':numpieza', $id[1]);
        $eliminar->execute();
    }
}