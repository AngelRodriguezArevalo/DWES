<?php
// Fecha y hora inicial del evento
$event = new DateTime();
$event->setDate(2024, 10, 16);
$event->setTime(15, 30, 0);

// Clonar el objeto para hacer modificaciones sin afectar el original
$event_modified = clone $event;

// Cambiar la fecha y hora del evento dinámicamente (ejemplo: 20 de octubre de 2024 a las 18:00)
$event_modified->setDate(2024, 10, 20);
$event_modified->setTime(18, 00);

// Ajustar fecha desde un timestamp UNIX (ejemplo: 1700000000)
$event_from_unix = new DateTime();
$event_from_unix->setTimestamp(1700000000);

// Modificar la fecha sumando 3 días y 2 horas
$event_modified->modify('+3 days +2 hours');

?>

<?php include 'includes/header.php'; ?> 

<h2>Gestión de Eventos</h2>

<p><b>Fecha y hora inicial:</b> 
  <?= $event->format('g:i a - D, M j Y') ?></p>

<p><b>Fecha modificada:</b> 
  <?= $event_modified->format('g:i a - D, M j Y') ?></p>

<p><b>Fecha desde UNIX timestamp (1700000000):</b> 
  <?= $event_from_unix->format('g:i a - D, M j Y') ?></p>

<?php include 'includes/footer.php'; ?>
