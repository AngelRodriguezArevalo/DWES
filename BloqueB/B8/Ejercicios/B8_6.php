<?php
date_default_timezone_set('Europe/London'); // Zona horaria base para el administrador

// Zonas horarias de referencia
$tz_LDN = new DateTimeZone('Europe/London');
$tz_NYC = new DateTimeZone('America/New_York');
$tz_TYO = new DateTimeZone('Asia/Tokyo');

// Función para convertir la fecha a diferentes zonas horarias
function convertirZonaHoraria($fecha, $zonaOrigen, $zonaDestino) {
    $fechaObj = new DateTime($fecha, new DateTimeZone($zonaOrigen));
    $fechaObj->setTimezone(new DateTimeZone($zonaDestino));
    return $fechaObj;
}

// Lista de eventos en la zona horaria base (Londres)
$eventos = [
    ['nombre' => 'Torneo Internacional', 'fecha' => '2025-03-10 15:00:00'],
    ['nombre' => 'Conferencia Global', 'fecha' => '2025-04-05 18:00:00'],
    ['nombre' => 'Presentación de Expansión', 'fecha' => '2025-06-20 12:00:00']
];

// Mostrar eventos con conversión de zona horaria
echo "<h1>Eventos Globales</h1>";
echo "<table border='1'>";
echo "<tr><th>Evento</th><th>Londres</th><th>Nueva York</th><th>Tokio</th></tr>";

foreach ($eventos as $evento) {
    $eventoLDN = new DateTime($evento['fecha'], $tz_LDN);
    $eventoNYC = convertirZonaHoraria($evento['fecha'], 'Europe/London', 'America/New_York');
    $eventoTYO = convertirZonaHoraria($evento['fecha'], 'Europe/London', 'Asia/Tokyo');

    echo "<tr>";
    echo "<td><b>{$evento['nombre']}</b></td>";
    echo "<td>{$eventoLDN->format('d/m/Y g:i A')} (UTC " . ($eventoLDN->getOffset() / 3600) . ")</td>";
    echo "<td>{$eventoNYC->format('d/m/Y g:i A')} (UTC " . ($eventoNYC->getOffset() / 3600) . ")</td>";
    echo "<td>{$eventoTYO->format('d/m/Y g:i A')} (UTC " . ($eventoTYO->getOffset() / 3600) . ")</td>";
    echo "</tr>";
}
echo "</table>";

// Información de zona horaria
function mostrarInfoZona($zona)
{
    $tz = new DateTimeZone($zona);
    $loc = $tz->getLocation();
    echo "<h2>Zona Horaria: " . $tz->getName() . "</h2>";
    echo "<p><b>Offset UTC:</b> " . ($tz->getOffset(new DateTime('now', $tz)) / 3600) . " horas</p>";
    echo "<p><b>Ubicación:</b> Latitud " . $loc['latitude'] . " | Longitud " . $loc['longitude'] . "</p>";
}

// Mostrar información de cada zona horaria
mostrarInfoZona('Europe/London');
mostrarInfoZona('America/New_York');
mostrarInfoZona('Asia/Tokyo');

?>
