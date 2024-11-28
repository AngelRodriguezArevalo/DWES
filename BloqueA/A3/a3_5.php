<?php 
$tax_rate = 0.3;
$global_discount = 0.1;
function calculate_running_total($price, $quantity){
    global $tax_rate;
    global $global_discount;
    static $running_total = 0;
    $total = $price * $quantity;
    $discounted_total = $total - ($total * $global_discount);
    $tax = $discounted_total * $tax_rate;
    $running_total = $running_total + $discounted_total + $tax;
    return number_format($running_total, 2);
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
    <table>
        <tr>
            <th>Item</th><th>Price</th><th>Qty</th><th>Running total</th>
        </tr>
        <tr>
            <td>Mints:</td><td>$2</td><td>5</td><td>$<?=calculate_running_total(2,5)?></td>           
        </tr>
        <tr>
            <td>Toffee:</td><td>$3</td><td>5</td><td>$<?=calculate_running_total(3,5)?></td>           
        </tr>
        <tr>
            <td>Fudge:</td><td>$5</td><td>4</td><td>$<?=calculate_running_total(5,4)?></td>           
        </tr>
        <tr>
            <td>Chicle:</td><td>$1</td><td>6</td><td>$<?=calculate_running_total(1,6)?></td>           
        </tr>
    </table>
</body>
</html>