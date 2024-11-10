<?php
include_once('../controllers/controller_alumno.php');  
    $alumnoDAO = new AlumnoDAO();

if (isset($_POST['Num_Control'], $_POST['nombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['edad'], $_POST['semestre'], $_POST['carrera'])) {

    $num_control = $_POST['Num_Control'];
    $nombre = $_POST['nombre'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];
    $edad = $_POST['edad'];
    $semestre = $_POST['semestre'];
    $carrera = $_POST['carrera'];


    try {
        $resultado = $alumnoDAO->modificarAlumno($num_control, $nombre, $primerApellido, $segundoApellido, $edad, $semestre, $carrera);

        if ($resultado) {
            header('Location: ../pages/cambios.php');
            exit();
         } else {
            echo "Error al modificar el registro.";
        }
    }  catch (Exception $e) {
        echo "Error al modificar el registro: " . $e->getMessage();
    }
} else {
    echo "Datos incompletos. Por favor, verifica el formulario.";
}
?>