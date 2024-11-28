<?php

class Vehicle
{
    public string $make;
    public string $model;
    public string $licensePlate;
    private bool $available;

    public function __construct(string $make, string $model, string $licensePlate, bool $available = true)
    {
        $this->make = $make;
        $this->model = $model;
        $this->licensePlate = $licensePlate;
        $this->available = $available;
    }

    public function getDetails(): string
    {
        return "{$this->make} {$this->model} - License Plate: {$this->licensePlate}";
    }

    public function isAvailable(): bool
    {
        return $this->available;
    }

    public function setAvailability(bool $status): void
    {
        $this->available = $status;
    }
}

class Fleet
{
    public string $name;
    private array $vehicles;

    public function __construct(string $name, array $vehicles = [])
    {
        $this->name = $name;
        $this->vehicles = $vehicles;
    }

    public function addVehicle(Vehicle $vehicle): void
    {
        $this->vehicles[] = $vehicle;
    }

    public function listVehicles(): array
    {
        return $this->vehicles;
    }

    public function listAvailableVehicles(): array
    {
        return array_filter($this->vehicles, fn($vehicle) => $vehicle->isAvailable());
    }
}

// Crear una instancia de Fleet
$fleet = new Fleet("Coches Pepe");

// Crear instancias de Vehicle
$vehicle1 = new Vehicle("Volkswagen", "Golf", "1495GHR", true);
$vehicle2 = new Vehicle("Subaru", "Impreza", "9182IUQ", false);
$vehicle3 = new Vehicle("Audi", "A4", "7492JRY", true);
$vehicle4 = new Vehicle("Porsche", "Macan", "2714QER", false);
$vehicle5 = new Vehicle("Land Rover", "Discovery", "2194LMN", true);

// Agregar vehículos a la flota
$fleet->addVehicle($vehicle1);
$fleet->addVehicle($vehicle2);
$fleet->addVehicle($vehicle3);
$fleet->addVehicle($vehicle4);
$fleet->addVehicle($vehicle5);

// Obtener información de la flota
$allVehicles = $fleet->listVehicles();
$availableVehicles = $fleet->listAvailableVehicles();
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
        <section>
            <h1>Fleet: <?= $fleet->name ?></h1>
            
            <h2>All Vehicles</h2>
            <table border="1" cellpadding="10">
                <thead>
                    <tr>
                        <th>Make</th>
                        <th>Model</th>
                        <th>License Plate</th>
                        <th>Available</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allVehicles as $vehicle): ?>
                        <tr>
                            <td><?= $vehicle->make ?></td>
                            <td><?= $vehicle->model ?></td>
                            <td><?= $vehicle->licensePlate ?></td>
                            <td><?= $vehicle->isAvailable() ? 'Yes' : 'No' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Available Vehicles</h2>
            <table border="1" cellpadding="10">
                <thead>
                    <tr>
                        <th>Make</th>
                        <th>Model</th>
                        <th>License Plate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($availableVehicles as $vehicle): ?>
                        <tr>
                            <td><?= $vehicle->make ?></td>
                            <td><?= $vehicle->model ?></td>
                            <td><?= $vehicle->licensePlate ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>