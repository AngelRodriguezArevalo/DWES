<?php 
$frutas = ["manzana", "pera", "cereza", "plátano"];

function generarLista(array $lista, string $tipo) {
    switch ($tipo){
        case "ul":
            echo "<ul>";
            foreach ($lista as $item){
                echo "{$item}";
            }
            echo "<ul>";
        break;
        case "ol":
            echo "<ol>";
            foreach ($lista as $item){
                echo "{$item}";
            }
            echo "</ol>";
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php generarLista($frutas, "ul")?>
</body>
</html>