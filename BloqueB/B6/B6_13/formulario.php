<?php include 'includes/header.php'; ?>

<?php
// Inicializar variables
$error = '';
$datos_usuario = [
    'email' => '',
    'edad' => '',
    'newsletter' => ''
];

$sanitize_rules = [
    'email' => FILTER_SANITIZE_EMAIL,
    'edad' => FILTER_SANITIZE_NUMBER_INT,
    'newsletter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS // Para evitar caracteres no deseados
];

// Manejar el envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Filtrar los datos recibidos
    $datos_usuario = filter_var_array($_POST, $sanitize_rules);

    // Validar los datos después de filtrarlos
    if (!filter_var($datos_usuario['email'], FILTER_VALIDATE_EMAIL)) {
        $error = "Por favor, ingresa un correo electrónico válido.";
    } elseif ($datos_usuario['edad'] < 18 || $datos_usuario['edad'] > 120) {
        $error = "Por favor, ingresa una edad válida (entre 18 y 120 años).";
    } else {
        // Mostrar datos saneados y confirmación
        echo "<div class='container'>";
        echo "<h2>Registro Completado</h2>";
        echo "<p>¡Gracias por registrarte para el evento!</p>";
        echo "<p><b>Correo electrónico:</b> " . htmlspecialchars($datos_usuario['email']) . "</p>";
        echo "<p><b>Edad:</b> " . htmlspecialchars($datos_usuario['edad']) . "</p>";
        echo "<p><b>Interesado en recibir boletines:</b> " . (!empty($_POST['newsletter']) ? 'Sí' : 'No') . "</p>";
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

    <form action="registro_evento_filtrado.php" method="POST">
        <p>
            <label for="email">Correo electrónico:</label><br>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($datos_usuario['email']) ?>" required>
        </p>
        <p>
            <label for="edad">Edad:</label><br>
            <input type="number" id="edad" name="edad" value="<?= htmlspecialchars($datos_usuario['edad']) ?>" required>
        </p>
        <p>
            <label>
                <input type="checkbox" name="newsletter" <?= !empty($_POST['newsletter']) ? 'checked' : '' ?>>
                ¿Te gustaría recibir boletines de noticias?
            </label>
        </p>
        <p><input type="submit" value="Registrarse"></p>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
