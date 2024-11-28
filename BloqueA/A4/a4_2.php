<?php
// Importar la clase Product
require_once 'classes/Product.php'; 

// Crear instancias de la clase Product
$product1 = new Product("P001", "Ferrari", 7990000.99, 10);
$product2 = new Product("P002", "Ford", 19000.99, 50);
$product3 = new Product("P003", "Seat", 4900.99, 20);

$products = [$product1, $product2, $product3];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <h1>Listado de Coches</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product->id ?></td>
                    <td><?= $product->name ?></td>
                    <td>$ <?= number_format($product->price, 2) ?></td>
                    <td><?= number_format($product->stock, 0) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>