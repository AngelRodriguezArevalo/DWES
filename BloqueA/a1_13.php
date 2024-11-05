<?php
$username = 'Angel';
$greeting = 'Hi, ' . $username . '.';

$offers = [
    [
        'item' => 'Pasta Carbonara',
        'qty' => 2,
        'price' => 12,
        'discount' => 10,
    ],
    [
        'item' => 'Pizza Margherita',
        'qty' => 3,
        'price' => 15,
        'discount' => 12,
    ],
    [
        'item' => 'Caesar Salad',
        'qty' => 2,
        'price' => 8,
        'discount' => 6,
    ],
    [
        'item' => 'Grilled Salmon',
        'qty' => 1,
        'price' => 20,
        'discount' => 16,
    ],
    [
        'item' => 'Chocolate Cake',
        'qty' => 3,
        'price' => 7,
        'discount' => 5,
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pepito's Restaurant</h1>
    <h2>Special Offers for You</h2>
    <p><?= $greeting?></p>
    <?php foreach ($offers as $offer): 
        $usual_price = $offer['qty'] * $offer['price'];
        $offer_price = $offer['qty'] * $offer['discount'];
        $saving = $usual_price - $offer_price;
    ?>
        <div class="offer">
            <h3><?= $offer['item'] ?> Offer</h3>
            <p>Buy <?= $offer['qty'] ?> for $<?= $offer_price ?> <br>
               (usual price $<?= $usual_price ?>)</p>
            <p class="sticker">Save $<?= $saving ?></p>
        </div>
    <?php endforeach; ?> 
</body>
</html>