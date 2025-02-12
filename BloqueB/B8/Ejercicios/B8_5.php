<?php
$durationMessage = '';
$totalHours = 0;
$totalMinutes = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startDateInput = $_POST["start_date"];
    $endDateInput = $_POST["end_date"];

    $startDate = DateTime::createFromFormat('d/m/Y H:i:s', $startDateInput);
    $endDate = DateTime::createFromFormat('d/m/Y H:i:s', $endDateInput);

    if ($startDate && $endDate) {
        // Calcular duración
        $duration = $startDate->diff($endDate);
        $durationMessage = $duration->format('%d días, %h horas, %i minutos');

        // Calcular tiempo total en horas y minutos
        $totalHours = ($duration->days * 24) + $duration->h;
        $totalMinutes = $totalHours * 60 + $duration->i;
    } else {
        $durationMessage = "Formato de fecha incorrecto.";
    }
}
?>

<?php include 'includes/header.php'; ?>

<form method="POST">
    <label>Fecha y hora de inicio (dd/mm/yyyy HH:MM:SS):</label>
    <input type="text" name="start_date" required>
    <br>
    <label>Fecha y hora de fin (dd/mm/yyyy HH:MM:SS):</label>
    <input type="text" name="end_date" required>
    <br>
    <button type="submit">Calcular Duración</button>
</form>

<?php if (!empty($durationMessage)) : ?>
    <p><b>Duración del evento:</b> <?= $durationMessage ?></p>
    <p><b>Duración total:</b> <?= $totalHours ?> horas y <?= $totalMinutes % 60 ?> minutos</p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
