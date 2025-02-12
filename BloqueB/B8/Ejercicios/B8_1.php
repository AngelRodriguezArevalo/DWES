<?php
// Fecha actual
$today = time();
$today_date = date('l, d M Y', $today);

// Definir fechas del evento
$start = strtotime('March 10 2025'); // Fecha de inicio en el futuro
$end = mktime(0, 0, 0, 3, 20, 2025); // Fecha de finalización

$start_date = date('l, d M Y', $start);
$end_date = date('l, d M Y', $end);

// Calcular días restantes
$days_to_start = ceil(($start - $today) / 86400);
$days_to_end = ceil(($end - $today) / 86400);

?>
<?php include 'includes/header.php'; ?>

<p><b>Fecha actual:</b> <?= $today_date ?></p>
<p><b>Comienzo del evento:</b> <?= $start_date ?></p>
<p><b>Finalización del evento:</b> <?= $end_date ?></p>

<?php
// Lógica de mensajes condicionales
if ($today < $start) {
    echo "<p>El evento aún no ha comenzado. Comenzará en <b>$days_to_start</b> días.</p>";
} elseif ($today >= $start && $today <= $end) {
    echo "<p>El evento está en curso. Terminará en <b>$days_to_end</b> días.</p>";
} else {
    echo "<p>El evento ha terminado.</p>";
}
?>

<?php include 'includes/footer.php'; ?>
