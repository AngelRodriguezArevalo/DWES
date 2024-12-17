<?php
// 1. Definir el contenido del artículo web
$articulo = "En el mundo de la tecnología actual, la inteligencia artificial es una de las herramientas más importantes. 
Las innovaciones en inteligencia artificial están revolucionando industrias como la salud, la educación y la ciencia. 
Este artículo presenta una visión general sobre el desarrollo de la inteligencia artificial y su impacto en la sociedad.";

// Palabras y subcadenas clave a buscar
$palabraClave = "inteligencia artificial";
$palabrasClaveAdicionales = ["tecnología", "innovaciones", "salud", "sociedad"];
$palabraInicio = "En el mundo";
$palabraFinal = "la sociedad.";

// 2. Mostrar el contenido original
echo "<h2>Análisis del Contenido del Artículo</h2>";
echo "<strong>Contenido Original:</strong><br>";
echo "<p>$articulo</p>";

// 3. Detección de la primera y última aparición de una palabra específica
echo "<h3>Detección de la Palabra Clave</h3>";
$posicionPrimera = strpos($articulo, $palabraClave);
$posicionUltima = strrpos($articulo, $palabraClave);

if ($posicionPrimera !== false) {
    echo "La primera aparición de la palabra clave '<strong>$palabraClave</strong>' está en la posición: $posicionPrimera.<br>";
    echo "La última aparición de la palabra clave '<strong>$palabraClave</strong>' está en la posición: $posicionUltima.<br>";
} else {
    echo "La palabra clave '<strong>$palabraClave</strong>' no fue encontrada en el artículo.<br>";
}

// 4. Comprobar si el artículo contiene ciertas palabras clave adicionales
echo "<h3>Comprobación de Palabras Clave</h3>";
foreach ($palabrasClaveAdicionales as $clave) {
    if (stripos($articulo, $clave) !== false) {
        echo "La palabra clave '<strong>$clave</strong>' fue encontrada en el artículo.<br>";
    } else {
        echo "La palabra clave '<strong>$clave</strong>' no está presente en el artículo.<br>";
    }
}

// 5. Extraer partes del texto basadas en subcadenas específicas
echo "<h3>Extracción de Texto</h3>";
$inicioExtraccion = strpos($articulo, "Las innovaciones");
$longitudExtraccion = 50;

if ($inicioExtraccion !== false) {
    $textoExtraido = substr($articulo, $inicioExtraccion, $longitudExtraccion);
    echo "Parte extraída del texto comenzando en 'Las innovaciones' (50 caracteres):<br>";
    echo "<blockquote>$textoExtraido...</blockquote>";
} else {
    echo "No se encontró la subcadena 'Las innovaciones' en el texto.<br>";
}

// 6. Comprobar si el texto comienza o termina con ciertas palabras
echo "<h3>Verificación de Inicio y Fin del Texto</h3>";
if (str_starts_with($articulo, $palabraInicio)) {
    echo "El texto <strong>comienza</strong> con: '<em>$palabraInicio</em>'.<br>";
} else {
    echo "El texto <strong>no comienza</strong> con la frase: '<em>$palabraInicio</em>'.<br>";
}

if (str_ends_with($articulo, $palabraFinal)) {
    echo "El texto <strong>termina</strong> con: '<em>$palabraFinal</em>'.<br>";
} else {
    echo "El texto <strong>no termina</strong> con la frase: '<em>$palabraFinal</em>'.<br>";
}

?>
