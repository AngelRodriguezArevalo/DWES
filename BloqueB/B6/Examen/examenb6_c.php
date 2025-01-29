<?php
// Inicialización de variables
$sanitizedData = [
    'fullname' => '',
    'email' => '',
    'age' => '',
    'book_type' => '',
    'terms' => false
];
$errors = [
    'fullname' => '',
    'email' => '',
    'age' => '',
    'book_type' => '',
    'terms' => ''
];
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Filtros de validación
    $validation_filters = [
        'fullname' => [
            'filter' => FILTER_VALIDATE_REGEXP, //filtro para letras de a A a la Z y con un min de 2 caracteres y 50 de max
            'options' => ['regexp' => '/^[A-Za-z\s]{2,50}$/']
        ],
        'email' => FILTER_VALIDATE_EMAIL, //filtro para email
        'age' => [
            'filter' => FILTER_VALIDATE_INT, //filtro para la edad, solo enteros con un rango entre 14 y 120
            'options' => ['min_range' => 14, 'max_range' => 120]
        ],
        'book_type' => [
            'filter' => FILTER_VALIDATE_REGEXP, //filtro con dos opciones
            'options' => ['regexp' => '/^(Fisico|Digital)$/']
        ],
        'terms' => FILTER_VALIDATE_BOOLEAN //filtro para ver si se ha seleccionado alguna opción
    ];

    // Validar datos
    $sanitizedData = filter_input_array(INPUT_POST, $validation_filters);

    // Crear mensajes de error
    $errors['fullname'] = $sanitizedData['fullname'] ? '' : 'El nombre debe tener entre 2 y 50 caracteres y solo contener letras.';
    $errors['email'] = $sanitizedData['email'] ? '' : 'Debe proporcionar un correo electrónico válido.';
    $errors['age'] = $sanitizedData['age'] ? '' : 'La edad debe ser mayor de 13 años.';
    $errors['book_type'] = $sanitizedData['book_type'] ? '' : 'Debe seleccionar un tipo de libro preferido válido.';
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

<h1>Formulario de Registro para Biblioteca</h1>

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
<form action="examenb6_c.php" method="POST">
    <p>
        <label for="fullname">Nombre completo:</label>
        <input type="text" id="fullname" name="fullname" value="<?= htmlspecialchars($sanitizedData['fullname'] ?? '') ?>">
    </p>
    <p>
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($sanitizedData['email'] ?? '') ?>">
    </p>
    <p>
        <label for="age">Edad:</label>
        <input type="text" id="age" name="age" value="<?= htmlspecialchars($sanitizedData['age'] ?? '') ?>">
    </p>
    <p>
        <label for="book_type">Tipo de evento:</label>
        <select id="book_type" name="book_type">
            <option value="">Seleccione</option>
            <option value="Fisico" <?= $sanitizedData['book_type'] === 'Físico' ? 'selected' : '' ?>>Físico</option>
            <option value="Digital" <?= $sanitizedData['book_type'] === 'Digital' ? 'selected' : '' ?>>Digital</option>
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
    <p>Edad: <?= $sanitizedData['age'] ?></p>
    <p>Tipo de evento: <?= $sanitizedData['book_type'] ?></p>
<?php endif; ?>
