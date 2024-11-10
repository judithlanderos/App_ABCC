<?php

include('../../database/conexion_bd_escuela.php');

class AlumnoDAO{

    private $conexion;
     
    public function __construct(){
        $this->conexion = new ConexionBDEscuela();
    }

    // ======================== MÉTODOS ABCC (CRUD) ========================


    // ------------------ MÉTODO DE ALTAS ------------------
    //public function agregarAlumno($alumno) 
    public function agregarAlumno($nc){
        $sql = "INSERT INTO alumnos VALUES('$nc', '1', '1', '1', '1', '1', '1')";
        $res = mysqli_query($this-> conexion->getConexion(), $sql);
        return $res;
    }

    // ------------------ MÉTODO DE BAJAS ------------------
    public function eliminarAlumno($nc){
        $sql = "DELETE FROM alumnos WHERE Num_Control ='$nc' ";
        $res = mysqli_query($this->conexion->getConexion(), $sql);
        return $res;
    }

    // ------------------ MÉTODO DE CAMBIOS ------------------
    public function modificarAlumno($num_control, $nombre, $primerApellido, $segundoApellido, $edad, $semestre, $carrera) {
        $sql = "UPDATE alumnos SET 
                    Nombre = '$nombre', 
                    Primer_Ap = '$primerApellido', 
                    Segundo_Ap = '$segundoApellido', 
                    Edad = $edad, 
                    Semestre = $semestre, 
                    Carrera = '$carrera' 
                WHERE Num_Control = '$num_control'";

            $res = mysqli_query($this->conexion->getConexion(), $sql);

            if (!$res) {
                echo "Error al ejecutar la consulta: " . mysqli_error($this->conexion->getConexion());
            }
        
            return $res;
        }

    // ------------------ MÉTODO DE CONSULTAS ------------------
    public function mostrarAlumnos($filtro){
        $sql = "SELECT * FROM alumnos";
        $res = mysqli_query($this->conexion->getConexion(), $sql);
        return $res;

    }

    public function obtenerTodosAlumnos($num_control = null) {
        $sql = "SELECT * FROM alumnos";
        if ($num_control) {
            $sql .= " WHERE Num_Control = '$num_control'";
        }
        $res = mysqli_query($this->conexion->getConexion(), $sql);
    
        $alumnos = [];
        while ($fila = mysqli_fetch_assoc($res)) {
            $alumnos[] = $fila;
        }
        return $alumnos;
    }

     public function infoAlumnos() {
        $conexion = $this->conexion->getConexion();
        $consulta = "SELECT * FROM alumnos"; 
        $resultado = mysqli_query($conexion, $consulta);
    
        if (!$resultado) {
            die("Error en la consulta: " . mysqli_error($conexion));
        }
    
        return $resultado;
    }
}
?>