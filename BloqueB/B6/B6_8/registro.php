<?php include 'includes/header.php'; ?>

<?php
// Manejar el envío del formulario con el método GET
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
    $nombre = $_GET['nombre'] ?? '';
    $apellido = $_GET['apellido'] ?? '';
    $edad = $_GET['edad'] ?? '';
    $posicion = $_GET['posicion'] ?? '';
    $email = $_GET['email'] ?? '';
    $telefono = $_GET['telefono'] ?? '';

    echo "<h2>Registro confirmado</h2>";
    echo "<p>Gracias por registrarte, <b>{$nombre} {$apellido}</b>!</p>";
    echo "<p>Edad: {$edad}</p>";
    echo "<p>Posición: {$posicion}</p>";
    echo "<p>Email: {$email}</p>";
    echo "<p>Teléfono: {$telefono}</p>";
    exit;
}
?>

<h1>Formulario de Registro para el Club de Fútbol</h1>
<form action="registro.php" method="GET">
  <p>Nombre: <input type="text" name="nombre" required></p>
  <p>Apellido: <input type="text" name="apellido" required></p>
  <p>Edad: <input type="number" name="edad" required min="5" max="50"></p>
  <p>Posición:
    <select name="posicion" required>
      <option value="Portero">Portero</option>
      <option value="Defensa">Defensa</option>
      <option value="Centrocampista">Centrocampista</option>
      <option value="Delantero">Delantero</option>
    </select>
  </p>
  <p>Email: <input type="email" name="email" required></p>
  <p>Teléfono: <input type="tel" name="telefono" required></p>
  <p><input type="submit" value="Registrar"></p>
</form>

<?php include 'includes/footer.php'; ?>

