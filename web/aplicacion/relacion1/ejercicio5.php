<?php

use function PHPSTORM_META\type;

include_once(dirname(__FILE__) . "/../../cabecera.php");

// Controlador
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"relacion1",
        "ENLACE"=>"/aplicacion/relacion1/index.php"
    ],
    [
        "TEXTO"=>"act. 5"
    ]
];

//Definición del array vector
$vector=array();
$vector[1]="esto es una cadena";
$vector["posi1"]=25.67;
$vector[]=false;
$vector["ultima"]=array(2,5,96);
$vector[56]=23;

// Dibujo la plantilla de la vista
inicioCabecera("Ejercicio 5");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 5 - MOSTRAR ARRAY CON DIFERENTES OPCIONES", $barra);
cuerpo($vector);
finCuerpo();

//*********************************************************

// Vista
function cabecera() {
    ?>
    <!-- HEAD -->
    <?php
}

function cuerpo(array $array) {
    ?>
        <!-- HTML -->
    <?php
    mostarArray($array);
}

//Funciones
function mostarArray(array $dato) {

    foreach ($dato as $elem => $valor) {
        
        $tipo = gettype($valor);
        echo " posicion {$elem} contenido (tipo) ". $tipo.PHP_EOL;
        
        switch (strtolower($tipo)) {
            case 'array':
                foreach ($valor as $i) {
                    echo "<br>". $i ."<br>".PHP_EOL;
                }
                break;
            
            case 'integer':
                
                echo " con valor {$valor}, en binario ". decbin($valor) ."<br>".PHP_EOL;
                break;

            case 'double':
            case 'float':
                
                echo " {$valor} que al cuadrado es ". pow($valor, 2) ."<br>".PHP_EOL;
                break;

            case 'string':
                
                echo " -{$valor}- <br>".PHP_EOL;
                break;
            
            case 'boolean':
                
                echo " ". mostrarBoolean($valor) ." y su opuesto ". mostrarBoolean(!$valor) ."<br>".PHP_EOL;
                break;

            default:
                echo "<br>".PHP_EOL;    

                break;
        }
    }
}

function mostrarBoolean(bool $valor) {
    return $valor?'TRUE':'FALSE';
}
