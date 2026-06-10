<h1>MovieMatch DS7</h1>

<?php if(isset($_SESSION['nombre'])): ?>

    <p>
        Bienvenido <?= htmlspecialchars($_SESSION['nombre']) ?>
    </p>

    <hr>

    <?php if($_SESSION['rol'] === 'admin'): ?>

        <a href="index.php?accion=dashboard">
            Dashboard Admin
        </a>

        <br><br>

        <a href="index.php?accion=listar_peliculas">
            Gestionar Películas
        </a>

        <br><br>

        <a href="index.php?accion=reportes">
            Reportes
        </a>

        <br><br>

    <?php endif; ?>

    <a href="index.php?accion=perfil">
        Mi Perfil
    </a>

    <br><br>

    <a href="index.php?accion=preferencias">
        Preferencias
    </a>

    <br><br>

    <a href="index.php?accion=recomendaciones">
        Recomendaciones
    </a>

    <br><br>

    <a href="index.php?accion=logout">
        Cerrar Sesión
    </a>

<?php else: ?>

    <a href="index.php?accion=login">
        Iniciar Sesión
    </a>

    <br><br>

    <a href="index.php?accion=registro">
        Registrarse
    </a>

<?php endif; ?>