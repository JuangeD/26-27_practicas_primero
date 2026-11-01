<?php

/**
 * Interfaz IFabricable que obliga a implementar
 * los métodos metodoFabricacion() y metodoReciclado()
 * a las clases que la implementen
 * 
 * @author Juan Gerardo Díaz Hurtado
 */
interface IFabricable 
{
    /**
     * Método que devuelve los pasos para
     * fabricar el elemento
     * 
     * @return string devuelve una cadena con los pasos para montar el elemento
     */
    public function metodoFabricacion(): string;

    /**
     * Método que devuelve el método de reciclado
     * que se debe aplicar al elemento según su fabricación 
     * 
     * @return string 
     */
    public function metodoReciclado(): string;
}