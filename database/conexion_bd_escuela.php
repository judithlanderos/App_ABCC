<?php

class ConexionBDEscuela{
    private $conexion;
    private $host = "localhost:3306";
    private $usuario = "judith";
    private $password = "judilth@3";
    private $bd = "BD_Escuela_web_2024";

    public function __construct(){
        $this->conexion = mysqli_connect($this->host, $this->usuario, $this->password, $this->bd);

        if(!$this->conexion)
        die("Error en la conexion a la BD" . mysqli_connect_error());
    
    }

    public function getConexion(){
        return $this->conexion;
    }

}

?>