<?php

/**
 * Enumeración de EstadoCivil que contiene
 * los diferentes estados civiles que puede
 * tener una persona con sus respectivos valores
 * enteros
 */
enum EstadoCivil:int
{
    case soltero=10;
    case casado=20;
    case pareja=30;
    case viudo=40;

    /**
     * Método que devuelve el nombre
     * del caso que lo llame
     * 
     * @return string devuelve una cadena con el nombre del caso
     */
    public function getDescripcion(): string
    {
        return $this->name;
    }

    /**
     * Método que devuelve el valor
     * del caso que lo llame
     * 
     * @return int devuelve un entero con el valor del caso
     */
    public function getValor(): int 
    {
        return $this->value;
    }

    /**
     * Método que devuelve un array con todos
     * los casos de la enumeración
     * 
     * @return EstadoCivil[] devuelve un array con los casos de las enumeraciones
     */
    public static function obtenerEstadosCiviles(): array
    {
        return EstadoCivil::cases();
    }
}