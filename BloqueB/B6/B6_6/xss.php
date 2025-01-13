<?php
// Función para escapar los caracteres especiales
function html_escape(string $string, int $flags = ENT_QUOTES | ENT_HTML5): string
{
    return htmlspecialchars($string, $flags, 'UTF-8', true);
}

// Capturar el mensaje desde la cadena de consulta
$message = $_GET['msg'] ?? 'No se ha enviado ningún mensaje.';

// Escapar el mensaje
$safe_message = html_escape($message);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesamiento de Entrada</title>
</head>
<body>
    <h1>Procesamiento de Entrada</h1>
    <p><strong>Mensaje procesado:</strong></p>
    <p><?= $safe_message ?></p>
    <a href="index.php">Volver</a>
</body>
</html>
