<?php


class Pedido extends Conexion implements acciones
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Mostrar(){
        try {
            $mostrar = $this->conectar()->prepare("Select * FROM pedido");
            $mostrar->execute();
            return $mostrar->fetchAll();
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

    public function Insertar($valores){
        try {
            $sentencia = 'INSERT INTO pedido VALUES (?,?,?)';
            $insercion = $this->conectar()->prepare($sentencia);
            $insercion->execute($valores);
        }catch (Exception $error){
            die($error->getMessage());
        }
    }

    public function Eliminar($id)
    {
        $linpedido = new Linped();


        $numpedidos = $this->conectar()->prepare("Select numpedido from pedido where numvend = :id");
        $numpedidos->bindParam(':id', $id);
        $numpedidos->execute();
        $numpedidos = $numpedidos->fetchAll();

        foreach ($numpedidos as $numpedido){
                $linpedido->Eliminar($numpedido['numpedido']);
        }


        $eliminar = $this->conectar()->prepare("DELETE FROM pedido WHERE numpedido = :codigo");
        $eliminar->bindParam(':codigo', $id);
        $eliminar->execute();
    }

}