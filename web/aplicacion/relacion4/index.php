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
    $instrumentoBase1 = new InstrumentoBase("guitarra", 7);

    echo "Instrumento: ". $instrumentoBase1->getDescripcion();
    
}

