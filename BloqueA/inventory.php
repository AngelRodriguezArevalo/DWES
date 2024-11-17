<?php
declare(strict_types=1);

// Tasa de impuestos
$stax_rate = 12;

// Array asociativo con información de los libros
$books = [
    [
        'title' => 'The Great Gatsby',
        'price' => 10.99,
        'stock' => 20
    ],
    [
        'title' => '1984',
        'price' => 15.50,
        'stock' => 15
    ],
    [
        'title' => 'To Kill a Mockingbird',
        'price' => 12.75,
        'stock' => 10
    ],
    [
        'title' => 'Pride and Prejudice',
        'price' => 9.99,
        'stock' => 25
    ],
    [
        'title' => 'Moby Dick',
        'price' => 18.50,
        'stock' => 8
    ]
];

// Funciones
function get_total_stock(array $books): int {
    $total_stock = 0;
    foreach ($books as $book) {
        $total_stock += $book['stock'];
    }
    return $total_stock;
}

function get_inventory_value(float $price, int $stock): float {
    return $price * $stock;
}

function calculate_tax(float $inventory_value, float $tax_rate): float {
    return $inventory_value * ($tax_rate / 100);
}

// Cálculos
$total_stock = get_total_stock($books);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore Inventory Management</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e1f5d5;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Bookstore Inventory Management</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Total Inventory Value</th>
            <th>Tax to Pay</th>
        </tr>
        <?php foreach ($books as $book) { 
            $inventory_value = get_inventory_value($book['price'], $book['stock']);
            $tax_to_pay = calculate_tax($inventory_value, $stax_rate);
        ?>
        <tr>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td>$<?= number_format($book['price'], 2) ?></td>
            <td><?= $book['stock'] ?></td>
            <td>$<?= number_format($inventory_value, 2) ?></td>
            <td>$<?= number_format($tax_to_pay, 2) ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="2"><strong>Total</strong></td>
            <td><strong><?= $total_stock ?></strong></td>
            <td colspan="2"></td>
        </tr>
    </table>
</body>
</html>