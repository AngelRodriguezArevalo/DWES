<?php
date_default_timezone_set('Europe/Madrid'); //zona horaria por defecto

$message = '';
$message_error = '';
$fecha = ['fecha_inicio' => '', 'fecha_fin' => ''];
$error = ['fecha_inicio' => '', 'fecha_fin' => '', 'frecuencia' => ''];

$opciones_validas = ["diaria" => "P1D", "semanal" => "P7D", "dos-semanas" => "P14D", "mensual" => "P1M"];
$frecuencia = '';

// zonas horarias
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
        $message_error = 'Debes introducir fechas válidas.';
    } else {
        // lista de reuniones usando DatePeriod
        $intervalo = new DateInterval($opciones_validas[$frecuencia]);
        $fin_periodo = (clone $fecha_inicio)->add(new DateInterval("P12M"));
        $periodo = new DatePeriod($fecha_inicio, $intervalo, $fin_periodo);

        // reuniones generadas
        $message .= "<h2>Lista de reuniones:</h2>";

        foreach ($periodo as $reunion) {

            $message .= "<h3><b>" . $reunion->format('l, d M Y - H:i') . "</b></h3>";

            // por cada zona horaria se muestra la información
            foreach ($zonas_horarias as $ciudad => $timezone) {
                $reunion_ciudad = clone $reunion;
                $reunion_ciudad->setTimezone($timezone);
                $offset = $reunion_ciudad->getOffset() / 3600; // horas
                $ahora = new DateTime('now', $timezone);
                $tiempo_restante = $ahora->diff($reunion_ciudad);

                $message .= "<ul>
                                <li><b>$ciudad (UTC $offset)</b>: " . $reunion_ciudad->format('d/m/Y H:i') . "</li>
                                <li>Tiempo que falta: " . $tiempo_restante->format('%a días, %h horas, %i minutos') . "</li>
                             </ul>";
            }
        }
    }
}
?>