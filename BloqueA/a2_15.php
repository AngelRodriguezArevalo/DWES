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
    $totals[$i] = [
        'price' => $subtotal - $discount,
        'discount' => $discount

    ];
}
?>

<style>
    table {
        width: 50%;
        margin: 20px auto;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: #4CAF50;
        color: white;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #e1f5d5;
    }
</style>

<?php require 'includes/cabecera.php';?>
    <p><?= $greeting?></p>
    <h2><?=$product?> (Descuento)</h2>
    <table>
    <tr>
            <th>Meses</th>
            <th>Precio</th>
            <th>Descuento</th>
        </tr>
    <?php foreach ($totals as $quantity => $data) { ?>
        <tr>
            <td>
                <?= $quantity ?>
                mes<?= ($quantity === 1) ? '' : 'es'; ?>
            </td>
            <td>
                $<?= number_format($data['price'], 2) ?>
            </td>
            <td>
                $<?= number_format($data['discount'], 2) ?>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <?php include 'includes/piePagina.php'?>