<?php
session_start(); 

// Lista de productos ficticios
$products = [
    1 => ["name" => "Laptop", "price" => 800],
    2 => ["name" => "Smartphone", "price" => 500],
    3 => ["name" => "Headphones", "price" => 100],
    4 => ["name" => "Tablet", "price" => 300]
];

// Agregar producto al carrito
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    
    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = ["quantity" => 1, "price" => $products[$product_id]["price"]];
    } else {
        $_SESSION['cart'][$product_id]["quantity"] += 1;
    }
    
    header("Location: cart.php");
    exit;
}

?>


<h1>Productos Disponibles</h1>
<ul>
    <?php foreach ($products as $id => $product): ?>
        <li>
            <strong><?= $product["name"] ?></strong> - $<?= $product["price"] ?>
            <form method="POST">
                <input type="hidden" name="product_id" value="<?= $id ?>">
                <button type="submit">Añadir al carrito</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>

<a href="cart.php">Ir al carrito</a>

