<?php

require_once 'config/conexion.php';

class Calificacion
{
    private $conexion;

    public function __construct()
    {
        $db = new Conexion();
        $this->conexion = $db->conectar();
    }
}