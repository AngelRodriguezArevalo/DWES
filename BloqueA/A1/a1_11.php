<?php 
$item = 'Chocolate';
$stock = 3;
$wanted = 5;
$deliver = true;
$can_buy = (($wanted <= $stock) && ($deliver == true));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Shopping cart</h2>
    <p>Item: <?= $item?></p>
    <p>Stock: <?= $stock?></p>
    <p>Wanted: <?= $wanted?></p>
    <p>Can buy: <?= $can_buy?></p>
</body>
</html>