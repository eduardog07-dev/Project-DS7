<?php require 'vistas/layout/menu.php'; ?>

<h1>Cartelera de Películas</h1>

<p>
    Aquí puedes ver todas las películas disponibles, su promedio de calificación y su cantidad de vistas.
</p>

<form method="GET">

    <input type="hidden" name="accion" value="cartelera">

    <label>Buscar película</label>
    <br>

    <input
        type="text"
        name="q"
        placeholder="Buscar por título, género o año"
        value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">

    <br><br>

    <label>Ordenar por</label>
    <br>

    <select name="orden">
        <option value="titulo" <?= ($_GET['orden'] ?? '') === 'titulo' ? 'selected' : '' ?>>
            Nombre
        </option>

        <option value="mejor_calificadas" <?= ($_GET['orden'] ?? '') === 'mejor_calificadas' ? 'selected' : '' ?>>
            Mejor calificadas
        </option>

        <option value="mas_vistas" <?= ($_GET['orden'] ?? '') === 'mas_vistas' ? 'selected' : '' ?>>
            Más vistas
        </option>

        <option value="recientes" <?= ($_GET['orden'] ?? '') === 'recientes' ? 'selected' : '' ?>>
            Más recientes
        </option>
    </select>

    <br><br>

    <button type="submit">
        Buscar
    </button>

    <a href="index.php?accion=cartelera">
        Limpiar filtros
    </a>

</form>

<hr>

<?php if(empty($peliculas)): ?>

    <p>No se encontraron películas.</p>

<?php else: ?>

    <?php foreach($peliculas as $pelicula): ?>

        <div class="card">

            <h3>
                <?= htmlspecialchars($pelicula['titulo']) ?>
            </h3>

            <p>
                <?= htmlspecialchars($pelicula['descripcion']) ?>
            </p>

            <p>
                <strong>Año:</strong>
                <?= htmlspecialchars($pelicula['anio']) ?>
            </p>

            <p>
                <strong>Género:</strong>
                <span class="badge">
                    <?= htmlspecialchars($pelicula['genero']) ?>
                </span>
            </p>

            <p>
                <strong>Promedio de calificación:</strong>

                <?php if($pelicula['promedio_calificacion']): ?>

                    ⭐ <?= htmlspecialchars($pelicula['promedio_calificacion']) ?>/5

                <?php else: ?>

                    Sin calificaciones

                <?php endif; ?>
            </p>

            <p>
                <strong>Total de calificaciones:</strong>
                <?= htmlspecialchars($pelicula['total_calificaciones']) ?>
            </p>

            <p>
                <strong>Vistas:</strong>
                <?= htmlspecialchars($pelicula['total_vistas']) ?>
            </p>

            <a href="index.php?accion=detalle&id=<?= $pelicula['id'] ?>">
                Ver detalle
            </a>

        </div>

    <?php endforeach; ?>

<?php endif; ?>

<br>

<a href="index.php">
    Volver al Inicio
</a>

</div>