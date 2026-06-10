<?php require 'vistas/layout/menu.php'; ?>
<link rel="stylesheet" href="assets/css/estilos.css">
<h1>Listado de Películas</h1>

<a href="index.php?accion=crear_pelicula">
    Nueva Película
</a>

<br><br>

<table border="1">

    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Género</th>
        <th>Año</th>
        <th>Acciones</th>
    </tr>

    <?php foreach($peliculas as $pelicula): ?>

        <tr>

            <td>
                <?= htmlspecialchars($pelicula['id']) ?>
            </td>

            <td>
                <?= htmlspecialchars($pelicula['titulo']) ?>
            </td>

            <td>
                <?= htmlspecialchars($pelicula['genero']) ?>
            </td>

            <td>
                <?= htmlspecialchars($pelicula['anio']) ?>
            </td>

            <td>

                <a href="index.php?accion=editar_pelicula&id=<?= $pelicula['id'] ?>">
                    Editar
                </a>

                |

                <a href="index.php?accion=eliminar_pelicula&id=<?= $pelicula['id'] ?>"
                   onclick="return confirm('¿Desea eliminar esta película?')">
                    Eliminar
                </a>

            </td>

        </tr>

    <?php endforeach; ?>

</table>