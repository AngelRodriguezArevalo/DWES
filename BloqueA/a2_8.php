<?php
$packs = 10;
$price = 2.99;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>The candy store</h1>
    <h2>Prices for Multiple packs</h2>
    <p>
        <?php
        do {
            echo $packs;
            echo ' packs cost $';
            echo $price * $packs;
            echo '<br>';
            $packs--;
        }
        while($packs > 0);
        ?>
    </p>
</body>
</html>