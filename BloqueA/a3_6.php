<?php
$us_price = 4;
$rates = [
    'uk' => 0.81,
    'eu' => 0.93,
    'jp' => 113.21,
    'aud' => 1.30,
    'cad' => 1.24,
];

$products = [
    'Chocolate Bar' => 5.00, 
    'Candy Pack' => 3.50, 
    'Lollipop' => 1.25, 
    'Toffee Box' => 7.00
];

function calculate_prices($usd, $exchange_rates){
    $prices = [
        'pound' => $usd * $exchange_rates['uk'],
        'euro' => $usd * $exchange_rates['eu'],
        'yen' => $usd * $exchange_rates['jp'],
        'aud' => $usd * $exchange_rates['aud'],
        'cad' => $usd * $exchange_rates['cad'],
    ];
    return $prices;
}

function format_price($price, $currency){
    $symbols = [
        'pound' => '&pound;', 
        'euro' => '&euro;',    
        'yen' => '&yen;',     
        'aud' => 'AU$',        
        'cad' => 'CA$',       
    ];
    return $symbols[$currency] . number_format($price, 2);
}

$global_prices = calculate_prices($us_price, $rates);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
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
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e1f5d5;
        }
    </style>
</head>
<body>
<table>
        <thead>
            <tr>
                <th>Product</th>
                <th>US $</th>
                <th>UK &pound;</th>
                <th>EU &euro;</th>
                <th>JP &yen;</th>
                <th>AU $</th>
                <th>CA $</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product => $price): 
                $prices = calculate_prices($price, $rates);
            ?>
            <tr>
                <td><?= $product ?></td>
                <td>$<?= number_format($price, 2) ?></td>
                <td><?= format_price($prices['pound'], 'pound') ?></td>
                <td><?= format_price($prices['euro'], 'euro') ?></td>
                <td><?= format_price($prices['yen'], 'yen') ?></td>
                <td><?= format_price($prices['aud'], 'aud') ?></td>
                <td><?= format_price($prices['cad'], 'cad') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>