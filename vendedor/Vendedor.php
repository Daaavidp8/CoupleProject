<?php


class Vendedor extends Conexion implements acciones
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Mostrar($id = null){
            try {
                if ($id === null){
                    $mostrar = $this->conectar()->prepare("Select * FROM vendedor");
                }else{
                    $mostrar = $this->conectar()->prepare("Select * FROM vendedor where numvend = :id");
                    $mostrar->bindParam(":id",$id);
                }
                $mostrar->execute();
                return $mostrar->fetchAll();
            }catch (Exception $error){
                die($error->getMessage());
            }
    }

    public function Insertar($valores){
        try {
            $sentencia = 'INSERT INTO vendedor VALUES (?,?,?,?,?,?,?)';
            $insercion = $this->conectar()->prepare($sentencia);
            $insercion->execute($valores);
        }catch (Exception $error){
            echo $sentencia;
            die($error->getMessage());
        }
    }

    public function Eliminar($id)
    {
        $suministro = new Suministra();
        $suministro->Eliminar($id);

        $pedido = new Pedido();
        $pedido->Eliminar($id);

        $eliminar = $this->conectar()->prepare("DELETE FROM vendedor WHERE numvend = :codigo");
        $eliminar->bindParam(':codigo', $id);
        $eliminar->execute();
    }

}