<?php

interface IFabricable 
{
    /**
     * Función que devuelve los pasos para
     * fabricar el elemento
     * 
     * @return string devuelve una cadena con los pasos para montar el elemento
     */
    public function metodoFabricacion(): string;

    /**
     * Función que devuelve el método de reciclado
     * que se debe aplicar al elemento según su fabricación 
     * 
     * @return string 
     */
    public function metodoReciclado(): string;
}