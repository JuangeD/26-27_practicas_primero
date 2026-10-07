<?php
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
        "TEXTO"=>"act. 3"
    ]
];


// Creación y asignación en varias sentencias
// Creación de una variable de tipo array
$miArray=[];

// Rellenar las posiciones 1, 16 y 54 con valores cualquiera
$miArray[1]=34;
$miArray[16]="hola";
$miArray[54]=true;

// Añadir el valor 34 al final
$miArray[]=34;

// Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres”
$miArray["uno"]="cadena";
$miArray["dos"]=true;
$miArray["tres"]=1.345;

// Rellenar la posición “ultima” con el array (1,34,”nueva”);
$miArray["ultima"]=[1,34,"nueva"];


// Creación y asignación en una única sentencia con array
$miArray2=array(
    1=>34,
    16=>"hola",
    54=>true,
    34,
    "uno"=>"cadena",
    "dos"=>true,
    "tres"=>1.345,
    "ultima"=>[1,34,"nueva"]
);

// Creación y asignación en una única sentencia con []
$miArray3=[
    1=>34,
    16=>"hola",
    54=>true,
    34,
    "uno"=>"cadena",
    "dos"=>true,
    "tres"=>1.345,
    "ultima"=>[1,34,"nueva"]
];

// Dibujo la plantilla de la vista
inicioCabecera("Ejercicio 3");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 3 - OPERACIONES CON ARRAYS", $barra);
cuerpo($miArray, $miArray2, $miArray3);
finCuerpo();

//*********************************************************

// Vista
function cabecera() {
    ?>
    <!-- HEAD -->
    <?php
}

function cuerpo($array1, $array2, $array3) {
    ?>
        <!-- HTML -->
    <?php

    // Mostrar por pantalla el primer array
    echo "<br>Primer array:<br>";
    mostrarArray($array1);
    echo "<br>Segundo array:<br>";
    mostrarArray($array2);
    echo "<br>Tercer array:<br>";
    mostrarArray($array3);
}

function mostrarArray($array) {
    foreach ($array as $elem => $val) {
        if(!is_array($val))
            echo "elemento {$elem} con valor {$val}<br>";
        else 
        {
            echo "elemento {$elem} de tipo Array con valores: <br>";
            foreach ($val as $i => $j) {
                echo "&nbsp;&nbsp;&nbsp;&nbsp;elemento {$i} con valor {$j}<br>";
            }
        }
    }
}