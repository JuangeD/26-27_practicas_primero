<?php

/**
 * Clase de instrumento base
 */
class InstrumentoBase 
{
    private string $_descripcion;
    protected int $_edad=10;
    
    // Constructor
    public function __construct(string $descripcion, int $edad=10)
    {
        $this->_descripcion = $descripcion;
        $this->_edad = $edad;
    }


    public function getDescripcion(): string
    {
        return $this->_descripcion;
    }

    public function getEdad(): int
    {
        return $this->_edad;
    }

    public function setDescripcion(string $val): void
    {
        $this->_descripcion=$val;
    }

    /* abstract public function sonido(): string;
    abstract public function afinar(): string; */

    /**
     * Función que envejece en un año
     * la edad del instrumento
     *
     * @return void
     */
    public function envejecer(): void
    {
        $this->_edad++;
    }
}