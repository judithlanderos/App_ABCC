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
            $consulta_filtros = json_decode($cadenaJSON, true);
            
            $filtro_nc = $consulta_filtros['filtro_nc'] ?? '';
            $filtro_n = $consulta_filtros['filtro_n'] ?? ''; //nombre


            //PRUEBA SIN  MVC Y SIN POO
            //$sql = "SELECT * FROM alumnos";
            $sql = "SELECT * FROM alumnos WHERE 1=1"; 
            if ($filtro_nc != '') {
                $sql .= " AND Num_Control = '$filtro_nc'"; 
            }
            if ($filtro_n != '') {
                $sql .= " AND Nombre LIKE '%$filtro_n%'"; 
            }
            echo "Consulta SQL: " . $sql ; 

            $res = mysqli_query($conexion, $sql);

            //configurar la respuesta JSON (RESPONSE)
            $respuesta['alumnos'] = array();

            if($res){
                
                while($fila = mysqli_fetch_assoc($res)){
                    $alumno = array();
                    $alumno['nc'] = $fila['Num_Control'];
                    $alumno['n'] = $fila['Nombre'];
                    $alumno['primer_ap'] = $fila['Primer_Ap']; 
                    $alumno['segundo_ap'] = $fila['Segundo_Ap']; 
                    $alumno['edad'] = $fila['Edad'];
                    $alumno['semestre'] = $fila['Semestre']; 
                    $alumno['carrera'] = $fila['Carrera']; 
                    array_push($respuesta['alumnos'], $alumno);
                }

                $respuesta['consulta'] = 'exito';
            } else{
                $respuesta['consulta'] = 'no hay registros';
            }
                $respuestaJSON = json_encode($respuesta);
                echo $respuestaJSON;

        }
    }


?>