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
        "TEXTO"=>"act. 7"
    ]
];

// Dibujo la plantilla de la vista
inicioCabecera("Ejercicio 7");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 7 - MANEJO DE FECHAS", $barra);
cuerpo();
finCuerpo();

//*********************************************************

// Vista
function cabecera() {
    ?>
    <!-- HEAD -->
    <?php
}

function cuerpo() {
    ?>
        <!-- HTML -->
    <?php
    mostrarFecha();
    mostrarFechaEspecifica();
    mostrarFechaMenos12DiasY4Horas();
    echo "<hr>".PHP_EOL;
    mostrarFechaDateTime();
    mostrarFechaEspecificaDateTime();
    mostrarFechaMenos12DiasY4HorasDateTime();
}

// Funciones
// Usando date()
function mostrarFecha() {
    echo "<h2>Formatos de fecha con date()</h2> <br>".PHP_EOL;
    echo "Fecha en formato 'd/m/Y' => ". date("d/m/Y") ."<br>".PHP_EOL;
    echo "Fecha en formato 'dia d, mes mmmm, año yyyy, dia de la semana dd' => 
            ". date("\d\í\a d, \m\\e\s F, \a\ñ\o Y, \d\i\a \d\\e \l\a \s\\e\m\a\\n\a  N") ."<br>".PHP_EOL;
    echo "Fecha en formato 'hh:mm:ss' => ". date("H:i:s").PHP_EOL;
}

function mostrarFechaEspecifica() {
    $fecha=strtotime("2024-3-29 12:45");

    echo "<h2>Formatos de fecha con date() para el 29/3/2024 a las 12:45</h2> <br>".PHP_EOL;
    echo "Fecha en formato 'd/m/Y' => ". date("d/m/Y", $fecha) ."<br>".PHP_EOL;
    echo "Fecha en formato 'dia d, mes mmmm, año yyyy, dia de la semana dd' => 
            ". date("\d\í\a d, \m\\e\s F, \a\ñ\o Y, \d\i\a \d\\e \l\a \s\\e\m\a\\n\a  N", $fecha) ."<br>".PHP_EOL;
    echo "Fecha en formato 'hh:mm:ss' => ". date("H:i:s", $fecha).PHP_EOL;
}

function mostrarFechaMenos12DiasY4Horas() {
    $fecha=strtotime("-12 days -4 hours");

    echo "<h2>Formatos de fecha con date() para la fecha actual menos 12 días y 4 horas</h2> <br>".PHP_EOL;
    echo "Fecha en formato 'd/m/Y' => ". date("d/m/Y", $fecha) ."<br>".PHP_EOL;
    echo "Fecha en formato 'dia d, mes mmmm, año yyyy, dia de la semana dd' => 
            ". date("\d\í\a d, \m\\e\s F, \a\ñ\o Y, \d\i\a \d\\e \l\a \s\\e\m\a\\n\a  N", $fecha) ."<br>".PHP_EOL;
    echo "Fecha en formato 'hh:mm:ss' => ". date("H:i:s", $fecha).PHP_EOL;
}

// Usando la clase DateTime() **********************************
function mostrarFechaDateTime() {
    $fecha=new DateTime();

    echo "<h2>Formatos de fecha con DateTime</h2> <br>".PHP_EOL;
    echo "Fecha en formato 'd/m/Y' => ". $fecha->format("d/m/Y") ."<br>".PHP_EOL;
    echo "Fecha en formato 'dia d, mes mmmm, año yyyy, dia de la semana dd' => 
            ". $fecha->format("\d\í\a d, \m\\e\s F, \a\ñ\o Y, \d\i\a \d\\e \l\a \s\\e\m\a\\n\a  N") ."<br>".PHP_EOL;
    echo "Fecha en formato 'hh:mm:ss' => ". $fecha->format("H:i:s").PHP_EOL;
}

function mostrarFechaEspecificaDateTime() {
    $fecha=new DateTime("2024-3-29 12:45");

    echo "<h2>Formatos de fecha con DateTime para el 29/3/2024 a las 12:45</h2> <br>".PHP_EOL;
    echo "Fecha en formato 'd/m/Y' => ". $fecha->format("d/m/Y") ."<br>".PHP_EOL;
    echo "Fecha en formato 'dia d, mes mmmm, año yyyy, dia de la semana dd' => 
            ". $fecha->format("\d\í\a d, \m\\e\s F, \a\ñ\o Y, \d\i\a \d\\e \l\a \s\\e\m\a\\n\a  N") ."<br>".PHP_EOL;
    echo "Fecha en formato 'hh:mm:ss' => ". $fecha->format("H:i:s").PHP_EOL;
}

function mostrarFechaMenos12DiasY4HorasDateTime() {
    $fecha=new DateTime();
    $fechaRestada= $fecha->modify("-12 days -4 hours"); // Otra manera sub(new DateInterval("P12DT4H"))

    echo "<h2>Formatos de fecha con DateTime para la fecha actual menos 12 días y 4 horas</h2> <br>".PHP_EOL;
    echo "Fecha en formato 'd/m/Y' => ". $fechaRestada->format("d/m/Y") ."<br>".PHP_EOL;
    echo "Fecha en formato 'dia d, mes mmmm, año yyyy, dia de la semana dd' => 
            ". $fechaRestada->format("\d\í\a d, \m\\e\s F, \a\ñ\o Y, \d\i\a \d\\e \l\a \s\\e\m\a\\n\a  N") ."<br>".PHP_EOL;
    echo "Fecha en formato 'hh:mm:ss' => ". $fechaRestada->format("H:i:s").PHP_EOL;
}