<?php

namespace App\Models;

use App\Http\Interfaces\TirillasInterface;
use DateTime;

class Tirillas implements TirillasInterface{
    private int $id;
    private Pagos $pagoId;
    private string $contenido;
    private DateTime $fechaGeneracion;

    public function __construct(int $id, Pagos $pagoId, string $contenido, DateTime $fechaGeneracion) {
        $this->id = $id;
        $this->pagoId = $pagoId;
        $this->contenido = $contenido;
        $this->fechaGeneracion = $fechaGeneracion; 
    }

    public function getId(): int{
        return $this->id; 
    }

    public function getPagoId(): Pagos{
        return $this->pagoId; 
    }

    public function getContenido(): string{
        return $this->contenido; 
    }

    public function getFechaGeneracion(): DateTime{
        return $this->fechaGeneracion;
    }
}