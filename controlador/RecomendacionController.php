<?php

require_once 'modelo/Preferencia.php';
require_once 'modelo/Pelicula.php';
require_once 'modelo/Historial.php';
require_once 'modelo/Usuario.php';
require_once 'modelo/Calificacion.php';
require_once 'helpers/seguridad.php';

class RecomendacionController
{
    private $preferenciaModel;
    private $peliculaModel;
    private $historialModel;
    private $usuarioModel;
    private $calificacionModel;

    public function __construct()
    {
        requireLogin();

        $this->preferenciaModel = new Preferencia();
        $this->peliculaModel = new Pelicula();
        $this->historialModel = new Historial();
        $this->usuarioModel = new Usuario();
        $this->calificacionModel = new Calificacion();
    }

    public function preferencias()
    {
        $idUsuario = $_SESSION['usuario_id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            validarTokenCSRF($_POST['csrf_token'] ?? '');

            $generos = $_POST['generos'] ?? [];

            $generos = array_map('intval', $generos);

            $this->preferenciaModel->guardar(
                $idUsuario,
                $generos
            );

            header("Location: index.php?accion=preferencias");
            exit;
        }

        $preferencias =
            $this->preferenciaModel
                ->obtenerPorUsuario($idUsuario);

        require 'vistas/usuario/preferencias.php';
    }

    public function recomendaciones()
    {
        $idUsuario = $_SESSION['usuario_id'];

        $peliculas =
            $this->peliculaModel
                ->recomendacionesPorUsuario($idUsuario);

        require 'vistas/usuario/recomendaciones.php';
    }

    public function cartelera()
    {
        $busqueda = $_GET['q'] ?? '';
        $orden = $_GET['orden'] ?? 'titulo';

        $busqueda = sanitizar($busqueda);
        $orden = sanitizar($orden);

        $peliculas =
            $this->peliculaModel
                ->cartelera(
                    $busqueda,
                    $orden
                );

        require 'vistas/usuario/cartelera.php';
    }

    public function detalle()
    {
        $idPelicula =
            (int) ($_GET['id'] ?? 0);

        $pelicula =
            $this->peliculaModel
                ->obtenerPorId($idPelicula);

        if (!$pelicula) {

            header("Location: index.php?accion=recomendaciones");
            exit;
        }

        $this->historialModel
            ->registrar(
                $_SESSION['usuario_id'],
                $idPelicula
            );

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            validarTokenCSRF($_POST['csrf_token'] ?? '');

            $puntuacion =
                (int) ($_POST['puntuacion'] ?? 0);

            if ($puntuacion < 1 || $puntuacion > 5) {
                die("Puntuación inválida.");
            }

            $comentario =
                sanitizar($_POST['comentario'] ?? '');

            if (empty($comentario)) {
                die("El comentario no puede estar vacío.");
            }

            $this->calificacionModel
                ->guardar(
                    $_SESSION['usuario_id'],
                    $idPelicula,
                    $puntuacion,
                    $comentario
                );

            header("Location: index.php?accion=detalle&id=" . $idPelicula);
            exit;
        }

        $comentarios =
            $this->calificacionModel
                ->obtenerPorPelicula($idPelicula);

        require 'vistas/usuario/detalle.php';
    }

    public function perfil()
    {
        $idUsuario =
            $_SESSION['usuario_id'];

        $usuario =
            $this->usuarioModel
                ->obtenerPorId($idUsuario);

        $preferencias =
            $this->preferenciaModel
                ->nombresPreferencias($idUsuario);

        $historial =
            $this->historialModel
                ->obtenerPorUsuario($idUsuario);

        require 'vistas/usuario/perfil.php';
    }
}