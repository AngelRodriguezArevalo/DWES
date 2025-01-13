<?php include 'includes/header.php'; ?>

<?php
// Inicializar variables
$error = '';
$email = '';
$edad = '';
$newsletter = '';

// Manejar el envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $edad = trim($_POST['edad'] ?? '');
    $newsletter = isset($_POST['newsletter']) ? 'Sí' : 'No';

    // Validar correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Por favor, ingresa un correo electrónico válido.";
    }
    // Validar edad (debe ser un número entre 18 y 120)
    elseif (!is_numeric($edad) || $edad < 18 || $edad > 120) {
        $error = "Por favor, ingresa una edad válida (entre 18 y 120 años).";
    }
    // Si no hay errores, mostrar confirmación
    else {
        echo "<div class='container'>";
        echo "<h2>Registro Completado</h2>";
        echo "<p>¡Gracias por registrarte para el evento!</p>";
        echo "<p><b>Correo electrónico:</b> " . htmlspecialchars($email) . "</p>";
        echo "<p><b>Edad:</b> " . htmlspecialchars($edad) . "</p>";
        echo "<p><b>Interesado en recibir boletines:</b> " . htmlspecialchars($newsletter) . "</p>";
        echo "</div>";
        include 'includes/footer.php';
        exit;
    }
}
?>

<div class="container">
    <h2>Formulario de Registro de Evento</h2>

    <!-- Mostrar mensaje de error si existe -->
    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="formulario.php" method="POST">
        <p>
            <label for="email">Correo electrónico:</label><br>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
        </p>
        <p>
            <label for="edad">Edad:</label><br>
            <input type="number" id="edad" name="edad" value="<?= htmlspecialchars($edad) ?>" required>
        </p>
        <p>
            <label>
                <input type="checkbox" name="newsletter" <?= $newsletter === 'Sí' ? 'checked' : '' ?>>
                ¿Te gustaría recibir boletines de noticias?
            </label>
        </p>
        <p><input type="submit" value="Registrarse"></p>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
