<?php

/**
 * Clase Flauta que hereda de InstrumentoViento
 * y que es una clase final, por lo que otra clase
 * no puede heredar de esta
 * 
 * @author Juan Gerardo Díaz Hurtado
 */
final class Flauta extends InstrumentoViento implements IFabricable
{
    private function __construct(string $material="madera", int $edad=15)
    {
        parent::__construct($material, $edad);
    }

    /**
     * Método estático que crea un objeto Flauta a partir de un array
     * asociativo con las posiciones "material" y "edad", con sus respectivos
     * valores.
     * 
     * @param array $atributos array asociativo con los valores de la instancia de Flauta
     * @return Flauta devuelve una instancia de Flauta
     */
    public static function crearDesdeArray(array $atributos): Flauta
    {
        $obj = null;

        if(!isset($atributos["material"]) && !isset($atributos["edad"]))
            $obj=new Flauta();

        if(isset($atributos["material"]))
            $obj = new Flauta($atributos["material"]);
        
        if(isset($atributos["edad"]))
            $obj = new Flauta(edad: $atributos["edad"]);

        
        return $obj;

    }

    /* ====== MÉTODOS DE LA INTERFAZ IMPLEMENTADOS ====== */
    #[Override]
    public function metodoFabricacion(): string
    {
        return "Se funde o moldea el cuerpo, se taladra el tubo interior 
        con precisión matemática y se suelda un complejo mecanismo de llaves mecánicas.";
    }

    #[Override]
    public function metodoReciclado(): string
    {
        return "Llévalo a un punto limpio municipal o dónalo a una escuela de 
        música o asociación para que aprovechen sus piezas metálicas.";
    }

    /**
     * Método que devuelve una copia de la instancia del 
     * objeto Flauta por el que ha sido llamado el método
     * 
     */
    public function __clone()
    {
        $this->_material;
        $this->_edad=0;

        /* Aumento el número de instancias */
        $this->_numElem++;
        InstrumentoBase::$_elemCreados++;
    }
}