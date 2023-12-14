<?php

class Conexion
{
    private $pdo;
    private $host;
    private $nombreBD;
    private $usuario;
    private $password;

    public function __construct()
    {
        $this->host = "localhost";
        $this->nombreBD = "proveedores";
        $this->usuario = "root";
        $this->password = "";
    }

    public function conectar(){
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->nombreBD;charset=utf8",
                $this->usuario,$this->password);
            return $this->pdo;
        }catch (\Exception $e){
            print " <p class=\"aviso\">Error: No puede conectarse con
            la base de datos. {$e->getMessage()}</p>\n";
            exit;
        }
    }

}