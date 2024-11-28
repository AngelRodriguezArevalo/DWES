<?php
$products = [
    'Toffee' => 2.99,
    'Mints' => 1.99,
    'Fudge' => 3.49,
    'Chocolate' => 30.20,
    'Ice cream' => 3.78,
]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Price List</h1>
    <table>
        <tr>
            <th>Item</th>
            <th>Price</th>
        </tr>
        <?php foreach ($products as $item => $price){?>
            <tr>
                <td><?= $item ?></td>
                <td>$<?= $price ?></td>
            </tr>

        <?php } ?>
    </table>
</body>
</html>