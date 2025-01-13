<?php
// Array de ciudades y direcciones
$cities  = [
    'London' => '48 Store Street, WC1E 7BS',
    'Sydney' => '151 Oxford Street, 2021',
    'NYC'    => '1242 7th Street, 10492',
    'Tokio'  => '1-1 Chiyoda, 100-0001', // Nueva entrada para Tokio
];

// Obtener la ciudad de la cadena de consulta
$city = $_GET['city'] ?? '';

// Verificar si la ciudad existe en el array
if ($city && isset($cities[$city])) {
    $address = $cities[$city];
} elseif ($city) {
    $address = 'Error: Ciudad no encontrada.'; // Mensaje de error para ciudades no válidas
} else {
    $address = 'Por favor, selecciona una ciudad.';
}
?>
<?php include 'includes/header.php' ?>

<!-- Enlaces a las ciudades -->
<?php foreach ($cities as $key => $value) { ?>
  <a href="get-2.php?city=<?= urlencode($key) ?>"><?= htmlspecialchars($key) ?></a>
<?php } ?>

<!-- Mostrar ciudad y dirección -->
<h1><?= htmlspecialchars($city) ?></h1>
<p><?= htmlspecialchars($address) ?></p>

<?php include 'includes/footer.php' ?>
