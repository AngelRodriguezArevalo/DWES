<?php
session_start();

$products = [
    1 => ["name" => "Laptop", "price" => 800],
    2 => ["name" => "Smartphone", "price" => 500],
    3 => ["name" => "Headphones", "price" => 100],
    4 => ["name" => "Tablet", "price" => 300]
];

// Vaciar el carrito
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit;
}

?>


<h1>Carrito de Compras</h1>

<?php if (empty($_SESSION['cart'])): ?>
    <p>Tu carrito está vacío.</p>
<?php else: ?>
    <ul>
        <?php $total = 0; ?>
        <?php foreach ($_SESSION['cart'] as $id => $item): ?>
            <li>
                <strong><?= $products[$id]["name"] ?></strong> - 
                Cantidad: <?= $item["quantity"] ?> - 
                Precio unitario: $<?= $item["price"] ?> - 
                Total: $<?= $item["quantity"] * $item["price"] ?>
            </li>
            <?php $total += $item["quantity"] * $item["price"]; ?>
        <?php endforeach; ?>
    </ul>

    <p><strong>Total a pagar: $<?= $total ?></strong></p>

    <form method="POST">
        <button type="submit" name="clear_cart">Vaciar Carrito</button>
    </form>

    <a href="checkout.php">Finalizar Compra</a>
<?php endif; ?>

<a href="products.php">Volver a productos</a>

