<?php
session_start();

if (!empty($_SESSION['cart'])) {
    unset($_SESSION['cart']);
    $message = "Gracias por tu compra. Tu pedido ha sido procesado.";
} else {
    $message = "No tienes productos en el carrito.";
}
?>

<h1>Finalizar Compra</h1>
<p><?= $message ?></p>

<a href="products.php">Volver a productos</a>

