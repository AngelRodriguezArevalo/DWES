<?php
// Configurar la zona horaria predeterminada
date_default_timezone_set('Europe/London');

// Parámetros del evento
$fecha_inicial = '2025-03-01 10:00:00'; // Fecha y hora de inicio del evento
$duracion_dias = 0;  // Duración en días
$duracion_horas = 2; // Duración en horas
$duracion_minutos = 30; // Duración en minutos
$intervalo_repeticion = 'P7D'; // Evento semanal (cada 7 días)
$duracion_periodo = 'P2M'; // Mostrar eventos durante 2 meses

// Crear el objeto DateTime para la fecha de inicio
$inicio_evento = new DateTime($fecha_inicial);

// Definir el intervalo de repetición
$intervalo = new DateInterval($intervalo_repeticion);

// Definir el periodo total (2 meses desde la fecha de inicio)
$fin_periodo = (clone $inicio_evento)->add(new DateInterval($duracion_periodo));

// Generar fechas de eventos recurrentes
$periodo = new DatePeriod($inicio_evento, $intervalo, $fin_periodo);

// Mostrar eventos generados
echo "<h2>Lista de Eventos Recurrentes</h2>";
echo "<table border='1'>";
echo "<tr><th>Fecha de Inicio</th><th>Fecha de Fin</th><th>Duración</th></tr>";

foreach ($periodo as $evento) {
    // Calcular la fecha de finalización del evento
    $fin_evento = (clone $evento)->add(new DateInterval("P{$duracion_dias}DT{$duracion_horas}H{$duracion_minutos}M"));
    
    echo "<tr>";
    echo "<td>" . $evento->format('l, d M Y - H:i') . "</td>";
    echo "<td>" . $fin_evento->format('l, d M Y - H:i') . "</td>";
    echo "<td>{$duracion_horas} horas, {$duracion_minutos} minutos</td>";
    echo "</tr>";
}

echo "</table>";
?>
