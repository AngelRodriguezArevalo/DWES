<?php include 'includes/header.php'; ?>

<?php
// Lista de eventos disponibles
$eventos = [
    'Ceremonia de Apertura',
    'Atletismo',
    'Natación',
    'Ciclismo',
    'Ceremonia de Clausura',
    'Gimnasia',
    'Voleibol',
    'Fútbol',
    'Baloncesto',
    'Esgrima'
];

// Inicializar variables
$error = '';
$seleccionados = [];
$minimo_eventos = 3; // Número mínimo de eventos requeridos

// Manejar el envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seleccionados = $_POST['eventos'] ?? [];

    // Validar que se hayan seleccionado al menos $minimo_eventos eventos
    if (count($seleccionados) < $minimo_eventos) {
        $error = "Por favor, selecciona al menos $minimo_eventos eventos en los que deseas participar.";
    } else {
        // Mostrar confirmación y finalizar el script
        echo "<div class='container'>";
        echo "<h2>¡Gracias por participar!</h2>";
        echo "<p>Te has registrado como voluntario para los siguientes eventos:</p>";
        echo "<ul>";
        foreach ($seleccionados as $evento) {
            echo "<li>" . htmlspecialchars($evento) . "</li>";
        }
        echo "</ul>";
        echo "</div>";
        include 'includes/footer.php';
        exit;
    }
}
?>

<div class="container">
    <h2>Formulario de Registro de Voluntarios</h2>

    <!-- Mostrar mensaje de error si existe -->
    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="voluntarios.php" method="POST">
        <p>Por favor, selecciona los eventos en los que deseas participar:</p>
        <?php foreach ($eventos as $evento): ?>
            <label>
                <input type="checkbox" name="eventos[]" value="<?= htmlspecialchars($evento) ?>" 
                <?= in_array($evento, $seleccionados) ? 'checked' : '' ?>>
                <?= htmlspecialchars($evento) ?>
            </label><br>
        <?php endforeach; ?>
        <p><input type="submit" value="Registrar"></p>
    </form>
</div>

<?php include 'includes/footer.php'; ?>

