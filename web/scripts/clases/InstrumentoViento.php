<?php

/**
 * Clase InstrumentoViento la cual extiende de
 * InstrumentoBase e implementa la interfaz IFabricable
 * 
 * @author Juan Gerardo Díaz Hurtado
 */
class InstrumentoViento extends InstrumentoBase
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

    /* ====== TOSTRING() ====== */
    #[Override]
    public function __toString(): string
    {
        return parent::__toString() . ". Instrumento de material $this->_material";
    }
}