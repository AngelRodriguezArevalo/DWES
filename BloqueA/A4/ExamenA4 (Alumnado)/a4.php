<?php

declare(strict_types=1);
require "includes/Producto.php";
require "includes/Carrito.php";

$mensaje = "";

/*
    TAREAS A REALIZAR:
*/

// Generar 10 productos (los IDs que contengan deben ser del 1 al 10)
$producto1 = new Producto("producto1", rand(0,100), (int)rand(1,100), 1);
$producto2 = new Producto("producto2", rand(0,100), (int)rand(1,100), 2);
$producto3 = new Producto("producto3", rand(0,100), (int)rand(1,100), 3);
$producto4 = new Producto("producto4", rand(0,100), (int)rand(1,100), 4);
$producto5 = new Producto("producto5", rand(0,100), (int)rand(1,100), 5);
$producto6 = new Producto("producto6", rand(0,100), (int)rand(1,100), 6);
$producto7 = new Producto("producto7", rand(0,100), (int)rand(1,100), 7);
$producto8 = new Producto("producto8", rand(0,100), (int)rand(1,100), 8);
$producto9 = new Producto("producto9", rand(0,100), (int)rand(1,100), 9);
$producto10 = new Producto("producto10", rand(0,100), (int)rand(1,100), 10);


// Prueba a asignarle una cadena vacía como un nombre del producto con id 1, guardando en una variable $resultadoPruebaNombre una cadena que muestre el resultado de la asignación
if($producto->setNombre("")){
    $mensaje = "Operación realizada correctamente";
}else{
    $mensaje = "Error. El nombre no puede estar vacío";
}
$resultadoPruebaNombre = $mensaje;

// Prueba a asignarle la cantidad -20 a la cantidad del producto con id 2, guardando en una variable $resultadoPruebaCantidad una cadena que muestre el resultado de la asignación
if($producto->setCantidad(-20)){
    $mensaje = "Operación realizada correctamente";
}else{
    $mensaje = "Error. La cantidad no puede ser negativa";
}
$resultadoPruebaCantidad = $mensaje;

// Prueba a asignarle el ID 0 al producto con id 3, guardando en una variable $resultadoPruebaId una cadena que muestre el resultado de la asignación
if($producto->setId(3)){
    $mensaje = "Operación realizada correctamente";
}else{
    $mensaje = "Error. El ID ya existe";
}
$resultadoPruebaId = $mensaje;

// Crea un objeto Carrito que contenga los 10 productos anteriores usando el constructor de la clase Carrito
$miCarrito = new Carrito([$producto1,$producto2,$producto3,$producto4,$producto5,$producto6,$producto7,$producto8,$producto9,$producto10,]);

// Prueba a añadir el producto con id 4 al array de productos contenido en el objeto $miCarrito, guardando en una variable $resultadoPruebaAñadirProducto una cadena que muestre el resultado de la asignación
if($miCarrito->agregarProductos($producto4)){
    $mensaje = "Operación realizada correctamente";
}else{
    $mensaje = "Error. El ID ya existe";
}
$resultadoPruebaAñadirProducto = $mensaje;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Carrito de Compras</h1>

<h2>Resultado de las operaciones realizadas</h2>
<ul>
    <li>Resultado cambio de nombre del producto con ID 1: <?= $resultadoPruebaNombre ?> </li>
    <li>Resultado cambio de cantidad del producto con ID 2: <?= $resultadoPruebaCantidad ?> </li>
    <li>Resultado cambio de ID del producto con ID 3: <?= $resultadoPruebaId ?> </li>
    <li>Resultado de añadir el producto con ID 4: <?= $resultadoPruebaAñadirProducto ?> </li>
</ul>
<br>
<hr>
<h2>Detalles del carrito</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $miCarrito->muestraCarrito(); ?>
    </tbody>
</table>

<br>
<hr>
<h2>Resumen del Carrito</h2>
<p>Subtotal: <?= $miCarrito->calcularSubtotal() ?> €</p>
<p>Impuestos (21%): <?= $miCarrito->calcularImpuestos() ?> €</p>
<p class="total">Total: <?= $miCarrito->calcularTotal() ?> €</p>

</body>
</html>
