<?php
$day = 'Wednesday';

switch($day){
    case 'Monday':
        $offer = '20% off chocolates';
        break;
    case 'Tuesday':
        $offer = '20% off mints';
        break;
    case 'Wednesday':
        $offer = '50% off chocolate';
        break;
    default:
        $offer = 'Buy three packs, get one free';
}
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