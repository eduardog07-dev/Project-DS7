<?php require 'vistas/layout/menu.php'; ?>

<h1>Listado de Películas</h1>

<a href="index.php?accion=crear_pelicula" class="btn-accion btn-editar">
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

                <div class="acciones-tabla">

                    <a
                        class="btn-accion btn-editar"
                        href="index.php?accion=editar_pelicula&id=<?= $pelicula['id'] ?>">
                        Editar
                    </a>

                    <form
                        method="POST"
                        action="index.php?accion=eliminar_pelicula"
                        style="display:inline;">

                        <input
                            type="hidden"
                            name="csrf_token"
                            value="<?= generarTokenCSRF() ?>">

                        <input
                            type="hidden"
                            name="id"
                            value="<?= htmlspecialchars($pelicula['id']) ?>">

                        <button
                            type="submit"
                            class="btn-accion btn-eliminar"
                            onclick="return confirm('¿Desea eliminar esta película?')">
                            Eliminar
                        </button>

                    </form>

                </div>

            </td>

        </tr>

    <?php endforeach; ?>

</table>

<br>

<a href="index.php?accion=dashboard">
    Volver al Dashboard
</a>

</div>