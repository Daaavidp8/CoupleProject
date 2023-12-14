<?php
include_once "conexion.php";

include_once "acciones.php";

class Suministra extends Conexion implements acciones
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Mostrar(){
        try {
            $mostrar = $this->conectar()->prepare("Select * FROM precioventa");
            $mostrar->execute();
            return $mostrar->fetchAll();
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

        public function Insertar($valores){
        try {
            $array = $valores;
            $sentencia = "INSERT INTO precioventa VALUES (". implode(',', $array) .")";
            $this->conectar()->exec($sentencia);
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

    public function Eliminar($id)
    {
        // Usar claves foraneas
        $eliminar = $this->conectar()->prepare("DELETE FROM suministra WHERE cod_vend = :codigo");
        $eliminar->bindParam(':codigo', $id);
        $eliminar->execute();
    }
}