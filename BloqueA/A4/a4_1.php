<?php
class Customer
{
    public string $forename;
    public string $surname;
    public string $email;
    public string $password;
}

class Account
{
    public int $number;
    public string $type;
    public float $balance;
}

// Crear objetos
$customer = new Customer();
$account = new Account();

// Establecer valores para las propiedades
$customer->forename = 'Ivy';
$customer->surname = 'Green';
$customer->email = 'ivy@eg.link';
$account->balance = 1000.00;
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
    <?php include 'includes/header.php'; ?>
    <p>Nombre: <?= $customer->forename . ' ' . $customer->surname ?></p>
    <p>Email: <?= $customer->email ?></p>
    <p>Balance: $<?= number_format($account->balance, 2) ?></p>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
