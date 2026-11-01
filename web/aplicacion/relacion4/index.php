<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//CONTROLADOR
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"relacion4"
    ]
];


//*****************************
//DIBUJAR PLANTILLA VISTA
inicioCabecera("Relación 4");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 4", $barra);
cuerpo();
finCuerpo();
//*****************************

//VISTA
function cabecera() {
?>
    
<?php
}

function cuerpo() {
?>
    
<?php
    // Prueba de funcionamiento de la Clase InstrumentoBase (antes de hacerla abstracta)
    /* $instrumentoBase1 = new InstrumentoBase("guitarra", 7);
    echo "Instrumento: ". $instrumentoBase1->getDescripcion(); */

    /* Creación de instancias */
    $instrumentoViento1 = new InstrumentoViento();
    $flauta1 = Flauta::crearDesdeArray(["material"=>"metal"]);
    $flauta2 = $flauta1->clonacion();


    /* Prueba ejercicio 3 */
    echo "<h1>Ejercicio 3</h1>";
    echo $instrumentoViento1;
    echo "<h3>sonido()</h3>";
    echo "<br>Sonido => ".$instrumentoViento1->sonido();
    echo "<h3>afinar()</h3>";
    echo "<br>Afinar => ".$instrumentoViento1->afinar();
    echo "<h3>metodoFabricacion()</h3>";
    echo "<br>".$instrumentoViento1->metodoFabricacion();
    echo "<h3>metodoReciclado()</h3>";
    echo "<br>".$instrumentoViento1->metodoReciclado();

    $instrumentoViento1->envejecer(); // Usar el método envejecer para aumentar la edad del instrumento 1 año
    echo "<br>Edad después de usar método envejecer()=> ". $instrumentoViento1->getEdad() . " años";
    echo "<hr>";

    /* Prueba ejercicio 4 */
    echo "<h1>Ejercicio 4</h1>";
    echo $flauta1;
    echo "<h3>Flauta clonada</h3>";
    echo $flauta2;
    echo "<hr>";

    
}

