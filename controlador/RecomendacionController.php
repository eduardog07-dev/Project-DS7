<?php

require_once 'modelo/Preferencia.php';
require_once 'modelo/Pelicula.php';

class RecomendacionController
{
    public function recomendaciones()
    {
        require 'vistas/usuario/recomendaciones.php';
    }

    public function preferencias()
    {
        require 'vistas/usuario/preferencias.php';
    }
}