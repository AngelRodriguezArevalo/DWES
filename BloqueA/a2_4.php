<?php
$sctock = 1;
$ordered = 3;

if($sctock > 0){
    $message = 'In stock';
}elseif($ordered > 0){
    $message = 'Coming soon';
}else{
    $message = 'Sold out';
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
    <h2>Chocolate</h2>
    <p><?= $message ?></p>
</body>
</html>