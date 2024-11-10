<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require_once('menu_principal.php');
    ?>
    <title>Consulta de Alumnos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f8fb;
        }
        
        h3 {
            color: #003366;
            text-align: center;
        }
        .navbar a {
        color: #0073e6;  
        text-decoration: none;  
        padding: 10px;
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

        .btn-search {
            background-color: #28a745; 
        }

        .btn-search:hover {
            background-color: #218838;
        }

        .btn-reset {
            background-color: #ffc107; 
        }

        .btn-reset:hover {
            background-color: #e0a800;
        }

        .container {
            max-width: 800px;
            background-color: #0073e6;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            border-radius: 8px;
        }
        .form-container {
            margin-bottom: 20px;
        }
</style>
</head>
<body>

<div class="container">
        <h3>Consulta de Alumnos</h3>

        <form action="consultas.php" method="GET" class="form-container">
            <label for="caja_num_control" class="form-label">Número de Control</label>
            <input type="text" class="form-control" id="caja_num_control" name="caja_num_control" placeholder="Buscar por número de control">
            <button type="submit" class="btn btn-search mt-4">Buscar</button>
            <a href="consultas.php" class="btn btn-reset mt-4">Resetear</a>
        </form>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Número de Control</th>
                        <th>Nombre</th>
                        <th>Primer Apellido</th>
                        <th>Segundo Apellido</th>
                        <th>Edad</th>
                        <th>Semestre</th>
                        <th>Carrera</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    include_once('../controllers/controller_alumno.php');
                    $alumnoDAO = new AlumnoDAO();

                    $num_control = isset($_GET['caja_num_control']) ? $_GET['caja_num_control'] : null;

                    if ($num_control !== null && !empty($num_control)) {
                        $alumnos = $alumnoDAO->obtenerTodosAlumnos($num_control);
                    } else {
                        $alumnos = $alumnoDAO->obtenerTodosAlumnos();
                    }
                    
                    
                    if ($alumnos) {
                        foreach ($alumnos as $alumno) {
                            if ($alumno) { 
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($alumno['Num_Control']) . "</td>";
                                echo "<td>" . htmlspecialchars($alumno['Nombre']) . "</td>";
                                echo "<td>" . htmlspecialchars($alumno['Primer_Ap']) . "</td>";
                                echo "<td>" . htmlspecialchars($alumno['Segundo_Ap']) . "</td>";
                                echo "<td>" . htmlspecialchars($alumno['Edad']) . "</td>";
                                echo "<td>" . htmlspecialchars($alumno['Semestre']) . "</td>";
                                echo "<td>" . htmlspecialchars($alumno['Carrera']) . "</td>";
                                echo "</tr>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No se encontraron registros.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>
