<?php
// Lista de canciones inicial
$playlist = [
    "Blinding Lights - The Weeknd",
    "Estoy enfermo - Pignoise",
    "Levitating - Dua Lipa",
    "One more night - Maroon 5",
    "Feel Good Inc. - Gorillaz"
];

// Mostrar la lista inicial
echo "<h3>Lista de Reproducción Inicial</h3>";
echo implode(", ", $playlist) . "<br><br>";

// Agregar canciones al inicio y al final de la lista
$newSongStart = "Bohemian Rhapsody - Queen";
$newSongEnd = "Shape of You - Ed Sheeran";

array_unshift($playlist, $newSongStart); // Agregar al inicio
array_push($playlist, $newSongEnd); // Agregar al final

echo "<h3>Lista Después de Agregar Canciones</h3>";
echo implode(", ", $playlist) . "<br><br>";

// Eliminar canciones del inicio y del final de la lista
$removedStart = array_shift($playlist); // Eliminar del inicio
$removedEnd = array_pop($playlist); // Eliminar del final

echo "<h3>Lista Después de Eliminar Canciones</h3>";
echo "Eliminada del inicio: $removedStart<br>";
echo "Eliminada del final: $removedEnd<br>";
echo "Lista actual: " . implode(", ", $playlist) . "<br><br>";

// Buscar una canción en la lista
$searchSong = "Levitating - Dua Lipa";
$searchIndex = array_search($searchSong, $playlist);
if ($searchIndex !== false) {
    echo "<h3>Búsqueda de Canción</h3>";
    echo "La canción '$searchSong' está en la posición $searchIndex de la lista.<br><br>";
} else {
    echo "La canción '$searchSong' no está en la lista.<br><br>";
}

// Verificar si una canción está en la lista
$checkSong = "Blinding Lights - The Weeknd";
if (in_array($checkSong, $playlist)) {
    echo "<h3>Verificación de Canción</h3>";
    echo "La canción '$checkSong' está en la lista.<br><br>";
} else {
    echo "La canción '$checkSong' no está en la lista.<br><br>";
}

// Contar el número de canciones
$totalSongs = count($playlist);
echo "<h3>Conteo de Canciones</h3>";
echo "Total de canciones en la lista: $totalSongs<br><br>";

// Seleccionar canciones aleatorias
$randomKeys = array_rand($playlist, 2); // Seleccionar dos canciones aleatorias
echo "<h3>Canciones Aleatorias</h3>";
echo "Canción 1: " . $playlist[$randomKeys[0]] . "<br>";
echo "Canción 2: " . $playlist[$randomKeys[1]] . "<br><br>";

// Mostrar la lista como cadena
$playlistString = implode(" | ", $playlist);
echo "<h3>Lista de Reproducción como Cadena</h3>";
echo $playlistString . "<br><br>";

// Dividir la cadena en canciones
$splitPlaylist = explode(" | ", $playlistString);
echo "<h3>Lista Dividida en Canciones</h3>";
print_r($splitPlaylist);
echo "<br><br>";

// Eliminar canciones duplicadas
$playlist[] = "Blinding Lights - The Weeknd"; // Agregar duplicado
$uniquePlaylist = array_unique($playlist);
echo "<h3>Lista Después de Eliminar Duplicados</h3>";
echo implode(", ", $uniquePlaylist) . "<br><br>";

// Fusionar listas de reproducción
$additionalPlaylist = [
    "Someone Like You - Adele",
    "Uptown Funk - Bruno Mars",
    "Blinding Lights - The Weeknd" // Duplicado intencional
];
$mergedPlaylist = array_merge($uniquePlaylist, $additionalPlaylist);
echo "<h3>Lista Fusionada</h3>";
echo implode(", ", $mergedPlaylist) . "<br><br>";
?>
