<?php

?>
<!DOCTYPE html>
    <head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../CSS/styles.css">
        <script src="../JS/inicio.js" defer></script>
        <title>Usuarios y Cookies</title>
    </head>

    <header>
        <h1>Bienvenido a la página de gestion de usuarios</h1>
    </header>

<body id="body" >
<h1>Crear usuario</h1>
        <form method="POST" action="create_user.php">
            <label for="createName">Nombre:</label>
            <input type="text" id="createName" name="createName" required>

            <label for="createEmail">Correo electrónico:</label>
            <input type="email" id="createEmail" name="createEmail" required>
            <br>
            <button type="submit">Crear Usuario</button>
        </form>

        <h1>Actualizar usuario</h1>
        <form method="POST" action="update_user.php">
            <label for="updateId">ID del usuario:</label>
            <input type="text" id="updateId" name="updateId" required>

            <label for="updateName">Nuevo nombre:</label>
            <input type="text" id="updateName" name="updateName" required>

            <label for="updateEmail">Nuevo correo electrónico:</label>
            <input type="email" id="updateEmail" name="updateEmail" required>
            <br>
            <button type="submit">Actualizar Usuario</button>
        </form>

        <h1>Leer usuarios</h1>
        <form method="POST" action="read_user.php">
            <button type="submit">Leer Usuarios</button>
        </form>

        <h1>Eliminar usuario</h1>
        <form method="POST" action="delete_user.php">
            <label for="deleteId">ID del usuario:</label>
            <input type="text" id="deleteId" name="deleteId" required>
            <br>        
            <button type="submit">Eliminar Usuario</button>
        </form>

        <a href="inicio.php">Volver a inicio</a>

</body>
</html>