<?php

class InstrumentoViento extends InstrumentoBase implements IFabricable
{
    protected string $_material = "madera";

    public function __construct(string $material="madera", int $edad=15)
    {
        parent::__construct("instrumento de viento", $edad);
        $this->_material = $material;
    }

    /* ====== MÉTODOS ABSTRACTOS IMPLEMENTADOS ====== */
    #[Override]
    public function sonido(): string
    {
        return "Fiiiluuu";
    }

    #[Override]
    public final function afinar(): string
    {
        return "Calentar el instrumento de 10 a 15 minutos, usar una referencia electrónica, afinar el sonido y estabilizar el aire";
    }

    /* ====== MÉTODOS DE LA INTERFAZ IMPLEMENTADOS ====== */
    #[Override]
    public function metodoFabricacion(): string
    {
        throw new \Exception('Not implemented');
    }

    #[Override]
    public function metodoReciclado(): string
    {
        throw new \Exception('Not implemented');
    }

    /* ====== TOSTRING() ====== */
    #[Override]
    public function __toString(): string
    {
        return parent::__toString() . ". Instrumento de material $this->_material";
    }
}