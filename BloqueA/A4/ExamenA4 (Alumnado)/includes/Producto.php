<?php
class Producto {

    //propiedades
    private string $nombre;
    private float $precio;
    private int $cantidad;
    private int $id;

    //constructor

    function __construct(string $nombre, float $precio, int $cantidad, int $id)
    {
        $this->nombre = $nombre;
        $this->precio  = $precio;
        $this->cantidad = $cantidad;
        $this->id = $id;
    }

    //FUNCIONES

    //GETTERS
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    public function getId(): int
    {
        return $this->id;
    }

    //SETTERS
    public function setNombre(string $nombre): bool
    {
        if($nombre != ""){ //condicion: si no esta vacío
            $this->nombre = $nombre;
            return true;
        }else{
            return false;
        }      
    }
    public function setCantidad(int $cantidad): bool
    {
        if($cantidad > 0){ //condición: debe ser mayor que 0
            $this->cantidad = $cantidad;
            return true;
        }else{
            return false;
        }
    }
    public function setId(int $id): bool
    {
        if($id > 0){
            $this->id = $id;
            return true;
        }else{
            return false;
        }
    }
    public function setPrecio($precio): bool
    {
        if($precio > 0){ // condición: debe ser mayor que 0
            $this->precio = $precio;
            return true;
        }else{
            return false;
        }
    }

    //metodo getPrecioTotal
    public function getPrecioTotal (): float
    {
        return $this->getPrecio()* $this->getCantidad();
    }
}
