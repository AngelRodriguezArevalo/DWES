<?php
$best_sellers = [
    'Toffee',
    'Mints',
    'Fudge',
    'Chocolate',
    'Ice cream',
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
    <h1>Best sellers</h1>
        <?php foreach ($best_sellers as $candy){?>
            <p><?= $candy?></p>
        <?php } ?>
</body>
</html>