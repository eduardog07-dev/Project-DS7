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

<p>
    ID Género:
    <?= htmlspecialchars($pelicula['id_genero']) ?>
</p>

<br>

<a href="index.php?accion=recomendaciones">
    Volver a recomendaciones
</a>