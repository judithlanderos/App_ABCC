<?php
include('controller_alumno.php');

// 1. Obtener información de las cajas
$num_control = isset($_POST['caja_num_control']) ? $_POST['caja_num_control'] : null;

// 2. Validar
$datos_correctos = false;

if ($num_control !== null && !empty($num_control) && is_numeric($num_control)) {
    $datos_correctos = true;
}

// 3. (PENDIENTE) validar que no exista previamente
// 4. Enviarlo al controlador
if ($datos_correctos) {
    $alumnoDAO = new AlumnoDAO();
    $res = $alumnoDAO->agregarAlumno($num_control);
    if ($res) {
        echo "REGISTRO AGREGADO CORRECTAMENTE!";
    } else {
        echo "MEJOR ME DEDICO A LAS REDES =(";
    }
} else {
    echo "Por favor, ingresa un número de control válido.";
}

// 5. Insertar en BD un OBJECTO DEL MODELO ALUMNO
?>
