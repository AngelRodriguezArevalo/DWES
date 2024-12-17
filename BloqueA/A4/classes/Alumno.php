<?php
class Alumno
{
    private  string $nombre;
    private  int $edad;
    private  string $nacionalidad;
    private string $email;
    private bool $matriculado;

    private array $notas;

    function __construct(string $nombre, int $edad, string $nacionalidad,
                         string $email, bool $matriculado = false, array $notas)
    {
        $this->nombre = $nombre;
        $this->edad  = $edad;
        $this->nacionalidad = $nacionalidad;
        $this->email = $email;
        $this->matriculado = $matriculado;
        $this->notas = $notas;
    }

    public function getNombre(): string    
    {
        return $this->nombre;
    }
    public function getEdad(): int    
    {
        return $this->edad;
    }
    public function getNacionalidad(): string    
    {
        return $this->nacionalidad;
    }
    public function getEmail(): string    
    {
        return $this->email;
    }
    public function getMatriculado(): bool
    {
        return $this->matriculado;
    }

    public function getNotas(): array
    {
        return $this->notas;
    }

    public function setMatriculado(bool $matriculado):void{
        $this->matriculado = $matriculado;
    }

    public function calcularMedia(): float{
        $suma = 0;
        foreach($this->notas as $nota) {
            $suma += $nota;
        }
        return $suma/count($this->notas);
    }
}
