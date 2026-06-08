<?php

require_once 'config/conexion.php';

class Preferencia
{
    private $conexion;

    public function __construct()
    {
        $db = new Conexion();
        $this->conexion = $db->conectar();
    }
}