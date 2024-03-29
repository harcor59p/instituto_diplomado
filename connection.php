<?php

class connection
{
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasena = "";
    private $conexion;

    public function __construct()
    {
        try
        {
            $this->conexion = new PDO("mysql:host=".$this->servidor.";dbname=instituto01",$this->usuario,$this->contrasena);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $error)
        {
            return "Conexion fallo" . $error;
        }
    }

    public function ejecutar($sql)
    {
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    public function consultar($sql)
    {
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

}

?>