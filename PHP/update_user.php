<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario
    $id = $_POST['updateId'] ?? null;
    $name = $_POST['updateName'] ?? null;
    $email = $_POST['updateEmail'] ?? null;

    if ($id && $name && $email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            updateUser($id, $name, $email);
        } else {
            echo "<p>El correo electrónico no tiene un formato válido.</p>";
        }
    } else {
        echo "<p>Por favor, complete todos los campos.</p>";
    }
}

function updateUser($id, $newName, $newEmail)
{
    $users = json_decode(file_get_contents('../DATA/users.json'), true) ??
        [];
    $userIndex = array_search($id, array_column($users, 'id'));
    if ($userIndex !== false) {
        $users[$userIndex]['name'] = $newName;
        $users[$userIndex]['email'] = $newEmail;
        file_put_contents('../DATA/users.json', json_encode(
            $users,
            JSON_PRETTY_PRINT
        ));
        echo "Usuario actualizado.";
    } else {
        echo "Usuario no encontrado.";
    }

    
}


?>