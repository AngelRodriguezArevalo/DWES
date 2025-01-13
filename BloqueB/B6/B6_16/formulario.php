<?php
$form['email'] = '';   // Inicializar email
$form['age']   = '';    // Inicializar edad
$form['terms'] = 0;     // Inicializar términos

$data = []; // Array para almacenar los datos validados

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si el formulario es enviado
    // Definir los filtros
    $filters = [
        'email' => FILTER_VALIDATE_EMAIL, // Filtro para validar el email
        'age' => [
            'filter' => FILTER_VALIDATE_INT,  // Filtro para validar la edad
            'options' => ['min_range' => 18, 'max_range' => 65]  // Rango de edad entre 18 y 65 años
        ],
        'terms' => FILTER_VALIDATE_BOOLEAN // Filtro para validar los términos (checkbox)
    ];

    // Obtener los valores del formulario
    $form = filter_input_array(INPUT_POST);  // Obtener los datos del formulario
    
    // Aplicar los filtros a los datos del formulario
    $data = filter_var_array($form, $filters);
}
?>

<?php include 'includes/header.php'; ?>

<form action="formulario.php" method="POST">
  Email: <input type="text" name="email" value="<?= htmlspecialchars($form['email']) ?>"><br>
  Edad:  <input type="text" name="age" value="<?= htmlspecialchars($form['age']) ?>"><br>
  Acepto los términos y condiciones: <input type="checkbox" name="terms" value="1" <?= $form['terms'] ? 'checked' : '' ?>><br>
  <input type="submit" value="Guardar">
</form>

<pre><?php var_dump($data); ?></pre>

<?php include 'includes/footer.php'; ?>

