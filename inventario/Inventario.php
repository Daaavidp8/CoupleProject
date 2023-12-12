<?php
include_once "conexion.php";

class Inventario extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Mostrar(){
        $mostrar = $this->conectar()->prepare("Select * FROM inventario");
        $mostrar->execute();
        return $mostrar->fetchAll();
    }
}