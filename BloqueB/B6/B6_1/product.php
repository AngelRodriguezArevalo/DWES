<?php
// Array de productos con detalles adicionales
$products = [
    'Laptop' => [
        'description' => 'Una laptop de alta gama con 16GB de RAM y 512GB SSD.',
        'price' => '$1200',
        'availability' => 'En stock',
    ],
    'Smartphone' => [
        'description' => 'Un smartphone con una cámara avanzada y batería de larga duración.',
        'price' => '$800',
        'availability' => 'En stock',
    ],
    'Tablet' => [
        'description' => 'Una tablet perfecta para el entretenimiento y la lectura.',
        'price' => '$300',
        'availability' => 'Pocas unidades',
    ],
    'Smartwatch' => [
        'description' => 'Un smartwatch elegante con monitoreo de salud integrado.',
        'price' => '$250',
        'availability' => 'Agotado',
    ],
];

// Obtener el producto de la cadena de consulta
$productKey = $_GET['product'] ?? null;

// Validar si el producto existe
if ($productKey && isset($products[$productKey])) {
    $product = $products[$productKey];
} else {
    $product = null;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <style>
        /* General reset */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            line-height: 1.6;
            padding: 20px;
        }

        /* Header */
        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        /* Product details container */
        .product-details {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .product-details:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Details */
        .product-details p {
            margin: 10px 0;
        }

        .product-details strong {
            color: #343a40;
        }

        /* Back link */
        .product-details a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            transition: color 0.2s;
        }

        .product-details a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        /* Error message */
        .error-message {
            text-align: center;
            color: #dc3545;
        }

    </style>
</head>
<body>
    <?php if ($product): ?>
        <h1>Detalles del Producto: <?= htmlspecialchars($productKey) ?></h1>
        <p><strong>Descripción:</strong> <?= htmlspecialchars($product['description']) ?></p>
        <p><strong>Precio:</strong> <?= htmlspecialchars($product['price']) ?></p>
        <p><strong>Disponibilidad:</strong> <?= htmlspecialchars($product['availability']) ?></p>
        <a href="index.php">Volver a la lista de productos</a>
    <?php else: ?>
        <h1>Producto no encontrado</h1>
        <a href="index.php">Volver a la lista de productos</a>
    <?php endif; ?>
</body>
</html>
