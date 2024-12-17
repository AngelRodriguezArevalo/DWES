<?php
// Tipos de hamburguesas y sus precios
$hamburguesas = [
    "Hamburguesa Clásica" => 5.50,
    "Hamburguesa con Queso" => 6.75,
    "Hamburguesa BBQ" => 7.25,
    "Hamburguesa Vegetariana" => 6.00
];

// Generar una cantidad aleatoria de ventas entre 50 y 100
$cantidadVentas = mt_rand(50, 100);
echo "<h3>Simulación de Ventas del Día</h3>";
echo "Total de ventas generadas: $cantidadVentas<br><br>";

// Inicializar variables
$totalDia = 0; // Total de todas las ventas del día
$ventasDetalles = []; // Detalles de cada venta

// Generar ventas aleatorias
for ($i = 0; $i < $cantidadVentas; $i++) {
    // Elegir un tipo de hamburguesa aleatoriamente
    $tipoHamburguesa = array_rand($hamburguesas);
    $precio = $hamburguesas[$tipoHamburguesa];

    // Cantidad aleatoria entre 1 y 5
    $cantidad = mt_rand(1, 5);

    // Calcular total de la venta
    $totalVenta = $cantidad * $precio;
    $totalVenta = round($totalVenta, 2); // Redondear a 2 decimales

    // Sumar al total del día
    $totalDia += $totalVenta;

    // Guardar detalles de la venta
    $ventasDetalles[] = [
        "tipo" => $tipoHamburguesa,
        "cantidad" => $cantidad,
        "total" => $totalVenta
    ];
}

// Formatear el total del día
$totalDiaFormateado = number_format($totalDia, 2);

// Mostrar detalles de las ventas
echo "<h3>Detalles de las Ventas</h3>";
foreach ($ventasDetalles as $venta) {
    echo "Tipo: {$venta['tipo']}, Cantidad: {$venta['cantidad']}, Total: $" . number_format($venta['total'], 2) . "<br>";
}

// Estadísticas
echo "<h3>Estadísticas del Día</h3>";
echo "Total de ventas del día: $$totalDiaFormateado<br>";
echo "Raíz cuadrada del total de ventas: " . round(sqrt($totalDia), 2) . "<br>";
echo "Total elevado al cuadrado: " . number_format(pow($totalDia, 2), 2) . "<br>";
echo "Redondeo hacia arriba (ceil): " . ceil($totalDia) . "<br>";
echo "Redondeo hacia abajo (floor): " . floor($totalDia) . "<br>";
?>
