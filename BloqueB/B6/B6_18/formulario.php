<?php
// Inicialización de variables
$sanitizedData = [
    'fullname' => '',
    'email' => '',
    'phone' => '',
    'event_type' => '',
    'terms' => false
];
$errors = [
    'fullname' => '',
    'email' => '',
    'phone' => '',
    'event_type' => '',
    'terms' => ''
];
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Filtros de validación
    $validation_filters = [
        'fullname' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[A-Za-z\s]{2,50}$/']
        ],
        'email' => FILTER_VALIDATE_EMAIL,
        'phone' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^\d{9,}$/']
        ],
        'event_type' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^(Presencial|Online)$/']
        ],
        'terms' => FILTER_VALIDATE_BOOLEAN
    ];

    // Validar datos
    $sanitizedData = filter_input_array(INPUT_POST, $validation_filters);

    // Crear mensajes de error
    $errors['fullname'] = $sanitizedData['fullname'] ? '' : 'El nombre debe tener entre 2 y 50 caracteres y solo contener letras.';
    $errors['email'] = $sanitizedData['email'] ? '' : 'Debe proporcionar un correo electrónico válido.';
    $errors['phone'] = $sanitizedData['phone'] ? '' : 'El número de teléfono debe contener al menos 9 dígitos.';
    $errors['event_type'] = $sanitizedData['event_type'] ? '' : 'Debe seleccionar un tipo de evento válido.';
    $errors['terms'] = $sanitizedData['terms'] ? '' : 'Debe aceptar los términos y condiciones.';

    // Validar si hay errores
    $invalid = implode('', $errors);

    if ($invalid) {
        $message = 'Por favor corrija los siguientes errores:';
    } else {
        // Saneamiento de datos
        $sanitizedData['fullname'] = filter_var($sanitizedData['fullname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sanitizedData['email'] = filter_var($sanitizedData['email'], FILTER_SANITIZE_EMAIL);
        $message = '¡Gracias! Su registro fue exitoso.';
    }
}
?>

<?php include 'includes/header.php'; ?>

<h1>Formulario de Registro para Eventos</h1>

<!-- Mensajes -->
<p style="color: red;"><?= $message ?></p>

<!-- Mostrar errores -->
<?php if (!empty($errors)): ?>
    <ul style="color: red;">
        <?php foreach ($errors as $field => $error): ?>
            <?php if ($error): ?>
                <li><?= $error ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<!-- Formulario -->
<form action="formulario.php" method="POST">
    <p>
        <label for="fullname">Nombre completo:</label>
        <input type="text" id="fullname" name="fullname" value="<?= htmlspecialchars($sanitizedData['fullname'] ?? '') ?>">
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
        <label for="event_type">Tipo de evento:</label>
        <select id="event_type" name="event_type">
            <option value="">Seleccione</option>
            <option value="Presencial" <?= $sanitizedData['event_type'] === 'Presencial' ? 'selected' : '' ?>>Presencial</option>
            <option value="Online" <?= $sanitizedData['event_type'] === 'Online' ? 'selected' : '' ?>>Online</option>
        </select>
    </p>
    <p>
        <input type="checkbox" id="terms" name="terms" value="true" <?= $sanitizedData['terms'] ? 'checked' : '' ?>>
        <label for="terms">Acepto los términos y condiciones</label>
    </p>
    <p>
        <button type="submit">Registrar</button>
    </p>
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($invalid)): ?>
    <h2>Datos Registrados</h2>
    <p>Nombre completo: <?= $sanitizedData['fullname'] ?></p>
    <p>Correo Electrónico: <?= $sanitizedData['email'] ?></p>
    <p>Teléfono: <?= $sanitizedData['phone'] ?></p>
    <p>Tipo de evento: <?= $sanitizedData['event_type'] ?></p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
