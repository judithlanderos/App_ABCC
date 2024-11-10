<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card p-4 my-5">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4 text-primary">Registrarse</h3>
                    <form action="../controllers/registrar_usuario.php" method="POST">
                        
                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de usuario</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Ingresa tu nombre de usuario" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <a href="../pages/login.php" class="text-secondary">¿Ya tienes cuenta? Inicia sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
