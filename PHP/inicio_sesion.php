<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['sesionName'] ?? null;
    $email = $_POST['sesionEmail'] ?? null;


    $users = json_decode(file_get_contents('../DATA/users.json'), true) ?? [];
    $admin = null;
    $user = null;
    $tipoUsuario = null;
    foreach ($users as $user) {
        if ($user['role'] == 'admin') {
            $admin = $user;
            break;
        }

    }

    if ($name && $email) {
        if ($name == $admin['name'] && $email == $admin['email'] && $admin['role'] == 'admin') {
            $_SESSION['admin'] = $admin;
            if ($admin['role'] == 'admin') {
                $tipoUsuario = 'admin';
            }

        } else if ($name && $email) {
            foreach ($users as $user) {
                if ($user['name'] == $name && $user['email'] == $email && $user['role'] == 'user') {
                    $_SESSION['user'] = $user;
                    $tipoUsuario = 'user';
                    break;
                }
            }

        } else {
            echo "<p>Usuario no encontrado.</p>";
        }
    } else {
        echo "<p>Por favor, complete todos los campos.</p>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../CSS/styles_sesion.css">
    <script src="../JS/inicio.js" defer></script>
</head>

<body id="body">

    <header class="bg-primary text-white text-center py-3 ">
        <h1>Dashboard</h1>
    </header>

    <div class="container my-4 ">
        <h3>
            <?php 
            if ($tipoUsuario == 'admin') {
                echo "Bienvenido " . $_SESSION['admin']['name'] . " (Admin)";
            } else {
                if ($tipoUsuario == 'user') {
                    echo "Bienvenido " . $_SESSION['user']['name'] . " (User)";
                }
            } 
            ?>
        </h3>

        <div class="row">
            <?php if ($tipoUsuario == 'user') { ?>
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-header">Información de Usuario</h5>
                        <div class="card-body">
                            <h5 class="card-title">Detalles de Usuario</h5>
                            <p class="card-text">Id: <?php echo $_SESSION['user']['id']; ?></p>
                            <p class="card-text">Nombre: <?php echo $_SESSION['user']['name']; ?></p>
                            <p class="card-text">Email: <?php echo $_SESSION['user']['email']; ?></p>
                            <p class="card-text">Role: <?php echo $_SESSION['user']['role']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($tipoUsuario == 'admin') { ?>
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-header">Información de Administrador</h5>
                        <div class="card-body">
                            <h5 class="card-title">Detalles de Administrador</h5>
                            <p class="card-text">Id: <?php echo $_SESSION['admin']['id']; ?></p>
                            <p class="card-text">Nombre: <?php echo $_SESSION['admin']['name']; ?></p>
                            <p class="card-text">Email: <?php echo $_SESSION['admin']['email']; ?></p>
                            <p class="card-text">Role: <?php echo $_SESSION['admin']['role']; ?></p>
                            <a href="gestion_usuarios.php" class="btn btn-primary">Gestionar usuarios</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <a href="ex1_music_form.php" class="btn btn-secondary">Recomendaciones Musicales</a>
                    <a href="inicio.php" class="btn btn-outline-primary">Volver a Inicio</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
