<?php
$language   = $_COOKIE['language'] ?? null;  // Obtener la cookie si existe
$options    = ['en', 'es'];                 // Opciones de idioma

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si se envía el formulario
    $language = $_POST['language'];         // Obtener el idioma seleccionado
    setcookie('language', $language, time() + (30 * 24 * 60 * 60), '/', '', false, true); // Cookie válida por 30 días
}

// Definir el idioma basado en la cookie o establecer el predeterminado en inglés
$selectedLanguage = in_array($language, $options) ? $language : null;
?>


<?php if ($selectedLanguage): ?>
    <?php if ($selectedLanguage == 'en'): ?>
        <h1>Welcome!</h1>
        <p>Your preferred language is English.</p>
    <?php else: ?>
        <h1>¡Bienvenido!</h1>
        <p>Tu idioma preferido es Español.</p>
    <?php endif; ?>
<?php else: ?>
    <h2>Select your preferred language:</h2>
    <form method="POST" action="b9_2.php">
        <label>
            <input type="radio" name="language" value="en" required> Inglés
        </label><br>
        <label>
            <input type="radio" name="language" value="es" required> Español
        </label><br><br>
        <input type="submit" value="Save">
    </form>
<?php endif; ?>

