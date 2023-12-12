<?php
include_once "conexion.php";

class Vendedor extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Mostrar(){
        $mostrar = $this->conectar()->prepare("Select * FROM vendedor");
        $mostrar->execute();
        return $mostrar->fetchAll();
    }
}