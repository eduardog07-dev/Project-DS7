<h1>Películas Recomendadas</h1>

<?php if(empty($peliculas)): ?>

    <p>
        No tienes preferencias registradas.
    </p>

<?php endif; ?>

<?php foreach($peliculas as $pelicula): ?>

    <div style="
        border:1px solid #ccc;
        padding:15px;
        margin-bottom:15px;
    ">

        <h3>
            <?= htmlspecialchars($pelicula['titulo']) ?>
        </h3>

        <p>
            <?= htmlspecialchars($pelicula['descripcion']) ?>
        </p>

        <strong>
            Género:
            <?= htmlspecialchars($pelicula['genero']) ?>
        </strong>

        <br><br>

        <a href="index.php?accion=detalle&id=<?= $pelicula['id'] ?>">
            Ver Detalle
        </a>

    </div>

<?php endforeach; ?>