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
        $peliculas = $this->peliculaModel->listar();

        require 'vistas/admin/listar.php';
    }
    public function crear()
    {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $titulo = sanitizar($_POST['titulo']);
        $descripcion = sanitizar($_POST['descripcion']);
        $anio = (int) $_POST['anio'];
        $imagen = sanitizar($_POST['imagen']);
        $id_genero = (int) $_POST['id_genero'];

        $this->peliculaModel->crear(
            $titulo,
            $descripcion,
            $anio,
            $imagen,
            $id_genero
        );

        header("Location: index.php?accion=listar_peliculas");
        exit;
    }

    require 'vistas/admin/crear.php';
    }
    public function eliminar()
{
    $id = (int) $_GET['id'];

    $this->peliculaModel->eliminar($id);

    header("Location: index.php?accion=listar_peliculas");

    exit;
}
public function editar()
{
    $id = (int) $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $titulo = sanitizar($_POST['titulo']);
        $descripcion = sanitizar($_POST['descripcion']);
        $anio = (int) $_POST['anio'];
        $imagen = sanitizar($_POST['imagen']);
        $id_genero = (int) $_POST['id_genero'];

        $this->peliculaModel->actualizar(
            $id,
            $titulo,
            $descripcion,
            $anio,
            $imagen,
            $id_genero
        );

        header("Location: index.php?accion=listar_peliculas");
        exit;
    }

    $pelicula = $this->peliculaModel->obtenerPorId($id);

    require 'vistas/admin/editar.php';
}
public function reportes()
{
    $totalPeliculas =
        $this->peliculaModel->totalPeliculas();

    require 'vistas/admin/reportes.php';
}
}