<?php 
function calcuate_total($price, $quantity){
    $cost = $price * $quantity;
    $tax = $cost * (20/100);
    $total = $cost + $tax;
    return $total;
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
    <p>Mints: $<?= calcuate_total(2,5)?></p>
    <p>Toffee: $<?= calcuate_total(3,5)?></p>
    <p>Fudge: $<?= calcuate_total(5,4)?></p>
    <p>Chicle: $<?= calcuate_total(1.5,4)?></p>
</body>
</html>