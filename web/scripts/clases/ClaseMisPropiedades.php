<?php

/**
 * Clase definida para la realización del ejercicio 7.
 * Implementa la interfaz Iterator para hacer que sea 
 * posible iterar sobre una instancia de ella
 */
class ClaseMisPropiedades implements Iterator
{
    private array $_propiedades=array();
    public mixed $_propPublica="";
    private mixed $_propPrivada=25;

    // Propiedad que actuará como puntero para iterar
    private int $_posicion;    
    private array $_arrayMixto=array();

    public function __get(string $nombre)
    {
        if(isset($this->_propiedades[$nombre]))
            return $this->_propiedades[$nombre];
        else
            throw new Exception("No existe la propiedad $nombre");
    }

    public function __set(string $nombre, mixed $valor)
    {
        $this->_propiedades[$nombre]=$valor;
    }

    public function __isset(string $nombre): bool
    {
        return isset($this->_propiedades[$nombre]);
    }

    public function __unset(string $nombre)
    {
        unset($this->_propiedades[$nombre]);
    }

    /* ====== MÉTODOS DE LA INTERFAZ ITERATOR ====== */
    #[Override]
    public function current(): mixed
    {
        return current($this->_arrayMixto);
    }

    #[Override]
    public function rewind(): void
    {
        foreach ($this->_propiedades as $key => $value) {
            $this->_arrayMixto[$key]=$value;
        }

        $this->_arrayMixto["_propPublica"] = $this->_propPublica;
        $this->_arrayMixto["_propPrivada"] = $this->_propPrivada;

        $this->_posicion=0;
    }

    #[Override]
    public function next(): void
    {
        next($this->_arrayMixto);
        $this->_posicion++;
    }

    #[Override]
    public function key(): mixed
    {
        return "oi_". key($this->_arrayMixto);
    }

    #[Override]
    public function valid(): bool
    {
        return $this->_posicion < count($this->_arrayMixto);
    }

}