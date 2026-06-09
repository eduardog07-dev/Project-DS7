<h1>Listado de Películas</h1>

<table border="1">

    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Género</th>
        <th>Año</th>
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

        </tr>

    <?php endforeach; ?>

</table>