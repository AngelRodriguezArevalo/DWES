<?php
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
        for($i = 1; $i <= 20; $i++) {
            echo $i;
            echo ' pack cost $';
            echo $price * $i;
            echo '<br>';
        }
        ?>
    </p>
</body>
</html>