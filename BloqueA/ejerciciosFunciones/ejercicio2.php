<?php
function calcularArea($dimension1, $dimension2 = null, $figura){
    switch ($figura){
        case "cuadrado":
            $area = $dimension1 * $dimension2;
            echo "<p>El área de un {$figura} de {$dimension1}x{$dimension2} es {$area}.</p>";
            break;
    }
}

function numRandom () : int{
    $random = rand(0, 10);
    return $random;
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
    <?= calcularArea(numRandom(), numRandom(),"cuadrado")?>
</body>
</html>