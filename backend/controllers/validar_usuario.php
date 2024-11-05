<?php

echo "LOGIN";

$usuario = $_POST['username'];
$password = $_POST['password'];

echo $usuario;
echo $password;

//Proceso de validacion
//Proceso de VERIFICACION de U y P en BD
include_once('../../database/conexion_bd_usuarios.php');

$con = new ConexionBDUsuarios();
$conexion = $con->getConexion();
var_dump($conexion);

if($conexion){
    //$sql = "SELECT * FROM usuarios WHERE Nombre_Usuario='$usuario' AND Password='$password'";
    //Cifrado de contrasena sha1     
    $u_cifrado = sha1($usuario);
    $p_cifrado = sha1($password);

    $sql = "SELECT * FROM usuarios WHERE Nombre_Usuario='$u_cifrado' AND Password='$p_cifrado'";

    $res = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($res)==1){
        //echo "Usuario ENCONTRADO";
        session_start();

        //echo session_id();

        $_SESSION['valida'] = true;
        $_SESSION['usuario'] = $usuario;

        header('location: ../pages/menu_principal.php');
    } else{
        echo "NO encontrado";
    }

}else 
echo "Error en la conexion";
?>