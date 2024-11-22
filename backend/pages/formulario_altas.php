<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Alumnos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>
<?php require_once('menu_principal.php'); ?>


<!--
?php
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo '<div class="alert alert-success" role="alert">Registro agregado correctamente.</div>';
} elseif (isset($_GET['status']) && $_GET['status'] == 'error') {
    echo '<div class="alert alert-danger" role="alert">Error al agregar el registro.</div>';
}
?
-->

<div class="alert alert-warning alert-dismissible fade show" role="alert"
    style="display: <?php echo (isset($_SESSION['insercion_correcta']) && $_SESSION['insercion_correcta']) ? 'block' : 'none'; ?>;">
    Registro agregado CORRECTAMENTE.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div>
    <?php echo (isset($_SESSION['error_validacion'])) ?'ERROR' : ''?>
</div>

<div class="form-container">
    <form action="../controllers/procesar_altas.php" method="post" class="row g-3">
        <div class="col-md-6">
            <label for="caja_num_control" class="form-label">Número de Control</label>
            <input type="text" class="form-control" id="caja_num_control" name="caja_num_control" placeholder="Solo números" 
            value="<?php echo isset($_SESSION['nc']) ? $_SESSION['nc'] :'' ?>"
            maxlength="10" required>
            <div style="color:red;">
                <?php echo (isset($_SESSION['nc'])) ?'* Solo numeros!!! ' : '' ?>
            </div>
        </div>
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="caja_nombre" name="caja_nombre" placeholder="Solo letras" 
            value="<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] :'' ?>"
            maxlength="50" required>

        </div>
        <div class="col-md-6">
            <label for="primerApellido" class="form-label">Primer Apellido</label>
            <input type="text" class="form-control" id="primerApellido" name="primerApellido" placeholder="Solo letras" maxlength="50" required>
        </div>
        <div class="col-md-6">
            <label for="segundoApellido" class="form-label">Segundo Apellido</label>
            <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" placeholder="Solo letras" maxlength="50">
        </div>
        <div class="col-md-4">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad" min="1" max="120" required>
        </div>
        <div class="col-md-4">
            <label for="semestre" class="form-label">Semestre</label>
            <input type="number" class="form-control" id="semestre" name="semestre" min="1" max="12" required>
        </div>
        <div class="col-md-4">
            <label for="carrera" class="form-label">Carrera</label>
            <input type="text" class="form-control" id="carrera" name="carrera" placeholder="Solo letras" maxlength="50" required>
        </div>
        <div class="col-12 button-container">
            <button type="submit" class="btn-agregar">AGREGAR</button>
        </div>
    </form>
</div>

</body>
</html>

<?php
unset($_SESSION['insercion_correcta']);
unset($_SESSION['error_validacion']);

unset($_SESSION['nc']);
unset($_SESSION['nombre']);

?>