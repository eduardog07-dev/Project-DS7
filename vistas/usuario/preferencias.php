<?php require 'vistas/layout/menu.php'; ?>
<link rel="stylesheet" href="assets/css/estilos.css">
<h1>Mis Preferencias</h1>

<form method="POST">

    <label>

        <input
            type="checkbox"
            name="generos[]"
            value="1"

            <?= in_array(1, $preferencias)
                ? 'checked'
                : '' ?>>

        Acción

    </label>

    <br>

    <label>

        <input
            type="checkbox"
            name="generos[]"
            value="2"

            <?= in_array(2, $preferencias)
                ? 'checked'
                : '' ?>>

        Comedia

    </label>

    <br>

    <label>

        <input
            type="checkbox"
            name="generos[]"
            value="3"

            <?= in_array(3, $preferencias)
                ? 'checked'
                : '' ?>>

        Drama

    </label>

    <br>

    <label>

        <input
            type="checkbox"
            name="generos[]"
            value="4"

            <?= in_array(4, $preferencias)
                ? 'checked'
                : '' ?>>

        Terror

    </label>

    <br>

    <label>

        <input
            type="checkbox"
            name="generos[]"
            value="5"

            <?= in_array(5, $preferencias)
                ? 'checked'
                : '' ?>>

        Ciencia Ficción

    </label>

    <br><br>

    <button type="submit">

        Guardar Preferencias

    </button>

<br><br>

<a href="index.php">
    Volver al menú principal
</a>
</form>