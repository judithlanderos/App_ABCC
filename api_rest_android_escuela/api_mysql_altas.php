<?php
    include_once('../database/conexion_bd_escuela.php');
    
    $con = new ConexionBDEscuela();
    $conexion = $con->getConexion();

    //var_dump($conexion); respuesta de si funciona la conexion 
    //Metodos HTTP de peticion al servidor: POST, GET, PUT, PATCH, DELETE
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Recibir la peticion(REQUEST) con JSON a traves de HTTP
        $cadenaJSON = file_get_contents('php://input');

        if($cadenaJSON==false){
            echo "No hay cadena JSON";
        } else{
            $datos_alumno = json_decode($cadenaJSON, true);
            
            $nc = $datos_alumno['nc'];
            $n = $datos_alumno['n']; //nombre
            $primer_ap = $datos_alumno['primer_ap']; 
            $segundo_ap = $datos_alumno['segundo_ap'];
            $edad = $datos_alumno['edad'];  
            $semestre = $datos_alumno['semestre'];
            $carrera = $datos_alumno['carrera'];

            //PRUEBA SIN  MVC Y SIN POO
            $sql = "INSERT INTO alumnos VALUES('$nc', '$n', '$primer_ap', '$segundo_ap', $edad, $semestre, '$carrera')";
            $res = mysqli_query($conexion, $sql);

            //configurar la respuesta JSON (RESPONSE)
            $respuesta = array();
            if($res){
                $respuesta['alta'] = 'exito';
            } else{
                $respuesta['alta'] = 'error';
            }
                $respuestaJSON = json_encode($respuesta);
                echo $respuestaJSON;

        }
    }


?>