<?php 
declare(strict_types=1); //declaración de tipos estrictos

function generaArrayInt ($min, $max, $n = 10, $value = 7) : array {
    $array = [];

    //si no se define $value
    if ($value === 7){
        //por cada espacio en el array se le rellena con un número aleatorio entre min y max
        for($i=0; $i<=$n; $i++){
            $random = rand($min, $max);
            array_push($array, $random);
        }
    }else{
        //si se define $value se rellena el array con número consecutivos a partir de $value
        $num = $value;
        for($i=0; $i<=$n; $i++){      
            array_push($array, $num);
            $num++;
        }
    }

    return $array;  
}

//recorre el array e imprime el contenido
function muestraArray(array $array){
    echo "(";
    foreach( $array as $num){
        echo "{$num},";
    }
    echo ")";
}

//decuelve el min valor
function minArrayInt(array $array) {
    $min = min($array);
    return $min;
}
//devuelve el max valor
function maxArrayInt(array $array){
    $max = max($array);
    return $max;
}
//calcula la media y la devuelve
function mediaArrayInt(array $array) : int{
    $suma = 0;
    $cont = 0;
    foreach ($array as $num){
        $suma += $num;
        $cont++;
    }
    $media = $suma / $cont;
    return $media;
}
//recorre el array hasta que encuentra el número, si está devuelve true
function estaEnArrayInt(array $array, $numero) : bool {
    $estaEnArray = false;
    foreach ($array as $num){
        if ($num === $numero){
            $estaEnArray = true;
        }
    }
    return $estaEnArray;
}
//recorre el array y devuelve la posicion del número en el array
function posicionEnArray(array $array, $numero) : int{   
    $cont = 0;
    foreach ($array as $num){
        if ($num != $numero){
            $cont++;
        }
    }
    return $cont;
}
//devuelve los valores del array con la posición inversa
function volteaArray(array $array){
    echo "(";
    for ($i = count($array); $i >= 0; $i--){
        echo "{$array[$i]}";
    }
    echo ")";
}
//devuelve la suma de todos los valores del array
function sumaAcumulativaArray(array $array){
    static $suma = 0; //se mantiene entre llamadas
    foreach ($array as $num){
        $suma += $num;
    }
    return $num;
}

//array aleatorio
$array = generaArrayInt(1,10);

//array fijo
$arrayF = generaArrayInt(1,10,10,5);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Resultado de las funciones de array</h1>
    <h2>Array 1 (aleatorios)</h2>
    <p><?= muestraArray($array)?></p>
    <h2>Resultados de las Funciones</h2>
    <p>Mínimo: <?= minArrayInt($array)?></p>
    <p>Máximo: <?= maxArrayInt($array)?></p>
    <p>Mínimo: <?= minArrayInt($array)?></p>
    <p>Media: <?= mediaArrayInt($array)?></p>
    <p>¿Está el número indicado en el array?: <?= estaEnArrayInt($array, 50)?></p>
    <p>Posición del número indicado: <?= posicionEnArray($array, 50)?></p>
    <h2>Array modificado</h2>
    <p>Array volteado: <?= volteaArray($array)?></p>
    <h2>Suma acumulada</h2>
    <p><?= sumaAcumulativaArray($array)?></p>

    <h2>Array 2 (fijos)</h2>
    <p><?= muestraArray($arrayF)?></p>
    <h2>Resultados de las Funciones</h2>
    <p>Mínimo: <?= minArrayInt($arrayF)?></p>
    <p>Máximo: <?= maxArrayInt($arrayF)?></p>
    <p>Mínimo: <?= minArrayInt($arrayF)?></p>
    <p>Media: <?= mediaArrayInt($arrayF)?></p>
    <p>¿Está el número indicado en el array?: <?= estaEnArrayInt($arrayF, 50)?></p>
    <p>Posición del número indicado: <?= posicionEnArray($arrayF, 50)?></p>
    <h2>Array modificado</h2>
    <p>Array volteado: <?= volteaArray($arrayF)?></p>
    <h2>Suma acumulada</h2>
    <p><?= sumaAcumulativaArray($arrayF)?></p>
    
</body>
</html>