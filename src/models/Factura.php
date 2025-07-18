<?php

namespace App\Models;

use App\Http\Interfaces\FacturaInterface;
use DateTime;

class Factura implements FacturaInterface
{
    private string $id;
    private Usuario $usuario;
    private DateTime $fecha;
    private float $total;

    public function __construct(string $id, Usuario $usuario, DateTime $fecha, float $total)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->fecha = $fecha;
        $this->total = $total;
    }

    public function getId(): string{
        return $this->id;
    }

    public function getUsuario(): Usuario{
        return $this->usuario; 
    }

    public function getFecha(): DateTime{
        return $this->fecha; 
    }

    public function getTotal(): float{
        return $this->total; 
    }

}