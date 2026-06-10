<link rel="stylesheet" href="assets/css/estilos.css">

<nav>
    <a href="index.php">
        Inicio
    </a>

    <?php if(isset($_SESSION['usuario_id'])): ?>

        <a href="index.php?accion=perfil">
            Mi Perfil
        </a>

        <a href="index.php?accion=preferencias">
            Preferencias
        </a>

        <a href="index.php?accion=recomendaciones">
            Recomendaciones
        </a>

        <?php if($_SESSION['rol'] === 'admin'): ?>

            <a href="index.php?accion=dashboard">
                Dashboard Admin
            </a>

            <a href="index.php?accion=listar_peliculas">
                Películas
            </a>

            <a href="index.php?accion=reportes">
                Reportes
            </a>

        <?php endif; ?>

        <a href="index.php?accion=logout">
            Cerrar Sesión
        </a>

    <?php else: ?>

        <a href="index.php?accion=login">
            Iniciar Sesión
        </a>

        <a href="index.php?accion=registro">
            Registrarse
        </a>

    <?php endif; ?>
</nav>

<div class="container">