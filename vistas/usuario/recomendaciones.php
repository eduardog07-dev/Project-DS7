<?php require 'vistas/layout/menu.php'; ?>
<link rel="stylesheet" href="assets/css/estilos.css">
<h1>Películas Recomendadas</h1>

<?php if(empty($peliculas)): ?>

    <p>
        No tienes preferencias registradas.
    </p>

<?php endif; ?>

<?php foreach($peliculas as $pelicula): ?>

    <div class="card">

        <h3>
            <?= htmlspecialchars($pelicula['titulo']) ?>
        </h3>

        <p>
            <?= htmlspecialchars($pelicula['descripcion']) ?>
        </p>

        <span class="badge">
        <?= htmlspecialchars($pelicula['genero']) ?>
        </span>

        <br><br>

        <a href="index.php?accion=detalle&id=<?= $pelicula['id'] ?>">
            Ver Detalle
        </a>

    </div>

<?php endforeach; ?>