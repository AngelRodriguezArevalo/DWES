<?php
$counter = $_COOKIE['counter'] ?? 0;
$counter++;
setcookie('counter', $counter);

$message = "Page views: $counter";

// Verificar si el nombre del usuario ya está en la cookie
$user_name = $_COOKIE['user_name'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])) {
    $user_name = htmlspecialchars($_POST['name']); // Sanitizar entrada
    setcookie('user_name', $user_name); // Guardar en cookie sin tiempo de expiración
    header("Location: welcome.php"); // Recargar para aplicar la cookie
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
</head>
<body>

<h1>Welcome</h1>
<p><?= $message ?></p>

<?php if ($user_name): ?>
    <h2>Bienvenido de nuevo, <?= $user_name ?>!</h2>
    <p><a href="b9_1.php">Actualizar página</a></p>
<?php else: ?>
    <h2>Introduce tu nombre:</h2>
    <form method="POST">
        <input type="text" name="name" required>
        <button type="submit">Guardar nombre</button>
    </form>
<?php endif; ?>

</body>
</html>
