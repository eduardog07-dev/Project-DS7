<?php require 'vistas/layout/menu.php'; ?>
<link rel="stylesheet" href="assets/css/estilos.css">
<h1>
    <?= htmlspecialchars($pelicula['titulo']) ?>
</h1>

<p>
    <?= htmlspecialchars($pelicula['descripcion']) ?>
</p>

<p>
    Año:
    <?= htmlspecialchars($pelicula['anio']) ?>
</p>

<hr>

<h3>Calificar Película</h3>

<form method="POST">
<input
    type="hidden"
    name="csrf_token"
    value="<?= generarTokenCSRF() ?>">
    <label>Puntuación</label>
    <br>

    <select name="puntuacion" required>
        <option value="5">5 - Excelente</option>
        <option value="4">4 - Muy buena</option>
        <option value="3">3 - Regular</option>
        <option value="2">2 - Mala</option>
        <option value="1">1 - Muy mala</option>
    </select>

    <br><br>

    <label>Comentario</label>
    <br>

    <textarea
        name="comentario"
        placeholder="Escribe tu comentario"
        required></textarea>

    <br><br>

    <button type="submit">
        Enviar Calificación
    </button>

</form>

<hr>

<h3>Comentarios</h3>

<?php if(empty($comentarios)): ?>

    <p>No hay comentarios todavía.</p>

<?php endif; ?>

<?php foreach($comentarios as $comentario): ?>

    <div class="card">

        <strong>
            <?= htmlspecialchars($comentario['nombre']) ?>
        </strong>

        -

        ⭐ <?= htmlspecialchars($comentario['puntuacion']) ?>/5

        <br><br>

        <?= htmlspecialchars($comentario['comentario']) ?>

        <br><br>

        <small>
            <?= htmlspecialchars($comentario['fecha']) ?>
        </small>

    </div>

<?php endforeach; ?>

<br>

<a href="index.php?accion=recomendaciones">
    Volver a recomendaciones
</a>

&nbsp; | &nbsp;

<a href="index.php?accion=cartelera">
    Volver a cartelera
</a>