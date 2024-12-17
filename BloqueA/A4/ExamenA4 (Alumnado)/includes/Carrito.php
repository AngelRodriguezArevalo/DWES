<?php
require_once("includes/Producto.php");
class Carrito {
    //propiedades
    private array $productos;
    private float $impuesto;

    //constructor
    function __construct(array $productos, float $impuesto = 0.21)
    {
        $this->productos = $productos;
        $this->impuesto  = $impuesto;
    }

    //funciones

    public function getProductos(): array
    {
        return $this->productos;
    }
    public function getImpuesto():float
    {
        return $this->impuesto;
    }
    public function agregarProductos (Producto $producto) : bool
    {
        //condicionante si existe un producto con el mismo id
        foreach($this->productos as $producto) {
            if($producto->getId()!=$producto->getId()){
                $this->productos[] = $producto;
                return true;
            }
        }  
        return false;     
    }

    public function calcularSubtotal(): float
    {
        $subtotal = 0;
        foreach($this->productos as $producto) {
            $subtotal += $producto->getPrecio() * $producto->getCantidad();
        }
        return $subtotal;
    }

    public function calcularImpuestos(): float
    {
        $impuestos = $this->calcularSubtotal()* $this->getImpuesto();
        /*
        foreach($this->productos as $producto) {
            $impuestos += $producto->getPrecio() * $this->getImpuesto();
        }
            */
        return $impuestos;
    }

    public function calcularTotal(): float
    {
        $total = $this->calcularSubtotal()+$this->calcularImpuestos();
        return $total;
    }

    //función mostrar carrito
    public function muestraCarrito():string
    { 
        $cadena ="";
        $productos = $this->getProductos();

        foreach ($productos as $producto){
            $cadena += "
            <tr>
                <td><?= {$producto->getNombre()} ?></td>
                <td><?= {$producto->getPrecio()} ?></td>
                <td><?= {$producto->getCantidad()} ?></td>
                <td><?= {$producto->getId()} ?></td>
            </tr>
            ";
        }

        return $cadena;
                   
    }
}