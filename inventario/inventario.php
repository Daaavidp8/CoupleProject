<?php
include_once "../conexion2.php";

class Inventario extends \conexion2
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