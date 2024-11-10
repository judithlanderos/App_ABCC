<?php
include_once('controller_alumno.php');

$num_control = isset($_POST['caja_num_control']) ? $_POST['caja_num_control'] : null;


$datos_correctos = false;

if ($num_control !== null && !empty($num_control) && is_numeric($num_control)) {
    $datos_correctos = true;
}

if ($datos_correctos) {
    $alumnoDAO = new AlumnoDAO();
    $alumno = $alumnoDAO->consultarAlumno($num_control);
    if ($alumno) {
        echo "DATOS DEL ALUMNO: " . json_encode($alumno);
    } else {
        echo "NO SE ENCONTRÓ EL REGISTRO.";
    }
} else {
    echo "Por favor, ingresa un número de control válido.";
}
?>
