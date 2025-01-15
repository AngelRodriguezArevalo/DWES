<?php
$sanitizedData = [];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Filtros de saneamiento
    $filters = [
        'name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
        'phone' => FILTER_SANITIZE_NUMBER_INT,
        'message' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
    ];

    // Saneamos los datos del formulario
    $sanitizedData = filter_input_array(INPUT_POST, $filters);

    // Validación adicional
    if (empty($sanitizedData['name'])) {
        $errors['name'] = "El nombre es obligatorio.";
    }

    if (!filter_var($sanitizedData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "El correo electrónico no es válido.";
    }

    if (!preg_match('/^\d{10}$/', $sanitizedData['phone'])) {
        $errors['phone'] = "El número de teléfono debe tener 10 dígitos.";
    }

    if (empty($sanitizedData['message'])) {
        $errors['message'] = "El mensaje no puede estar vacío.";
    }
}
?>

<?php include 'includes/header.php'; ?>

<h1>Formulario de Contacto</h1>

<!-- Mostrar errores -->
<?php if (!empty($errors)): ?>
    <ul style="color: red;">
        <?php foreach ($errors as $field => $error): ?>
            <li><?= ucfirst($field) ?>: <?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<!-- Formulario de contacto -->
<form action="formulario.php" method="POST">
    <p>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($sanitizedData['name'] ?? '') ?>">
    </p>
    <p>
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($sanitizedData['email'] ?? '') ?>">
    </p>
    <p>
        <label for="phone">Teléfono:</label>
        <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($sanitizedData['phone'] ?? '') ?>">
    </p>
    <p>
        <label for="message">Mensaje:</label><br>
        <textarea id="message" name="message"><?= htmlspecialchars($sanitizedData['message'] ?? '') ?></textarea>
    </p>
    <p>
        <button type="submit">Enviar</button>
    </p>
</form>

<!-- Mostrar datos saneados -->
<?php if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($errors)): ?>
    <h2>Datos Saneados</h2>
    <p>Nombre: <?= $sanitizedData['name'] ?></p>
    <p>Correo Electrónico: <?= $sanitizedData['email'] ?></p>
    <p>Teléfono: <?= $sanitizedData['phone'] ?></p>
    <p>Mensaje: <?= nl2br($sanitizedData['message']) ?></p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>


