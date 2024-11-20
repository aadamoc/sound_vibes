<?php
session_start();

setcookie("user_role", "admin", time() + (86400 * 30), "/"); // Expira en 30 días

if (isset($_COOKIE['user_role'])) {
    echo "Rol de usuario: " . $_COOKIE['user_role'];
} else {
    echo "No se ha configurado un rol de usuario.";
}

setcookie("user_role", "", time() - 3600, "/"); // Expiración en el pasado

?>