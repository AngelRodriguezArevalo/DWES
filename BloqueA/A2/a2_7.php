<?php
$counter = 1;
$packs = 10;
$price = 1.99;
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
        while($counter < $packs){
            echo $counter;
            echo ' pack cost $';
            echo $price * $counter;
            echo '<br>';
            $counter++;
        }
        ?>
    </p>
</body>
</html>