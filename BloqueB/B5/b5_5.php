<?php
// Definir el array $data
$data = [
    "john.doe@example.com",
    "jane-doe@website.org",
    "invalid-email@com",
    "123-456-7890",
    "987.654.3210",
    "http://www.example.com",
    "https://site.org/path?query=string",
    "not-a-url"
];

// Validar correos electrónicos usando preg_match
echo "<h3>Validación de correos electrónicos</h3>";
$emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
foreach ($data as $item) {
    if (preg_match($emailPattern, $item)) {
        echo "$item es un correo válido.<br>";
    } else {
        echo "$item NO es un correo válido.<br>";
    }
}

// Extraer números de teléfono válidos usando preg_match_all
echo "<h3>Extracción de números de teléfono</h3>";
$phonePattern = '/\b\d{3}[-.]\d{3}[-.]\d{4}\b/';
$phoneNumbers = [];
foreach ($data as $item) {
    if (preg_match_all($phonePattern, $item, $matches)) {
        $phoneNumbers = array_merge($phoneNumbers, $matches[0]);
    }
}
echo "Números de teléfono válidos encontrados:<br>";
echo implode(", ", $phoneNumbers) . "<br>";

// Dividir una URL en sus componentes usando preg_split
echo "<h3>División de URLs en componentes</h3>";
$urlPattern = '/(https?:\/\/)?([^\/]+)(\/.*)?/';
foreach ($data as $item) {
    if (preg_match($urlPattern, $item, $matches)) {
        echo "URL: $item<br>";
        echo "Protocolo: " . ($matches[1] ?? 'N/A') . "<br>";
        echo "Dominio: " . ($matches[2] ?? 'N/A') . "<br>";
        echo "Ruta: " . ($matches[3] ?? 'N/A') . "<br><br>";
    }
}

// Limpiar correos electrónicos inválidos usando preg_replace
echo "<h3>Correos electrónicos limpiados</h3>";
$cleanedData = preg_replace($emailPattern, '', $data);
echo "Datos después de eliminar correos inválidos:<br>";
foreach ($cleanedData as $item) {
    echo $item . "<br>";
}
?>
