<?php
include_once('../database/conexion_bd_escuela.php');

$con = new ConexionBDEscuela();
$conexion = $con->getConexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cadenaJSON = file_get_contents('php://input');

    if ($cadenaJSON == false) {
        echo "No hay cadena JSON";
    } else {
        $datos_baja = json_decode($cadenaJSON, true);

        $nc = $datos_baja['nc'] ?? '';
        if ($nc == '') {
            echo json_encode(['baja' => 'error', 'mensaje' => 'Falta número de control']);
        } else {

            $sql = "DELETE FROM alumnos WHERE Num_Control = '$nc'";
            $res = mysqli_query($conexion, $sql);

            $respuesta = array();
            if ($res && mysqli_affected_rows($conexion) > 0) {
                $respuesta['baja'] = 'exito';
            } else {
                $respuesta['baja'] = 'error';
                $respuesta['mensaje'] = 'No se encontró el registro';
            }
            echo json_encode($respuesta);
        }
    }
}


?>