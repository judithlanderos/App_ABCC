<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bajas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f8fb;
        }
        
        h3 {
            color: #003366;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #0073e6;
            color: #ffffff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f7fc;
        }

        tr:hover {
            background-color: #d0e4f7;
        }
        .btn {
            padding: 8px 12px;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-edit {
            background-color: #6c757d; 
        }

        .btn-delete {
            background-color: #dc3545; 
        }

        .btn-edit:hover {
            background-color: #5a6268;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
      
    </style>
</head>
<body>

    <?php
    require_once('menu_principal.php');
    ?>
    <h3>Listado de ALUMNOS</h3>

    <?php
    include('../controllers/controller_alumno.php');
    $alumnoDAO = new AlumnoDAO();
    $datos = $alumnoDAO->mostrarAlumnos('x');
    //var_dump($datos);
    
    if(mysqli_num_rows($datos)>0){
        echo '<table>';
        echo '<thead>  
                <tr>
                    <th> Num Control </th>
                    <th> Nombre </th>
                    <th> Primer Ap </th>
                    <th> Segundo Ap </th>
                    <th> Edad </th>
                    <th> Semestre </th>
                    <th> Carrera </th>
                    <th> ACCIONES </th>
                </tr>
            </thead>';

            //echo '<tr> <td> 1Luke </td> </tr>';
           // while($fila = mysqli_fetch_array($datos))
           while($fila = mysqli_fetch_assoc($datos)){
            printf(
                "<tr> 
                <td>".$fila['Num_Control']." </td>
                <td>".$fila['Nombre']." </td> 
                <td>".$fila['Primer_Ap']." </td> 
                <td>".$fila['Segundo_Ap']." </td> 
                <td>".$fila['Edad']." </td>
                <td>".$fila['Semestre']." </td> 
                <td>".$fila['Carrera']." </td> 
                <td>  
                    <a href='../pages/cambios.php?nc=%s' class='btn btn-edit' >Editar</a>
                     <a href='../controllers/procesar_bajas.php?nc=%s' class='btn btn-delete'>Eliminar</a>
                </td>
                </tr>"
                , $fila['Num_Control'],
                $fila['Num_Control']    
              );
           }

        echo '</table>';

    }else
    echo "TABLA VACIA";

    ?>


</body>
</html>