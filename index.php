<?php

session_start();

$accion = $_GET['accion'] ?? 'home';

switch ($accion) {

    case 'home':
        require 'vistas/home.php';
        break;

    case 'login':
        require 'vistas/login.php';
        break;

    case 'registro':
        require 'vistas/registro.php';
        break;

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

    case 'dashboard':

    require_once 'helpers/seguridad.php';

    requireAdmin();

    require 'vistas/admin/dashboard.php';

    break;

    case 'listar_peliculas':
        require 'vistas/admin/listar.php';
        break;

    case 'crear_pelicula':
        require 'vistas/admin/crear.php';
        break;

    case 'editar_pelicula':
        require 'vistas/admin/editar.php';
        break;

    case 'reportes':
        require 'vistas/admin/reportes.php';
        break;

    case 'preferencias':
        require 'vistas/usuario/preferencias.php';
        break;

    case 'recomendaciones':
        require 'vistas/usuario/recomendaciones.php';
        break;

    case 'perfil':
        require 'vistas/usuario/perfil.php';
        break;

    case 'detalle':
        require 'vistas/usuario/detalle.php';
        break;

    default:
        require 'vistas/home.php';
        break;
}