<?php require 'vistas/layout/menu.php'; ?>
<link rel="stylesheet" href="assets/css/estilos.css">
<h1>Reportes Administrativos</h1>

<h2>Resumen General</h2>

<ul>
    <li>
        Total de películas:
        <strong><?= htmlspecialchars($totalPeliculas['total']) ?></strong>
    </li>

    <li>
        Total de usuarios:
        <strong><?= htmlspecialchars($totalUsuarios['total']) ?></strong>
    </li>

    <li>
        Total de calificaciones:
        <strong><?= htmlspecialchars($totalCalificaciones['total']) ?></strong>
    </li>
</ul>

<hr>

<h2>Películas Más Calificadas</h2>

<?php if(empty($peliculasMasCalificadas)): ?>

    <p>No hay calificaciones registradas.</p>

<?php else: ?>

    <table border="1">
        <tr>
            <th>Película</th>
            <th>Total Calificaciones</th>
            <th>Promedio</th>
        </tr>

        <?php foreach($peliculasMasCalificadas as $pelicula): ?>

            <tr>
                <td><?= htmlspecialchars($pelicula['titulo']) ?></td>
                <td><?= htmlspecialchars($pelicula['total_calificaciones']) ?></td>
                <td><?= htmlspecialchars($pelicula['promedio']) ?></td>
            </tr>

        <?php endforeach; ?>

    </table>

<?php endif; ?>

<hr>

<h2>Usuarios Más Activos</h2>

<?php if(empty($usuariosMasActivos)): ?>

    <p>No hay historial registrado.</p>

<?php else: ?>

    <table border="1">
        <tr>
            <th>Usuario</th>
            <th>Películas Vistas</th>
        </tr>

        <?php foreach($usuariosMasActivos as $usuario): ?>

            <tr>
                <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                <td><?= htmlspecialchars($usuario['total_vistas']) ?></td>
            </tr>

        <?php endforeach; ?>

    </table>

<?php endif; ?>

<hr>

<h2>Géneros Más Vistos</h2>

<?php if(empty($generosMasVistos)): ?>

    <p>No hay géneros vistos todavía.</p>

<?php else: ?>

    <table border="1">
        <tr>
            <th>Género</th>
            <th>Total Vistas</th>
        </tr>

        <?php foreach($generosMasVistos as $genero): ?>

            <tr>
                <td><?= htmlspecialchars($genero['genero']) ?></td>
                <td><?= htmlspecialchars($genero['total_vistas']) ?></td>
            </tr>

        <?php endforeach; ?>

    </table>

<?php endif; ?>

<br>

<a href="index.php?accion=dashboard">
    Volver al Dashboard
</a>