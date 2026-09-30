<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
// Definición de constantes
define("NUME", 25);
const NUME1=56;

//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("PRUEBAS BASICAS");
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <br><br>esto es html
    <?php
        echo "Esto es código php"; // Esto es un comentario

        $var1=25;
        $cadena='esto es una cadena';

        $var1+=12;
        echo $var1;

        $una_cadena="hola";
        $unaCadena="adios";

        $var1-=17;

        echo "$var1";

        $unaCadena=45;
        echo $unaCadena;

        if(isset($cadena2)) // Con isset() comprobamos si la variable está inicializada
            echo $cadena2;


        $real=1234.56789012345678901;
        $real+=0.432109876542;

        // Con .PHP_EOL le indicamos que es fin de línea (End Of Line)
        echo "El número es $var1<br>".PHP_EOL;
        echo 'El número es $var1<br>'.PHP_EOL;

        $real=null;

        echo $real;

        // Conversiones de tipos
        $var=125;
        $tipo=gettype($var);

        $var=(string)$var;
        $tipo=gettype($var);

        settype($var, "double");
        $tipo=gettype($var);

        $var=intval($var);
        $tipo=gettype($var);

        $var="0";
        if($var) // false
            $cadena="var no vale false";

        $var="0"; 
        if("0000") // true
            $cadena="var no vale false";

        $var="";
        if($var) // false
            $cadena="var no vale false";

        $var=0;
        if($var) // false
            $cadena="var no vale false";

        $var=1;
        if($var) // true
            $cadena="var no vale false";

        $var=1+true; // Convierte al tipo más genérico (integer)
        $var=1+1.5; 
        //$var=1+"1hola"; // Si hay un número al principio de la cadena lo extrae y devuelve ese número
        //$var=1+"1.5hola";
        //$var=1+"hola1";
        //$var=1+[];

        $aux=125;
        $var="hola ".$aux;
        $aux=true;
        $var="hola ".$aux; // hola 1
        $aux=[];
        //$var="hola ".$aux; // hola Array
        $aux="adios";
        $var="hola ".$aux;

        // Referencia
        $var1=100;
        $var2=$var1;
        $var3=&$var1;
        $var2=150;
        $var3=200;

        unset($var3); // Borramos la referencia hacia la variable $var1

        // Prueba de las constantes al inicio
        $var1+=NUME;
        $var1+=NUME1;

        // operadores
        $num = intdiv(10,3); // Cuando queremos el resultado de la división entera

        $var=15/2;


        if("25"==25)
            $var="iguales";
        if("25hola"==25)
            $var="iguales";
        if("25"===25) // Igual en valor y tipo
            $var="iguales";
        if("25hola"!=25)
            $var="iguales";
        if("25hola"!==25) // Distinto en valor y tipo
            $var="iguales";

        $var=14>25;
        $var=14<25;
        $var=14<=>25; /* Compara ambos números y devuelve -1 si el primero es más grande,
                        0 si son iguales o 1 si el segundo es mayor que el primero*/
        
        if(isset($var3))
            $var=$var3;
        else if (isset($mivar))
            $var=$mivar;
        else
            $var=27;

        $var=$var3??$mivar??27; // Devuelve el primero de izquierda a derecha cuyo valor no sea null

        $var=0b11111;
        $var=$var>>1;
        $var=$var<<1;

        $var=0b1010 & 0b0101;
        $var=0b1010 | 0b0101;

        // Estructuras de control
        $var=7;
        if($var==1)
            $cadena="uno";
        else
            $cadena="no uno";
    ?>
    
<?php
}