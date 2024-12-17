<?php
// Simulando el contenido de una entrada de blog
$texto = "Este es un texto de ejemplo que vamos a procesar. Es muy importante analizar este contenido y extraer datos clave para mejorar la gestion del blog. Ademas, este texto sera transformado y analizado.";

// Palabras clave predefinidas
$palabrasClave = ["importante", "procesar", "analizado"];

// 1. Texto original
echo "<h2>Análisis de Entrada de Blog</h2>";
echo "<strong>Texto original:</strong> <br>";
echo $texto . "<br><br>";

// 2. Texto en mayúsculas
$textoMayusculas = strtoupper($texto);
echo "<strong>Texto en mayúsculas:</strong> <br>";
echo $textoMayusculas . "<br><br>";

// 3. Texto con cada palabra capitalizada
$textoCapitalizado = ucwords(strtolower($texto));
echo "<strong>Texto con cada palabra capitalizada:</strong> <br>";
echo $textoCapitalizado . "<br><br>";

// 4. Longitud del texto en caracteres
$longitudConEspacios = strlen($texto);
echo "<strong>Longitud del texto (con espacios):</strong> $longitudConEspacios caracteres<br>";

// 5. Longitud del texto sin contar los espacios
$longitudSinEspacios = strlen(str_replace(' ', '', $texto));
echo "<strong>Longitud del texto (sin espacios):</strong> $longitudSinEspacios caracteres<br>";

// 6. Cantidad de palabras en el texto
$cantidadPalabras = str_word_count($texto);
echo "<strong>Cantidad de palabras:</strong> $cantidadPalabras palabras<br><br>";

// 7. Conteo de frecuencia de palabras
echo "<strong>Frecuencia de palabras:</strong><br>";
$palabras = str_word_count(strtolower($texto), 1); // Extraer palabras en minúsculas
$frecuenciaPalabras = array_count_values($palabras); // Contar la frecuencia

foreach ($frecuenciaPalabras as $palabra => $frecuencia) {
    echo "$palabra: $frecuencia<br>";
}
echo "<br>";

// 8. Detectar y marcar palabras clave
echo "<strong>Texto con palabras clave destacadas:</strong><br>";
$textoMarcado = $texto;
foreach ($palabrasClave as $clave) {
    $textoMarcado = str_ireplace($clave, "<mark>$clave</mark>", $textoMarcado);
}
echo $textoMarcado . "<br><br>";

// 9. Generar un resumen del texto (primeras 50 palabras)
echo "<strong>Resumen del texto (primeras 50 palabras):</strong><br>";
$palabrasResumen = array_slice($palabras, 0, 50); // Tomar las primeras 50 palabras
$resumen = implode(' ', $palabrasResumen);
echo $resumen . "...<br>";

?>
