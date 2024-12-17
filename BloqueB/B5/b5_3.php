<?php
// Simulación de datos de entrada del usuario
$nombre = "   Angel Rodriguez   ";
$correo = "   ANGEL.RODRIGUEZ@EXAMPLE.COM   ";
$mensaje = "Este mensaje es urgente. Por favor, responde lo antes posible. Además, contiene palabras inapropiadas como tonto y feo.";

// Mostrar los datos originales
echo "<h2>Datos Originales</h2>";
echo "<strong>Nombre:</strong> '$nombre'<br>";
echo "<strong>Correo:</strong> '$correo'<br>";
echo "<strong>Mensaje:</strong> '$mensaje'<br>";

// 1. Eliminar espacios en blanco adicionales
$nombre = trim($nombre);
$correo = trim($correo);
$mensaje = trim($mensaje);

// 2. Asegurar que el correo está en minúsculas
$correo = strtolower($correo);

// 3. Reemplazar palabras inapropiadas en el mensaje
$palabras_inapropiadas = ["tonto", "feo"];
$mensaje = str_replace($palabras_inapropiadas, "****", $mensaje);

// 4. Reemplazo insensible a mayúsculas/minúsculas
$mensaje = str_ireplace("urgente", "Prioridad Alta", $mensaje);

// 5. Repetir una cadena para enfatizar
$mensaje .= str_repeat("!", 3);

// Mostrar los datos procesados
echo "<h2>Datos Procesados</h2>";
echo "<strong>Nombre:</strong> '$nombre'<br>";
echo "<strong>Correo:</strong> '$correo'<br>";
echo "<strong>Mensaje:</strong> '$mensaje'<br>";
?>
