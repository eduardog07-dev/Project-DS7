<?php

session_start();

$accion = $_GET['accion'] ?? 'home';

switch ($accion) {

    // =========================
    // PÁGINAS PÚBLICAS
    // =========================

    case 'home':
        require 'vistas/home.php';
        break;

    case 'login':
        require 'vistas/login.php';
        break;

    case 'registro':
        require 'vistas/registro.php';
        break;

    // =========================
    // AUTENTICACIÓN
    // =========================

    case 'procesar_registro':

        require_once 'controlador/AuthController.php';

        $controller = new AuthController();

        $controller->registro();

        break;

    case 'procesar_login':

        require_once 'controlador/AuthController.php';

        $controller = new AuthController();

        $controller->login();

        break;

    case 'logout':

        require_once 'controlador/AuthController.php';

        $controller = new AuthController();

        $controller->logout();

        break;

    // =========================
    // ADMINISTRADOR
    // =========================

    case 'dashboard':

        require_once 'controlador/AdminController.php';

        $controller = new AdminController();

        $controller->dashboard();

        break;

    case 'listar_peliculas':

        require_once 'controlador/AdminController.php';

        $controller = new AdminController();

        $controller->listar();

        break;

    case 'crear_pelicula':

        require_once 'controlador/AdminController.php';

        $controller = new AdminController();

        $controller->crear();

        break;

    case 'editar_pelicula':

        require_once 'controlador/AdminController.php';

        $controller = new AdminController();

        $controller->editar();

        break;

    case 'eliminar_pelicula':

        require_once 'controlador/AdminController.php';

        $controller = new AdminController();

        $controller->eliminar();

        break;

    case 'reportes':

    require_once 'controlador/AdminController.php';

    $controller = new AdminController();

    $controller->reportes();

    break;

    // =========================
    // USUARIO
    // =========================

    case 'preferencias':

    require_once
        'controlador/RecomendacionController.php';

    $controller =
        new RecomendacionController();

    $controller->preferencias();

    break;

    case 'recomendaciones':

    require_once 'controlador/RecomendacionController.php';

    $controller = new RecomendacionController();

    $controller->recomendaciones();

    break;

    case 'perfil':

    require_once
        'controlador/RecomendacionController.php';

    $controller =
        new RecomendacionController();

    $controller->perfil();

    break;

    case 'detalle':

    require_once 'controlador/RecomendacionController.php';

    $controller = new RecomendacionController();

    $controller->detalle();

    break;

    // =========================
    // DEFAULT
    // =========================

    default:

        require 'vistas/home.php';

        break;
}