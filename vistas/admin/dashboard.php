<?php require 'vistas/layout/menu.php'; ?>
<link rel="stylesheet" href="assets/css/estilos.css">
<h1>Dashboard Administrador</h1>

<p>
    Bienvenido <?= htmlspecialchars($_SESSION['nombre']) ?>
</p>

<hr>

<h3>Administración</h3>

<ul>

    <li>
        <a href="index.php?accion=listar_peliculas">
            Gestionar Películas
        </a>
    </li>

    <li>
        <a href="index.php?accion=reportes">
            Ver Reportes
        </a>
    </li>

</ul>

<hr>

<h3>Webservices</h3>

<ul>

    <li>
        <a href="webservices/exportar.php" target="_blank">
            Exportar Películas en JSON
        </a>
    </li>

    <li>
        <a href="webservices/exportar.php?formato=xml" target="_blank">
            Exportar Películas en XML
        </a>
    </li>

    <li>
        <a href="webservices/importar.php" target="_blank">
            Importar Películas desde JSON
        </a>
    </li>

</ul>

<hr>

<ul>

    <li>
        <a href="index.php">
            Volver al Inicio
        </a>
    </li>

    <li>
        <a href="index.php?accion=logout">
            Cerrar Sesión
        </a>
    </li>

</ul>