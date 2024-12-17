<?php
require_once("Alumno.php");
class Modulo
{
    private string $nombreModulo;
    private array $alumnos;

    function __construct(string $nombreModulo, array $alumnos = [])
    {
        $this->nombreModulo = $nombreModulo;
        $this->alumnos  = $alumnos;
    }
    public function getNombreModulo() : string
    {
        return $this->nombreModulo;
    }

    public function getAlumnos() : array
    {
        return $this->alumnos;
    }

    public function agregarAlumno(Alumno $alumno): void
    {
        $this->alumnos[] = $alumno;
    }

    public function expulsarAlumno(string $nombre): void
    {
        foreach ($this->alumnos as $key => $alumno) {
            if ($alumno->getNombre() === $nombre) {
                unset($this->alumnos[$key]);
                $this->alumnos = array_values($this->alumnos); // Reindexar el array               
            }
        }
    }

    public function calcular(float $valor1, float $valor2): float
    {
        $suma = $valor1 + $valor2;
        
        return $suma;
    }
}