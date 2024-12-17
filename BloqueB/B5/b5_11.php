<?php
// Definir constante para el nombre de la red social
define('SOCIAL_NETWORK_NAME', 'MyHobbiesNetwork');

// Array predefinido de intereses
$interests = [
    "Photography",
    "Music",
    "Traveling",
    "Gaming",
    "Cooking",
];

// Función para agregar un nuevo interés
function addInterest(&$interests, $newInterest) {
    // Añadir nuevo interés al array
    $interests[] = $newInterest;
    
    // Redirigir a una página de agradecimiento después de agregar
    header('Location: thanks.php');
    exit;
}

// Simulación de agregar un interés (esto normalmente lo haría un formulario de usuario)
if (isset($_POST['add_interest'])) {
    $newInterest = $_POST['new_interest']; // Suponiendo que el usuario ingresa un interés
    addInterest($interests, $newInterest);
}

// Numerar aleatoriamente los intereses y asignar identificadores únicos
$interestWithIds = [];
foreach ($interests as $interest) {
    // Generar un identificador único para cada interés
    $uniqueId = mt_rand(1000, 9999);
    $interestWithIds[] = ['id' => $uniqueId, 'interest' => $interest];
}

// Ordenar la lista de intereses por el identificador
usort($interestWithIds, function ($a, $b) {
    return $a['id'] <=> $b['id']; // Orden ascendente por ID
});

// Mostrar la lista de intereses con sus identificadores asignados
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Social: <?= SOCIAL_NETWORK_NAME ?></title>
</head>
<body>
    <h1>Bienvenido a <?= SOCIAL_NETWORK_NAME ?></h1>

    <h2>Lista de Intereses:</h2>
    <ul>
        <?php foreach ($interestWithIds as $item) { ?>
            <li><b>Interés ID: <?= $item['id'] ?></b> - <?= $item['interest'] ?></li>
        <?php } ?>
    </ul>

    <h2>Agregar Nuevo Interés:</h2>
    <form action="" method="POST">
        <label for="new_interest">Nuevo Interés: </label>
        <input type="text" name="new_interest" id="new_interest" required>
        <button type="submit" name="add_interest">Agregar Interés</button>
    </form>
</body>
</html>
