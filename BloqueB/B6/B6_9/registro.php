<?php include 'includes/header.php'; ?>

<?php
// Inicializar variables para evitar errores al cargar la página
$error = '';
$nombre = $apellido = $edad = $posicion = $email = $telefono = '';

// Manejar el envío del formulario con el método GET
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
    $nombre = $_GET['nombre'] ?? '';
    $apellido = $_GET['apellido'] ?? '';
    $edad = $_GET['edad'] ?? '';
    $posicion = $_GET['posicion'] ?? '';
    $email = $_GET['email'] ?? '';
    $telefono = $_GET['telefono'] ?? '';

    // Verificar que la edad esté en el rango [8-16]
    if (!is_numeric($edad) || $edad < 8 || $edad > 16) {
        $error = 'La edad debe estar en el rango de 8 a 16 años.';
    } else {
        // Si todo está correcto, mostrar confirmación y finalizar el script
        echo "<h2>Registro confirmado</h2>";
        echo "<p>Gracias por registrarte, <b>{$nombre} {$apellido}</b>!</p>";
        echo "<p>Edad: {$edad}</p>";
        echo "<p>Posición: {$posicion}</p>";
        echo "<p>Email: {$email}</p>";
        echo "<p>Teléfono: {$telefono}</p>";
        exit;
    }
}
?>

<h1>Formulario de Registro para el Club de Fútbol</h1>

<!-- Mostrar mensaje de error si existe -->
<?php if ($error): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form action="registro.php" method="GET">
  <p>Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required></p>
  <p>Apellido: <input type="text" name="apellido" value="<?= htmlspecialchars($apellido) ?>" required></p>
  <p>Edad: <input type="number" name="edad" value="<?= htmlspecialchars($edad) ?>" required min="8" max="16"></p>
  <p>Posición:
    <select name="posicion" required>
      <option value="Portero" <?= $posicion === 'Portero' ? 'selected' : '' ?>>Portero</option>
      <option value="Defensa" <?= $posicion === 'Defensa' ? 'selected' : '' ?>>Defensa</option>
      <option value="Centrocampista" <?= $posicion === 'Centrocampista' ? 'selected' : '' ?>>Centrocampista</option>
      <option value="Delantero" <?= $posicion === 'Delantero' ? 'selected' : '' ?>>Delantero</option>
    </select>
  </p>
  <p>Email: <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required></p>
  <p>Teléfono: <input type="tel" name="telefono" value="<?= htmlspecialchars($telefono) ?>" required></p>
  <p><input type="submit" value="Registrar"></p>
</form>

<?php include 'includes/footer.php'; ?>
