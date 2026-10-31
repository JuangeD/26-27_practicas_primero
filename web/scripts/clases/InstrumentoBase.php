<?php

/**
 * Clase de instrumento base
 */
abstract class InstrumentoBase 
{
    private string $_descripcion;
    protected int $_edad=10;
    protected int $_numElem;
    static protected int $_elemCreados;
    
    // Constructor
    public function __construct(string $descripcion, int $edad=10)
    {
        $this->_descripcion = $descripcion;
        $this->_edad = $edad;
        self::$_elemCreados++;
        $this->_numElem=self::$_elemCreados;
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

    /**
     * 
     * Función abstracta que devuelve una cadena
     * con el sonido del instrumento
     * @return string devuelve una cadena del sonido del instrumento
     */
    abstract public function sonido(): string;

    /**
     * 
     * Función abstracta que devuelve una cadena con las instrucciones
     * para afinar el instrumento
     * @return string devuelve una cadena con las instrucciones para afinar el instrumento
     */
    abstract public function afinar(): string;

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

    public function __toString(): string
    {
        return "instrumento con descripción ". $this->getDescripcion() ." , instancia $this->_numElem de un total de ". 
                self::$_elemCreados .". Tiene $this->_edad años. La clase es ". get_class($this);
    }
}