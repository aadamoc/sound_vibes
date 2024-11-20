<?php
session_start();

function readUsers()
{
    return json_decode(file_get_contents('../DATA/users.json'), true) ?? [];
}
$users = readUsers();
foreach ($users as $user) {
    echo "ID: " . $user['id'] . " - Nombre: " . $user['name'] . " -
   Email: " . $user['email'] . " - Rol: " . $user['role'] . "<br>";
}
?>