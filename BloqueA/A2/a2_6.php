<?php
//$day = 'Tuesday';
$day = 'Wednesday';

$offer = match($day){
    'Monday' => '20% off chocolates',
    'Tuesday' => '20% off ice creams',
    'Saturday', 'Sunday' => '20% off mints',
    //default => '10% off your entire order',
};

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
    <h2>Offers on</h2>
    <p><?=$offer?></p>
</body>
</html>