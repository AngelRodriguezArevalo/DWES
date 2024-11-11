<?php 
$name = 'Angel';
$greeting = 'Hola';
if($name){
    $greeting = 'Bienvenido, ' . $name;
}
$product = 'Cuota Club Deportivo';
$cost = 10;

for($i = 1; $i <= 12; $i++){
    $subtotal = $cost * $i;
    $discount = ($subtotal/100)*($i*4);
    $totals[$i] = $subtotal - $discount;
}
?>
<?php require 'includes/cabecera.php';?>
    <p><?= $greeting?></p>
    <h2><?=$product?> (Descuento)</h2>
    <table>
        <tr>
            <th>Meses</th>
            <th>Precio</th>
        </tr>
        <?php foreach ($totals as $quantity => $price){ ?>
        <tr>
            <td>
                <?= $quantity?>
                mes<?= ($quantity === 1) ? '':'es';?>
            </td>
            <td>
                $<?=$price?>
            </td>
        </tr>
        <?php }?>
    </table>
    <?php include 'includes/piePagina.php'?>