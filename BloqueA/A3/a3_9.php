<?php
$products = [
    'Mints' => 25,
    'Toffee' => 10,
    'Fudge' => 5,
    'Chicle' => 0
];
function get_stock_message($stock) {
    if ($stock > 10) {
        return 'Good availability';
    }
    if ($stock === 10) {
        return 'Exactly 10 items in stock';
    }
    if ($stock > 0 && $stock < 10) {
        return 'Low stock';
    }
    return 'Out of stock';
}
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
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>
    <table>
        <tr>
            <th>Product</th>
            <th>Stock</th>
            <th>Status</th>
        </tr>
        <?php foreach ($products as $product => $stock) { ?>
        <tr>
            <td><?= $product ?></td>
            <td><?= $stock ?></td>
            <td><?= get_stock_message($stock) ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>