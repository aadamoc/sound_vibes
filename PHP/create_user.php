<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['createName'] ?? null;
    $email = $_POST['createEmail'] ?? null;

    if ($name && $email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $newUser = createUser($name, $email);
            echo "<p>Usuario creado con éxito: " . json_encode($newUser) . "</p>";
        } else {
            echo "<p>El correo electrónico no tiene un formato válido.</p>";
        }
    } else {
        echo "<p>Por favor, complete todos los campos.</p>";
    }
}

function createUser($name, $email)
{
    $users = json_decode(file_get_contents('../DATA/users.json'), true) ?? [];

    $newUser = [
        "id" => uniqid(),
        "name" => $name,
        "email" => $email,
        "role" => "user"
    ];

    $users[] = $newUser;

    file_put_contents('../DATA/users.json', json_encode($users, JSON_PRETTY_PRINT));

    return $newUser;
}
?>
