<?php include 'includes/header.php'; ?>

<?php
// Inicializar variables
$error = '';
$optativaSeleccionada = '';

// Manejar el envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $optativaSeleccionada = $_POST['optativa'] ?? '';

    // Validar que se haya seleccionado una asignatura
    if (empty($optativaSeleccionada)) {
        $error = 'Por favor, selecciona una asignatura optativa.';
    } else {
        // Mostrar confirmación y finalizar el script
        echo "<h2>Asignatura seleccionada</h2>";
        echo "<p>Has elegido la asignatura: <b>{$optativaSeleccionada}</b>.</p>";
        exit;
    }
}
?>

<h1>Formulario de Selección de Asignatura Optativa</h1>

<!-- Mostrar mensaje de error si existe -->
<?php if ($error): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form action="optativas.php" method="POST">
    <p>Por favor, selecciona una asignatura optativa:</p>
    <select name="optativa">
        <option value="">-- Selecciona una asignatura --</option>
        <option value="Matemáticas" <?= $optativaSeleccionada === 'Matemáticas' ? 'selected' : '' ?>>Matemáticas</option>
        <option value="Física" <?= $optativaSeleccionada === 'Física' ? 'selected' : '' ?>>Física</option>
        <option value="Historia" <?= $optativaSeleccionada === 'Historia' ? 'selected' : '' ?>>Historia</option>
        <option value="Arte" <?= $optativaSeleccionada === 'Arte' ? 'selected' : '' ?>>Arte</option>
    </select>
    <p><input type="submit" value="Enviar"></p>
</form>

<?php include 'includes/footer.php'; ?>


