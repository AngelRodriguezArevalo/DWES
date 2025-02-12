<?php
$duration_text = "";
$total_hours_text = "";

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener fechas ingresadas por el usuario
    $start_date = DateTime::createFromFormat('d/m/Y H:i:s', $_POST['start_date']);
    $end_date = DateTime::createFromFormat('d/m/Y H:i:s', $_POST['end_date']);

    if ($start_date && $end_date) {
        // Calcular la diferencia entre las fechas
        $interval = $start_date->diff($end_date);
        
        // Formatear la duración
        $duration_text = $interval->format('%d días, %h horas, %i minutos');

        // Calcular la duración total en horas y minutos
        $total_minutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
        $total_hours = intdiv($total_minutes, 60);
        $remaining_minutes = $total_minutes % 60;
        $total_hours_text = "$total_hours horas, $remaining_minutes minutos";
    } else {
        $duration_text = "Formato de fecha incorrecto.";
    }
}
?>

<?php include 'includes/header.php'; ?>

<h2>Calculadora de Duración del Evento</h2>

<form method="post">
    <label for="start_date">Fecha y hora de inicio (d/m/Y H:i:s):</label>
    <input type="text" id="start_date" name="start_date" required placeholder="16/10/2024 15:30:00">
    <br>
    <label for="end_date">Fecha y hora de fin (d/m/Y H:i:s):</label>
    <input type="text" id="end_date" name="end_date" required placeholder="18/10/2024 18:45:00">
    <br>
    <button type="submit">Calcular Duración</button>
</form>

<?php if ($duration_text): ?>
    <h3>Duración del Evento</h3>
    <p><b>Duración:</b> <?= $duration_text ?></p>
    <p><b>Total en horas y minutos:</b> <?= $total_hours_text ?></p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
