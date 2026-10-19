<?php

const MIA=56;

/**
 * Función que devuelve un número
 * Si el número es menor de 10 se dará un error
 *
 * @param integer $num Número al que aplicar el doble
 * @return integer|false Devuelve el doble del argumento o false en caso de error
 */
function doble(int $num): int|false
{
    if($num<10) // Si $num es menor de 10, lo consideramos un error
        return false;
    else
        return 2 * $num;
}