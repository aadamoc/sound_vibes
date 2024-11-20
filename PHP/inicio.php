<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/styles.css">
    <script src="../JS/inicio.js" defer></script>
    <title>Usuarios y Cookies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body id="body">
    <header>
        
        <h1>Bienvenido a la página de creación de usuario</h1>
    </header>

    <main>
        

        <h1>Iniciar sesion</h1>
        <form method="POST" action="inicio_sesion.php">
            <label for="Name">Nombre:</label>
            <input type="text" id="sesionName" name="sesionName" required>
            <br>
            <label for="Email">Correo electrónico:</label>
            <input type="email" id="sesionEmail" name="sesionEmail" required>
            <br>

            <button type="submit">Iniciar sesion</button>   
        </form>
    </main>
</body>
</html>
