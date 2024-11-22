<?php
include_once('../database/conexion_bd_escuela.php');

$con = new ConexionBDEscuela();
$conexion = $con->getConexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $cadenaJSON = file_get_contents('php://input');

    if ($cadenaJSON == false) {
        echo "No hay cadena JSON";
    } else {
        $datos_cambio = json_decode($cadenaJSON, true);

        $nc = $datos_cambio['nc'] ?? '';
        $n = $datos_cambio['n'] ?? '';
        $primer_ap = $datos_cambio['primer_ap'] ?? '';
        $segundo_ap = $datos_cambio['segundo_ap'] ?? '';
        $edad = $datos_cambio['edad'] ?? null;
        $semestre = $datos_cambio['semestre'] ?? null;
        $carrera = $datos_cambio['carrera'] ?? '';


        if ($nc == '') {
            echo json_encode(['cambio' => 'error', 'mensaje' => 'Falta número de control']);
        } else {

            $sql = "UPDATE alumnos SET 
                    Nombre = '$n',
                    Primer_Ap = '$primer_ap',
                    Segundo_Ap = '$segundo_ap',
                    Edad = $edad,
                    Semestre = $semestre,
                    Carrera = '$carrera'
                    WHERE Num_Control = '$nc'";

            $res = mysqli_query($conexion, $sql);


            $respuesta = array();
            if ($res && mysqli_affected_rows($conexion) > 0) {
                $respuesta['cambio'] = 'exito';
            } else {
                $respuesta['cambio'] = 'error';
                $respuesta['mensaje'] = 'No se actualizó el registro (puede que no exista o los datos sean los mismos)';
            }
            echo json_encode($respuesta);
        }
    }
}
?>
