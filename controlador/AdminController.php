<?php

require_once 'modelo/Pelicula.php';
require_once 'helpers/seguridad.php';

class AdminController
{
    private $peliculaModel;

    public function __construct()
    {
        requireAdmin();

        $this->peliculaModel = new Pelicula();
    }

    public function dashboard()
    {
        require 'vistas/admin/dashboard.php';
    }

    public function listar()
    {
        require 'vistas/admin/listar.php';
    }

    public function crear()
    {
        require 'vistas/admin/crear.php';
    }

    public function editar()
    {
        require 'vistas/admin/editar.php';
    }

    public function reportes()
    {
        require 'vistas/admin/reportes.php';
    }
}