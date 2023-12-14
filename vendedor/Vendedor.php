<?php
include_once "acciones.php";

class Vendedor extends acciones
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Borrar($id){
        $eliminar = $this->conectar()->prepare("DELETE FROM asignaturas WHERE codigo=:codigo");
        $eliminar->bindParam(':codigo', $id);
        $eliminar->execute();
    }
}