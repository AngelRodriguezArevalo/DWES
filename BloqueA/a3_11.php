<?php
function calculate_cost($cost, $quantity, $discount = 0, $tax = 20, $shipping = 0) {
    $subtotal = $cost * $quantity;
    $tax_amount = $subtotal * ($tax / 100);
    $total = $subtotal + $tax_amount + $shipping - $discount;
    return $total;
}
$products = [
    [
        'name' => 'Dark chocolate',
        'cost' => 5,
        'quantity' => 10,
        'discount' => 5,
        'tax' => 15,
        'shipping' => 2
    ],
    [
        'name' => 'Milk chocolate',
        'cost' => 3,
        'quantity' => 4,
        'discount' => 0,
        'tax' => 10,
        'shipping' => 1.5
    ],
    [
        'name' => 'White chocolate',
        'cost' => 4,
        'quantity' => 15,
        'discount' => 20,
        'tax' => 20,
        'shipping' => 3
    ],
    [
        'name' => 'Caramel chocolate',
        'cost' => 6,
        'quantity' => 8,
        'discount' => 10,
        'tax' => 18,
        'shipping' => 2.5
    ],
    [
        'name' => 'Nestle chocolate',
        'cost' => 7,
        'quantity' => 5,
        'discount' => 5,
        'tax' => 12,
        'shipping' => 1
    ]
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
            <th>Shipping</th>
            <th>Total Cost</th>
        </tr>
        <?php foreach ($products as $product) { ?>
        <tr>
            <td><?= $product['name'] ?></td>
            <td>$<?= $product['cost'] ?></td>
            <td><?= $product['quantity'] ?></td>
            <td>$<?= $product['discount'] ?></td>
            <td><?= $product['tax'] ?>%</td>
            <td>$<?= $product['shipping'] ?></td>
            <td>
                $<?= number_format(calculate_cost(
                        cost: $product['cost'],
                        quantity: $product['quantity'],
                        discount: $product['discount'],
                        tax: $product['tax'],
                        shipping: $product['shipping']
                    ), 2) ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>