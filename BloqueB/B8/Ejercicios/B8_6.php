<?php
$events = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startDateInput = $_POST["start_date"];
    $durationDays = (int)$_POST["duration_days"];
    $durationHours = (int)$_POST["duration_hours"];
    $durationMinutes = (int)$_POST["duration_minutes"];
    $intervalDays = (int)$_POST["interval_days"];

    // Crear objeto DateTime desde el input
    $startDate = DateTime::createFromFormat('d/m/Y H:i', $startDateInput);

    if ($startDate) {
        // Definir la fecha de fin del periodo (2 meses después del inicio)
        $endDate = clone $startDate;
        $endDate->modify('+2 months');

        // Definir el intervalo de repetición
        $interval = new DateInterval("P{$intervalDays}D");
        $period = new DatePeriod($startDate, $interval, $endDate);

        foreach ($period as $event) {
            // Calcular la fecha de finalización de cada evento
            $eventEnd = clone $event;
            $eventEnd->modify("+{$durationDays} days +{$durationHours} hours +{$durationMinutes} minutes");

            // Calcular duración en formato legible
            $durationText = "{$durationDays} días, {$durationHours} horas, {$durationMinutes} minutos";
            
            // Guardar en la lista de eventos
            $events[] = [
                'start' => $event->format('l, d M Y - H:i'),
                'end' => $eventEnd->format('l, d M Y - H:i'),
                'duration' => $durationText
            ];
        }
    } else {
        $error = "Formato de fecha incorrecto. Usa el formato: dd/mm/yyyy HH:MM";
    }
}
?>

<?php include 'includes/header.php'; ?>

<h2>Generador de Eventos Recurrentes</h2>

<form method="POST">
    <label>Fecha y hora inicial (dd/mm/yyyy HH:MM):</label>
    <input type="text" name="start_date" required>
    <br>
    <label>Duración del evento:</label>
    <input type="number" name="duration_days" placeholder="Días" required>
    <input type="number" name="duration_hours" placeholder="Horas" required>
    <input type="number" name="duration_minutes" placeholder="Minutos" required>
    <br>
    <label>Intervalo de repetición (en días):</label>
    <input type="number" name="interval_days" value="7" required>
    <br>
    <button type="submit">Generar eventos</button>
</form>

<?php if (isset($error)) : ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<?php if (!empty($events)) : ?>
    <h2>Eventos generados:</h2>
    <ul>
        <?php foreach ($events as $event) : ?>
            <li>
                <b>Inicio:</b> <?= $event['start'] ?><br>
                <b>Fin:</b> <?= $event['end'] ?><br>
                <b>Duración:</b> <?= $event['duration'] ?>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
