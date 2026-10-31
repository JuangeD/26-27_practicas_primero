<?php

final class Flauta extends InstrumentoViento
{
    private function __construct(string $material="madera", int $edad=15)
    {
        parent::__construct($material, $edad);
    }

    public static function crearDesdeArray(array $atributos): Flauta
    {
        $obj = null;

        if(isset($atributos["material"]) && isset($atributos["material"]))
            $obj = new Flauta($atributos["material"], $atributos["edad"]);
        else
            $obj = new Flauta();

        
        return $obj;

    }

    public function clonacion(): Flauta
    {
        return new Flauta($this->_material, 0);
    }
}