<?php

enum EstadoCivil:int
{
    case soltero=10;
    case casado=20;
    case pareja=30;
    case viudo=40;

    public function getDescripcion(): string
    {
        return $this->name;
    }

    public function getValor(): int 
    {
        return $this->value;
    }

    public static function obtenerEstadosCiviles(): array
    {
        return EstadoCivil::cases();
    }
}