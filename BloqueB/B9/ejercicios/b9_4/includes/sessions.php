<?php
session_start();

// Credenciales simuladas (normalmente estarían en una base de datos)
$email = "empleado@empresa.com";
$password = "123456"; // En producción, usa hash de contraseña

// Verifica si el usuario está autenticado
$logged_in = isset($_SESSION['user_email']);

// Función para iniciar sesión
function login($email) {
    $_SESSION['user_email'] = $email;
}

// Función para cerrar sesión
function logout() {
    session_destroy();
    header('Location: login.php');
    exit;
}

// Función para requerir autenticación
function require_login() {
    global $logged_in;
    if (!$logged_in) {
        header('Location: login.php');
        exit;
    }
}
?>
