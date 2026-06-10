<h1>Dashboard Administrador</h1>

<p>
Bienvenido <?= htmlspecialchars($_SESSION['nombre']) ?>
</p>

<hr>

<ul>

    <li>
        <a href="index.php?accion=listar_peliculas">
            Gestionar Películas
        </a>
    </li>

    <li>
        <a href="index.php?accion=reportes">
            Reportes
        </a>
    </li>

    <li>
        <a href="index.php?accion=logout">
            Cerrar Sesión
        </a>
    </li>

</ul>