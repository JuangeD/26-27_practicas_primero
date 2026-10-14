<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"pruebas",
        "ENLACE"=>"/aplicacion/pruebas/index.php"
    ],
    [
        "TEXTO"=>"eje. arrays"
    ]
];

//dibuja la plantilla de la vista
inicioCabecera("ARRAYS");
cabecera();
finCabecera();
inicioCuerpo("EJEMPLOS ARRAYS", $barra);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <br><br>

<?php
    $miArray[3] = 23;
    $miArray[7] = 1234;
    $miArray[] = 54; // Asigna el valor a la última posición+1

    //$total=$miArray[6]; // Error undefined, no hay valor en la posición 6 del array

    $total = 0;

    $final = count($miArray);
    for ($i = 0; $i < $final; $i++) { // Con count() obtenemos la longitud del array
        if (isset($miArray[$i])) // Comprobamos que la posición del array esté incializada
            $total += $miArray[$i];
        else
            $final++;
    }

    $miArray["nueva"] = 24;

    $total = 0;
    $total1 = 0;
    foreach ($miArray as $i => $valor) {
        $total += $miArray[$i];
        $total1 += $valor;
    }

    $miArray2=[2,3,34,12,3,4,23,21,6,53,23];
    reset($miArray2); // Mueve el puntero a la primera posición del array [0]
    echo key($miArray2) ."<br>";

    next($miArray2); // Mueve el puntero a la siguiente posición del array
    next($miArray2);
    echo key($miArray2) ."<br>";

    prev($miArray2); // Mueve el puntero a la posición previa del array
    echo key($miArray2) ."<br>";

    end($miArray2); // Mueve el puntero a la última posición del array
    echo key($miArray2) ."<br>";
}
