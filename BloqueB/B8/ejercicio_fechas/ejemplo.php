<?php
date_default_timezone_set('Europe/Madrid'); // Definir zona horaria por defecto

$message = '';
$message_error = '';
$fecha = ['fecha_inicio' => '', 'fecha_fin' => ''];
$error = ['fecha_inicio' => '', 'fecha_fin' => '', 'frecuencia' => ''];

$opciones_validas = ["diaria" => "P1D", "semanal" => "P7D", "dos-semanas" => "P14D", "mensual" => "P1M"];
$frecuencia = '';

// Definir las zonas horarias
$zonas_horarias = [
    'Madrid' => new DateTimeZone('Europe/Madrid'),
    'Los Ángeles' => new DateTimeZone('America/Los_Angeles'),
    'Londres' => new DateTimeZone('Europe/London'),
    'Tokio' => new DateTimeZone('Asia/Tokyo'),
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha_inicio = DateTime::createFromFormat('d/m/Y H:i', $_POST['fecha_inicio']);
    $fecha_fin = DateTime::createFromFormat('d/m/Y H:i', $_POST['fecha_fin']);
    $frecuencia = $_POST['frecuencia'];

    if (!$fecha_inicio || !$fecha_fin || !isset($opciones_validas[$frecuencia])) {
        $message_error = 'Debes introducir fechas válidas y seleccionar una frecuencia correcta.';
    } else {
        // Crear la lista de reuniones usando DatePeriod
        $intervalo = new DateInterval($opciones_validas[$frecuencia]);
        $periodo = new DatePeriod($fecha_inicio, $intervalo, $fecha_fin);

        // Mostrar las reuniones generadas
        $message .= "<h2>Lista de reuniones:</h2><ul>";

        foreach ($periodo as $reunion) {
            $message .= "<li><b>" . $reunion->format('l, d M Y - H:i') . "</b></li>";

            // Mostrar en todas las zonas horarias
            foreach ($zonas_horarias as $ciudad => $timezone) {
                $reunion_ciudad = clone $reunion;
                $reunion_ciudad->setTimezone($timezone);
                $offset = $reunion_ciudad->getOffset() / 3600; // Convertir a horas
                $ahora = new DateTime('now', $timezone);
                $tiempo_restante = $ahora->diff($reunion_ciudad);

                $message .= "<ul>
                                <li><b>$ciudad (UTC $offset)</b>: " . $reunion_ciudad->format('d/m/Y H:i') . "</li>
                                <li>Tiempo restante: " . $tiempo_restante->format('%a días, %h horas, %i minutos') . "</li>
                             </ul>";
            }
        }
        $message .= "</ul>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reuniones de Proyecto</title>
</head>
<body>
    <h1>Generador de reuniones</h1>

    <form method="post">
        <label>Fecha de inicio (dd/mm/yyyy hh:mm):</label>
        <input type="text" name="fecha_inicio" required>

        <label>Fecha de fin (dd/mm/yyyy hh:mm):</label>
        <input type="text" name="fecha_fin" required>

        <label>Frecuencia:</label>
        <select name="frecuencia" required>
            <option value="diaria">Diaria</option>
            <option value="semanal">Semanal</option>
            <option value="dos-semanas">Cada dos semanas</option>
            <option value="mensual">Mensual</option>
        </select>

        <button type="submit">Generar reuniones</button>
    </form>

    <?php if ($message_error) echo "<p style='color:red;'>$message_error</p>"; ?>
    <?php if ($message) echo $message; ?>
</body>
</html>
