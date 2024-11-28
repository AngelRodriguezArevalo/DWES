<?php
    declare(strict_types = 1);
    class Account
    {
        public int    $number;
        public string $type;
        public float  $balance;
        private string $owner;

        public function __construct(int $number, string $type, float $balance = 0.00, string $owner = "Desconocido")
        {
            $this->number  = $number;
            $this->type    = $type;
            $this->balance = $balance;
            $this->owner = $owner;
        }
        public function deposit(float $amount): float
        {
            $this->balance += $amount;
            return $this->balance;
        }
        public function withdraw(float $amount): float
        {
            $this->balance -= $amount;
            return $this->balance;
        }

        // Método para obtener el propietario GET
        public function getOwner(): string
        {
            return $this->owner;
        }

        // Método para actualizar el propietario SET
        public function setOwner(string $owner): void
        {
            $this->owner = $owner;
        }
    }

    // Crear instancias
    $checking = new Account(43161176, 'Checking', 32.00, 'Alice Johnson');
    $savings  = new Account(20148896, 'Savings', 756.00, 'Bob Smith');
    $investment = new Account(30256981, 'Investment', 5000.00);

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
    <main>
        <h1>Detalles de las Cuentas</h1>
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left;">
            <thead>
                <tr>
                    <th>Propietario</th>
                    <th>Número de Cuenta</th>
                    <th>Tipo</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $checking->getOwner() ?></td>
                    <td><?= $checking->number ?></td>
                    <td><?= $checking->type ?></td>
                    <td>$<?= number_format($checking->balance, 2) ?></td>
                </tr>
                <tr>
                    <td><?= $savings->getOwner() ?></td>
                    <td><?= $savings->number ?></td>
                    <td><?= $savings->type ?></td>
                    <td>$<?= number_format($savings->balance, 2) ?></td>
                </tr>
                <tr>
                    <td><?= $investment->getOwner() ?></td>
                    <td><?= $investment->number ?></td>
                    <td><?= $investment->type ?></td>
                    <td>$<?= number_format($investment->balance, 2) ?></td>
                </tr>
            </tbody>
        </table>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>