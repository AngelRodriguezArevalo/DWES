<?php
$message = '';
$message_error = '';
$fecha = [
    'fecha' => '',
    'zona' => ''];
$error = [
    'fecha' => '',
    'zona' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filters['fecha']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['fecha']['options']['regexp'] = '/[0-9\/\:\s]/';
    $filters['zona']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['zona']['options']['regexp'] = '/[A-z\/]/';

    $fecha = filter_input_array(INPUT_POST, $filters);

    $error = [
        'fecha' => ($fecha['fecha']) ? '' : 'Error en la fecha de inicio',
        'zona' => ($fecha['zona']) ? '' : 'Error en la fecha fin'];

    $invalid = implode($error);

    if ($invalid) {
        $message_error = 'Debes solucionar los errores.';
    } else {
        //Creación de variables que usaremos.
        $eventStart = date_create_from_format('d/m/Y H:i:s', $fecha['fecha']);
        $zonaHoraria = new DateTimeZone($fecha['zona']);
        $eventStartWithZona = new DateTime($eventStart->format('d/m/Y H:i:s'), $zonaHoraria);
        $tzTko = new DateTimeZone('Asia/Tokyo');
        $tzNy = new DateTimeZone('America/New_York');
        $tko = clone $eventStartWithZona;
        $tko->setTimezone($tzTko);
        $nyk = clone $eventStartWithZona;
        $nyk->setTimezone($tzNy);
        $location = $zonaHoraria->getLocation();
        $ciudadEvent = $fecha['zona'];
        $ciudadEvent = explode('/', $ciudadEvent);
        $ciudadEvent = $ciudadEvent[1];
        


        //Montamos la variable message
        $message = '
            <p>' . $ciudadEvent . ': ' . $eventStartWithZona->format('g:i a') . ' (' . $eventStartWithZona->getOffset() / (60 * 60) . ')</p>
            <p><br>Nueva York: ' . $nyk->format('g:i a') . ' (' . $nyk->getOffset() / (60 * 60) . ')</p>
            <p><br>Tokio: ' . $tko->format('g:i a') . ' (' . $tko->getOffset() / (60 * 60) . ')</p>
            <br>
            <h2><br>Lugar del evento</h2><br>
            <p>' . $zonaHoraria->getName(). '<br><br>
            <b>Longitude: </b>' . $location['longitude'] . '<br><br>
            <b>Latitude: </b>' . $location['latitude'] . '</p>
        ';

    }
}