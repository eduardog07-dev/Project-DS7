<h1>Editar Película</h1>

<form method="POST">

    <input
        type="text"
        name="titulo"
        value="<?= htmlspecialchars($pelicula['titulo']) ?>"
        required>

    <br><br>

    <textarea
        name="descripcion"
        required><?= htmlspecialchars($pelicula['descripcion']) ?></textarea>

    <br><br>

    <input
        type="number"
        name="anio"
        value="<?= htmlspecialchars($pelicula['anio']) ?>"
        required>

    <br><br>

    <input
        type="text"
        name="imagen"
        value="<?= htmlspecialchars($pelicula['imagen']) ?>"
        required>

    <br><br>

    <select name="id_genero">

        <option value="1" <?= $pelicula['id_genero'] == 1 ? 'selected' : '' ?>>
            Acción
        </option>

        <option value="2" <?= $pelicula['id_genero'] == 2 ? 'selected' : '' ?>>
            Comedia
        </option>

        <option value="3" <?= $pelicula['id_genero'] == 3 ? 'selected' : '' ?>>
            Drama
        </option>

        <option value="4" <?= $pelicula['id_genero'] == 4 ? 'selected' : '' ?>>
            Terror
        </option>

        <option value="5" <?= $pelicula['id_genero'] == 5 ? 'selected' : '' ?>>
            Ciencia Ficción
        </option>

    </select>

    <br><br>

    <button type="submit">
        Actualizar
    </button>

</form>