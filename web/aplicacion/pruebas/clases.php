<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra = [
    [
        "TEXTO" => "inicio",
        "ENLACE" => "/index.php"
    ],
    [
        "TEXTO" => "pruebas",
        "ENLACE" => "/aplicacion/pruebas/index.php"
    ],
    [
        "TEXTO" => "eje. clases"
    ]
];


$instancia = new ClasePrueba();
$instancia->propPublica = 50;

ClasePrueba::$propEstatica[1] = 10;
$instancia::$propEstatica[2] = 20;

$datos=["codigo"=> 12, "nombre"=>"prueba2"];
$datosJson=json_encode($datos);

$p1=Prueba::desdeDatos(5,"Objeto");
$p2=Prueba::desdeJson($datosJson);

$programa = Unica::crear(100);

$programa->_numero=1;

$segunda = Unica::crear(300);

// Instancia de instituto
$ins = new Instituto();


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("ACCESO PRUEBAS", $barra);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}
//vista
function cuerpo()
{
?>  
<?php

}

/* ====== CLASES ====== */

/**
 * Clase prueba usada para mostrar el funcionamiento de los
 * distintos elementos
 */
class ClasePrueba
{
    //definición de constantes
    public const PI = 2.14;

    //definición de propiedad
    public int $propPublica = 1;
    private string $_propPrivada = "hola";
    protected float $_propProtegida = 1.234;

    //definición de propiedad estática
    public static $propEstatica = array(1, 2, 3);

    //definición de método
    public function metodo()
    {
        //acceso a las propiedades desde el propio objeto
        $this->propPublica = 13;
        $this->_propPrivada = 100;
        $this->_propProtegida = "adios";

        //acceso a la propiedad estática
        self::$propEstatica[0] = "otra";
        return true;
    }
}

class Prueba
{
    private ?int $_codigo;
    private ?string $_nombre;
    
    //el constructor es privado
    private function __construct(?int $codigo = null, ?string $nombre =
    null)
    {
        $this->_codigo = $codigo;
        $this->_nombre = $nombre;
    }
    
    //constructor estatico publico
    public static function desdeDatos(int $codigo, string $nombre): static
    {
        //creo el objeto usando static
        $obj = new static($codigo, $nombre);
        return $obj;
    }
    
    //constructor estatico publico
    public static function desdeJson(string $json): static
    {
        $datos = json_decode($json);
        return new static($datos->codigo, $datos->nombre);
    }
}

class Unica {
    private static bool $_creada=false;
    public int $_numero=12;

    private static ?Unica $_objeto=null;

    private function __construct(int $val=0) 
    {
        $this->_numero=$val;
    }

    public static function crear(int $numero): static 
    {
        if(self::$_creada)
            return self::$_objeto;
        
        $obj = new static($numero);
        self::$_creada=true;
        self::$_objeto=$obj;

        return self::$_objeto;
    }
}