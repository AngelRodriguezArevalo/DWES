<?php
$date_info = ""; // Variable para almacenar el resultado

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_date = $_POST["fecha"] ?? '';

    // Validar que la fecha no esté vacía
    if (!empty($input_date)) {
        // Convertir la fecha en un objeto DateTime
        $date = DateTime::createFromFormat('d/m/Y H:i:s', $input_date);

        if ($date) {
            // Obtener el timestamp UNIX
            $timestamp = $date->getTimestamp();

            // Formatear fecha en español
            setlocale(LC_TIME, 'es_ES.UTF-8');
            $formatted_date = strftime('%d de %B de %Y, %H%M', $timestamp);

            // Almacenar la información a mostrar
            $date_info = "
                <p><b>Formato estándar:</b> {$date->format('Y-m-d H:i:s')}</p>
                <p><b>Timestamp UNIX:</b> {$timestamp}</p>
                <p><b>Formato legible:</b> {$formatted_date}</p>
            ";
        } else {
            $date_info = "<p style='color: red;'>Error: La fecha ingresada no es válida.</p>";
        }
    } else {
        $date_info = "<p style='color: red;'>Error: Por favor, ingresa una fecha.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Fechas</title>
</head>
<body>
    <h2>Ingrese una fecha en el formato d/m/Y H:i:s</h2>
    <form method="post">
        <label for="fecha">Fecha:</label>
        <input type="text" name="fecha" id="fecha" placeholder="16/10/2024 15:30:00" required>
        <button type="submit">Convertir</button>
    </form>

    <?= $date_info ?>

</body>
</html>

