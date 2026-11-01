<?php

/**
 * Clase abstracta InstrumentoBase que hará
 * de plantilla para las clases que hereden de
 * ella
 * 
 * @author Juan Gerardo Díaz Hurtado
 */
abstract class InstrumentoBase 
{
    private string $_descripcion;
    protected int $_edad=10;
    protected int $_numElem;
    static protected int $_elemCreados=0;
    
    // Constructor
    public function __construct(string $descripcion, int $edad=10)
    {
        $this->_descripcion = $descripcion;
        $this->_edad = $edad;
        self::$_elemCreados++;
        $this->_numElem=self::$_elemCreados;
    }


    /**
     * Método que devuelve la descripción
     * del instrumento que lo llama
     * 
     * @return string devuelve una cadena con la descripción del instrumento
     */
    public function getDescripcion(): string
    {
        return $this->_descripcion;
    }

    /**
     * Método que devuelve la edad del instrumento
     * que lo llama
     * @return int devuelve un entero, el cual es la edad del instrumento
     */
    public function getEdad(): int
    {
        return $this->_edad;
    }

    /**
     * Método que modifica la descripción del elemento
     * que lo llama
     * 
     * @param string $val nueva descripción del elemento
     * @return void no devuelve nada
     */
    public function setDescripcion(string $val): void
    {
        $this->_descripcion=$val;
    }

    /**
     * Función abstracta que devuelve una cadena
     * con el sonido del instrumento
     * 
     * @return string devuelve una cadena del sonido del instrumento
     */
    abstract public function sonido(): string;

    /**
     * Función abstracta que devuelve una cadena con las instrucciones
     * para afinar el instrumento
     * 
     * @return string devuelve una cadena con las instrucciones para afinar el instrumento
     */
    abstract public function afinar(): string;

    /**
     * Función que envejece en un año
     * la edad del instrumento
     *
     * @return void no devuelve nada
     */
    public function envejecer(): void
    {
        $this->_edad++;
    }

    /**
     * Método que devuelve una descripción completa
     * de una instancia
     * 
     * @return string
     */
    public function __toString(): string
    {
        return "instrumento con descripción ". $this->getDescripcion() ." , instancia $this->_numElem de un total de ". 
                self::$_elemCreados .". Tiene $this->_edad años. La clase es ". get_class($this);
    }
}