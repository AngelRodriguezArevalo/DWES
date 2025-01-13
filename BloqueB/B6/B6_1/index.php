<?php
// Array de productos y detalles básicos
$products = [
    'Laptop' => 'Una laptop de alta gama con 16GB de RAM y 512GB SSD.',
    'Smartphone' => 'Un smartphone con una cámara avanzada y batería de larga duración.',
    'Tablet' => 'Una tablet perfecta para el entretenimiento y la lectura.',
    'Smartwatch' => 'Un smartwatch elegante con monitoreo de salud integrado.',
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <style>
        /* General reset */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            line-height: 1.6;
        }

        /* Header */
        h1 {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            margin: 0;
        }

        /* Container for the list */
        ul {
            list-style: none;
            padding: 0;
            margin: 20px auto;
            max-width: 600px;
        }

        /* List items */
        ul li {
            background-color: #ffffff;
            margin: 10px 0;
            padding: 15px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        /* Links */
        ul li a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            font-size: 18px;
        }

        /* Hover effects */
        ul li:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        ul li a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <h1>Lista de Productos</h1>
    <ul>
        <?php foreach ($products as $product => $description) { ?>
            <li><a href="product.php?product=<?= urlencode($product) ?>"><?= htmlspecialchars($product) ?></a></li>
        <?php } ?>
    </ul>
</body>
</html>
