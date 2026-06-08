<?php

require_once 'modelo/Pelicula.php';

class PeliculaController
{
    private $peliculaModel;

    public function __construct()
    {
        $this->peliculaModel = new Pelicula();
    }

    public function listar()
    {
        echo "Listado de películas";
    }

    public function detalle()
    {
        echo "Detalle de película";
    }
}