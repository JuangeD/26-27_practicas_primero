<?php

/**
 * Clase Punto que creará instancias de tipo
 * punto según un color, grosor y coordenadas indicadas
 * 
 */
class Punto {
    /* Constantes públicas */
    public const array COLORES = [
        "black"=>["nombre"=>"negro", "rgb"=>[0,0,0]],
        "green"=>["nombre"=>"verde", "rgb"=>[92,255,133]],
        "red"=>["nombre"=>"rojo", "rgb"=>[255,46,46]],
        "blue"=>["nombre"=>"azul", "rgb"=>[69,209,255]]
    ];

    public const array GROSORES = [
        1=>"fino",
        2=>"medio",
        3=>"grueso"
    ];

    /* Propiedades */
    private int $_posX;
    private int $_posY;
    private string $_color;
    private int $_grosor;

    /* Constructor de la clase */
    public function __construct(int $posX, int $posY, string $color, int $grosor)
    {
        if(!$this->setPosX($posX))
            throw new Exception("PosX: La posicion X no es correcta. Debe estar entre 0 y 20000");

        if(!$this->setPosY($posY))
            throw new Exception("PosY: La posicion Y no es correcta. Debe estar entre 0 y 20000");

        if(!$this->setColor($color))
            throw new Exception("Color: El color indicado no está dentro de los permitidos");

        if(!$this->setGrosor($grosor))
            throw new Exception("Grosor: El grosor no es correcto, debe estar entre 1 y 3");


    }

    /* Getters */
    public function getPosX(): int 
    {
        return $this->_posX;
    }

    public function getPosY(): int 
    {
        return $this->_posY;
    }

    public function getColor(): string 
    {
        return $this->_color;
    }

    public function getGrosor(): int 
    {
        return $this->_grosor;
    }

    /* Setters */
    public function setPosX(int $var): bool
    {
        $val = false;

        if($val = validaEntero($var, 0, 20000, $var))
            $this->_posX = $var;


        return $val;
    }

    public function setPosY(int $var): bool
    {
        $val = false;

        if($val = validaEntero($var, 0, 20000, $var))
            $this->_posY = $var;


        return $val;
    }

    public function setColor(string $var): bool
    {
        $val = false;

        if($val = key_exists($var, Punto::COLORES))
            $this->_color = $var;

        return $val;
    }

    public function setGrosor(int $var): bool
    {
        $val = false;

        if($val = validaEntero($var, array_key_first(Punto::GROSORES), array_key_last(Punto::GROSORES), $var))
            $this->_grosor = $var;

        return $val;
    }

    /* Métodos mágicos */
    public function __get($name)
    {
        throw new Exception('No se permiten el uso de propiedades dinámicas');
    }

    public function __set($name, $value)
    {
        throw new Exception('No se permiten el uso de propiedades dinámicas');
    }

    public function __isset($name)
    {
        throw new Exception('No se permiten el uso de propiedades dinámicas');
    }

    public function __unset($name)
    {
        throw new Exception('No se permiten el uso de propiedades dinámicas');
    }
}