<?php
$form = ['email' => '', 'age' => '', 'url' => '', 'terms' => '']; // Inicializar los campos del formulario

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Definir los filtros
    $filters = [
        'email' => FILTER_VALIDATE_EMAIL, // Filtro para el email
        'age' => [
            'filter' => FILTER_VALIDATE_INT, // Filtro para la edad
            'options' => ['min_range' => 18, 'max_range' => 65] // Rango de edad entre 18 y 65 años
        ],
        'url' => FILTER_VALIDATE_URL, // Filtro para la URL
        'terms' => FILTER_VALIDATE_BOOLEAN // Filtro para el checkbox de términos
    ];
    
    // Filtrar los datos de entrada
    $form = filter_input_array(INPUT_POST, $filters);
}
?>

<?php include 'includes/header.php'; ?>

<form action="formulario.php" method="POST">
  Email: <input type="text" name="email" value="<?= htmlspecialchars($form['email']) ?>"><br>
  Edad: <input type="text" name="age" value="<?= htmlspecialchars($form['age']) ?>"><br>
  URL: <input type="text" name="url" value="<?= htmlspecialchars($form['url']) ?>"><br>
  Acepto los términos y condiciones: <input type="checkbox" name="terms" value="1" <?= $form['terms'] ? 'checked' : '' ?>><br>
  <input type="submit" value="Guardar">
</form>

<?php
// Mostrar los valores del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<pre>';
    var_dump($form);
    
    // Mostrar mensajes de error si hay campos no válidos
    if (!$form['email']) {
        echo "Email inválido o vacío.\n";
    }
    if ($form['age'] < 18 || $form['age'] > 65) {
        echo "Edad fuera del rango permitido (debe estar entre 18 y 65 años).\n";
    }
    if (!$form['url']) {
        echo "URL inválida.\n";
    }
    if (!$form['terms']) {
        echo "Debe aceptar los términos y condiciones.\n";
    }
    echo '</pre>';
}
?>

<?php include 'includes/footer.php'; ?>
