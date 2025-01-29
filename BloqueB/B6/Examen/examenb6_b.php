<?php
// Inicializar variables
$error = '';
$nombre = '';
$email = '';
$edad = '';
$tipo = '';
$terms = true;

$esCorrecto = true;

// Manejar el envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $edad = $_POST['edad'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $terms = $_POST['terms'] ?? '';

    // verificar que le nombre tiene entre 2 y 50 caracteres
    if (empty($nombre)){
        $error = 'El nombre es obligatorio y debe tener entre 2 y 50 caracteres.';
        $esCorrecto = false;
    }
    // verificar si el email es válido  
    if (empty($email)){
        $error = $error . 'El email es obligatorio y válido.';
        $esCorrecto = false;
    } 
    // Verificar que la edad esté en el rango [14-120]
    if (!is_numeric($edad) || $edad < 13 || $edad > 120) {
        $error = $error . 'La edad es obligatoria y debe ser mayor a 13 años.';
        $esCorrecto = false;
    } 
    //verificar que se ha seleccionado una opcion de tipo de libro
    if (empty($tipo)){
        $error = $error . 'Debes seleccionar un tipo de libro.';
        $esCorrecto = false;
    }
    // verificar si se han aceptado los términos
    if($terms == false){
        $error = $error . 'Debes aceptar los términos.';
        $esCorrecto = false;
    }
    

    if ($esCorrecto) {
        // Si todo está correcto, mostrar confirmación y finalizar el script
        echo "<h2>Registro confirmado</h2>";
        echo "<p>Gracias por registrarte, <b>{$nombre}</b>!</p>";
        echo "<p>Email: {$email}</p>";
        echo "<p>Edad: {$edad}</p>";
        echo "<p>Tipo de libro: {$tipo}</p>";
        exit;
    }
}
?>

<div class="container">
    <h2>Formulario de Registro de Evento</h2>

    <!-- Mostrar mensaje de error si existe -->
    <?php if ($error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="examenb6_b.php" method="POST">
        <p>Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>"></p>
        <p>Email: <input type="text" name="email" value="<?= htmlspecialchars($email) ?>" ></p>
        <p>Edad: <input type="number" name="edad" value="<?= htmlspecialchars($edad) ?>"></p>
        <p>Tipo de libro:
            <select name="tipo">
            <option value="">Seleccione</option>
            <option value="Físico" <?= $tipo === 'Físico' ? 'selected' : '' ?>>Físico</option>
            <option value="Digital" <?= $tipo === 'Digital' ? 'selected' : '' ?>>Digital</option>
            </select>
        </p>
        <p>
                <input type="checkbox" id="terms" name="terms" value="true" >
                <label for="terms">Acepto los términos y condiciones</label>
            </p>
        <p><input type="submit" value="Registrar"></p>
    </form>
</div>

