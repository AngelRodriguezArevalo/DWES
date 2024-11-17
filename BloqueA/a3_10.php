<?php
function calculate_cost($cost, $quantity, $discount = 0, $tax_rate = 0) {
    $subtotal = $cost * $quantity;
    $discounted_total = $subtotal - $discount;
    $total_with_tax = $discounted_total + ($discounted_total * $tax_rate);
    return $total_with_tax;
}
$products = [
    ['name' => 'Dark chocolate', 'cost' => 5, 'quantity' => 10, 'discount' => 5, 'tax' => 0.1],
    ['name' => 'Milk chocolate', 'cost' => 3, 'quantity' => 4, 'discount' => 0, 'tax' => 0.05],
    ['name' => 'White chocolate', 'cost' => 4, 'quantity' => 15, 'discount' => 20, 'tax' => 0.2],
    ['name' => 'Caramel chocolate', 'cost' => 6, 'quantity' => 8, 'discount' => 10, 'tax' => 0.15],
    ['name' => 'Nestle chocolate', 'cost' => 7, 'quantity' => 5, 'discount' => 5, 'tax' => 0.1],
];
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
            <th>Cost per Unit</th>
            <th>Quantity</th>
            <th>Discount</th>
            <th>Tax Rate</th>
            <th>Total Cost</th>
        </tr>
        <?php foreach ($products as $product) { ?>
        <tr>
            <td><?= $product['name'] ?></td>
            <td>$<?= $product['cost'] ?></td>
            <td><?= $product['quantity'] ?></td>
            <td>$<?= $product['discount'] ?></td>
            <td><?= $product['tax'] * 100 ?>%</td>
            <td>
                $<?= number_format(calculate_cost(
                        $product['cost'],
                        $product['quantity'],
                        $product['discount'],
                        $product['tax']
                    ), 2) ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>