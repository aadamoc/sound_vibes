<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el ID del usuario a eliminar
    $id = $_POST['deleteId'] ?? null;
    if ($id) {
        deleteUser($id);
    } else {
        echo "<p>Por favor, proporcione un ID de usuario.</p>";
    }
}

function deleteUser($id)
{
    $users = json_decode(file_get_contents('../DATA/users.json'), true) ?? [];
    $userIndex = array_search($id, array_column($users, 'id'));
    if ($userIndex !== false) {
        unset($users[$userIndex]);
        $users = array_values($users);
        file_put_contents('../DATA/users.json', json_encode($users, JSON_PRETTY_PRINT));
        echo "Usuario eliminado.";
    } else {
        echo "Usuario no encontrado.";
    }
}

?>