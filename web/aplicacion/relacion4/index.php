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
    $flauta2 = clone $flauta1;


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
    echo "<h3>envejecer()</h3>";
    echo "<br>Edad de \$instrumentoViento1 después de usar método envejecer()=> ". $instrumentoViento1->getEdad() . " años";
    echo "<hr>";

    /* Prueba ejercicio 4 */
    echo "<h1>Ejercicio 4</h1>";
    echo $flauta1;
    echo "<h3>Flauta clonada</h3>";
    echo $flauta2;
    echo "<hr>";

    /* Prueba ejercicio 5 */
    do
    {
        $e = EstadoCivil::tryFrom(rand(10,40));
    } while (!isset($e));

    $persona1 = Persona::registrarPersona("Juan Gerardo Díaz", "08/05/2007", "casa 1", "Antequera", $e);
    
    echo "<h1>Ejercicio 5</h1>";
    echo $persona1;
    echo "<h3>Mostrar todos los estados civiles</h3>";
    foreach (EstadoCivil::obtenerEstadosCiviles() as $estado) {
        echo $estado->getDescripcion(). " con valor ". $estado->getValor() ."<br>";
    }

    echo "<hr>";
    
    /* Prueba ejercicio 6 */
    echo "<h1>Ejercicio 6</h1>";
    foreach(new SerieFibonacci(10) as $valor)
    {
        echo "$valor &nbsp;";
    }

    echo "<br>";

    foreach(SerieFibonacci::fFibonacci(10) as $valor)
    {
        echo "$valor &nbsp;";
    }

    /* Prueba ejercicio 7 */
    echo "<hr>";
    echo "<h1>Ejercicio 7</h1>";
    $Objeto= new ClaseMisPropiedades();
    $Objeto->_propPublica="publica";
    //$Objeto->_propPrivada=”privada”; //no es valida al ser privada
    $Objeto->propiedad1=25;
    $Objeto->propiedad2="cadena de texto";
    echo "la propiedad 1 vale ". $Objeto->propiedad1 ."<br>";
    // echo $Objeto->propiedad3; // esto debería dar un error al no haber asignado previamente la propiedad

    foreach($Objeto as $clave=>$val)
    {
        echo $clave. " => " .$val ."<br>";
    }
}

