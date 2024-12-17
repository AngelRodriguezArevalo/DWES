<?php
// Lista de canciones inicial con reproducciones
$canciones_con_reproducciones = [
    "Blinding Lights - The Weeknd" => 1500,
    "Estoy enfermo - Pignoise" => 1200,
    "Levitating - Dua Lipa" => 1800,
    "One more night - Maroon 5" => 1600,
    "Feel Good Inc. - Gorillaz" => 1700
];

// Generar reproducciones aleatorias
foreach ($canciones_con_reproducciones as $cancion => &$reproducciones) {
    $reproducciones = mt_rand(1000, 3000); // Entre 1000 y 3000 reproducciones
}
unset($reproducciones); // Desreferenciar

echo "<h1>Lista Original con Reproducciones Aleatorias</h1>";
foreach ($canciones_con_reproducciones as $cancion => $reproducciones) {
    echo "<b>$cancion</b>: $reproducciones reproducciones<br>";
}

// Ordenar por Nombre de Canción en Orden Ascendente
$canciones_asc = $canciones_con_reproducciones; // Copia del array
ksort($canciones_asc);
echo "<h2>Ordenado por Nombre de Canción (Ascendente)</h2>";
foreach ($canciones_asc as $cancion => $reproducciones) {
    echo "<b>$cancion</b>: $reproducciones reproducciones<br>";
}

// Ordenar por Nombre de Canción en Orden Descendente
$canciones_desc = $canciones_con_reproducciones; // Copia del array
krsort($canciones_desc);
echo "<h2>Ordenado por Nombre de Canción (Descendente)</h2>";
foreach ($canciones_desc as $cancion => $reproducciones) {
    echo "<b>$cancion</b>: $reproducciones reproducciones<br>";
}

// Ordenar por Número de Reproducciones en Orden Ascendente
$reproducciones_asc = $canciones_con_reproducciones; // Copia del array
asort($reproducciones_asc);
echo "<h2>Ordenado por Número de Reproducciones (Ascendente)</h2>";
foreach ($reproducciones_asc as $cancion => $reproducciones) {
    echo "<b>$cancion</b>: $reproducciones reproducciones<br>";
}

// Ordenar por Número de Reproducciones en Orden Descendente
$reproducciones_desc = $canciones_con_reproducciones; // Copia del array
arsort($reproducciones_desc);
echo "<h2>Ordenado por Número de Reproducciones (Descendente)</h2>";
foreach ($reproducciones_desc as $cancion => $reproducciones) {
    echo "<b>$cancion</b>: $reproducciones reproducciones<br>";
}

// Ordenar la Lista por Clave (Nombre de Canción) en Orden Ascendente
$claves_asc = $canciones_con_reproducciones; // Copia del array
ksort($claves_asc);
echo "<h2>Ordenado por Clave (Nombre de Canción, Ascendente)</h2>";
foreach ($claves_asc as $cancion => $reproducciones) {
    echo "<b>$cancion</b>: $reproducciones reproducciones<br>";
}

// Ordenar la Lista por Clave (Nombre de Canción) en Orden Descendente
$claves_desc = $canciones_con_reproducciones; // Copia del array
krsort($claves_desc);
echo "<h2>Ordenado por Clave (Nombre de Canción, Descendente)</h2>";
foreach ($claves_desc as $cancion => $reproducciones) {
    echo "<b>$cancion</b>: $reproducciones reproducciones<br>";
}
?>
