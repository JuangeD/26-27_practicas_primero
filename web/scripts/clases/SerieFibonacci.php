<?php

/**
 * Clase que implementa Iterator para poder
 * realizar la serie de fibonacci según un número 
 * indicado de veces
 */
class SerieFibonacci implements Iterator
{
    private int $_limite;
    private int $_claveActual;

    public function __construct(int $limite)
    {
        $this->_limite = $limite;
    }

    #[Override]
    public function rewind(): void
    {
        $this->_claveActual=0;
    }

    #[Override]
    public function valid(): bool
    {
        return ($this->_claveActual<=$this->_limite);
    }

    #[Override]
    public function next(): void
    {
        $this->_claveActual++;
    }

    #[Override]
    public function current(): mixed
    {
        if($this->key()===0)
        {
            return 0;
        }

        if($this->key()===1)
        {
            return 1;
        }

        $antiguo=0;
        $actual=1;
        $aux=0;
        
        for($i=2;$i<=$this->key();$i++)
        {
            $aux = $actual;
            $actual = $actual + $antiguo;
            $antiguo = $aux;
        }

        return $actual;
    }

    #[Override]
    public function key(): mixed
    {
        return $this->_claveActual;
    }

    /**
     * Método estático que realiza un número de veces
     * la serie fibonacci
     * 
     * @param int $ultimo número de veces que se quiere realizar fibonacci
     * @return Generator<mixed, int, mixed, void> va devolviendo los valores según se van generando
     */
    public static function fFibonacci(int $ultimo)
    {
        $antiguo=0;
        $nuevo=1;
        $aux=0;

        for ($i=0; $i <= $ultimo; $i++) { 
        
            yield $antiguo;

            $aux = $nuevo;
            $nuevo = $nuevo + $antiguo;
            $antiguo = $aux;
            
        }
    }
}
