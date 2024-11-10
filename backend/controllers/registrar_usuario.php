<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Formulario enviado";
    $usuario = $_POST['username'];
    $password = $_POST['password'];

    include_once('../../database/conexion_bd_usuarios.php');
    $con = new ConexionBDUsuarios();
    $conexion = $con->getConexion();
    var_dump($conexion);

    if ($conexion) {
        $u_cifrado = sha1($usuario);
        $p_cifrado = sha1($password);

        $sql_check = "SELECT * FROM usuarios WHERE Nombre_Usuario = '$u_cifrado'";
        $result = mysqli_query($conexion, $sql_check);

        if (mysqli_num_rows($result) > 0) {
            echo "El nombre de usuario ya está registrado.";
        } else {
            $sql = "INSERT INTO usuarios (Nombre_Usuario, Password) VALUES ('$u_cifrado', '$p_cifrado')";
            $_SESSION['valida'] = true;
            $_SESSION['usuario'] = $usuario;

            if (mysqli_query($conexion, $sql)) {
                echo "Registro exitoso. Ahora puedes iniciar sesión.";
                // Asegúrate de redirigir correctamente con exit() después del header
                header('Location: ../pages/menu_principal.php');
                exit();  // Detiene la ejecución del script después de la redirección
            } else {
                echo "Error al registrar el usuario: " . mysqli_error($conexion); 
            }
        }
    } else {
        echo "Error en la conexión a la base de datos: " . mysqli_connect_error(); 
    }
}
?>
