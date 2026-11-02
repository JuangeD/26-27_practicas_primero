<?php

class Persona
{
    private string $_nombre;
    private string $_fecha_nacimiento;
    private string $_domicilio;
    private string $_localidad;
    private EstadoCivil $_estado;

    private function __construct()
    {
        $this->_nombre="prueba";
        $this->_fecha_nacimiento="01/01/2000";
        $this->_domicilio="carrera 12";
        $this->_localidad="antequera";
        $this->_estado=EstadoCivil::soltero;
    }

    /**
     * Método estático que devuelve un objeto Persona configurado
     * con los parámetros pasados
     * 
     * @param string $nombre nombre de la persona
     * @param string $fecha_nacimiento fecha de nacimiento
     * @param string $domicilio domicilio de la persona
     * @param string $localidad localidad de la persona
     * @param EstadoCivil $estado estado de la persona
     * @return Persona devuelve una instancia de Persona
     */
    public static function registrarPersona(string $nombre, string $fecha_nacimiento, string $domicilio, string $localidad, EstadoCivil $estado): Persona
    {
        $obj = new Persona();

        $obj->setNombre($nombre);
        $obj->setFechaNac($fecha_nacimiento);
        $obj->setDomicilio($domicilio);
        $obj->setLocalidad($localidad);
        $obj->setEstado($estado);

        return $obj;
    }

    /* ====== MÉTODOS GET ====== */
    public function getNombre(): string
    {
        return $this->_nombre;
    }

    public function getFechaNac(): string
    {
        return $this->_fecha_nacimiento;
    }

    public function getDomicilio(): string
    {
        return $this->_domicilio;
    }

    public function getLocalidad(): string
    {
        return $this->_localidad;
    }

    public function getEstado(): string
    {
        return $this->_estado->getDescripcion();
    }

    /* ====== MÉTODOS SET ====== */

    public function setNombre(string $nombre): void
    {
        $this->_nombre = $nombre;
    }

    public function setFechaNac(string $fecha_nacimiento): void
    {
        $this->_fecha_nacimiento=$fecha_nacimiento;
    }

    public function setDomicilio(string $domicilio): void
    {
        $this->_domicilio=$domicilio;
    }

    public function setLocalidad(string $localidad): void
    {
        $this->_localidad=$localidad;
    }

    public function setEstado(EstadoCivil $estado): void
    {
        $this->_estado=$estado;
    }

    /* ====== MÉTODO TOSTRING ====== */
    public function __toString(): string
    {
        return $this->getNombre() . " es una persona ". $this->getEstado() . " nacida en " . $this->getFechaNac() . " y que vive en " . $this->getLocalidad();
    }
}