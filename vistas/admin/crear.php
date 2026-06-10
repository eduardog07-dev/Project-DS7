<?php require 'vistas/layout/menu.php'; ?>
<link rel="stylesheet" href="assets/css/estilos.css">
<h1>Nueva Película</h1>

<form method="POST">

    <input
        type="text"
        name="titulo"
        placeholder="Título"
        required>

    <br><br>

    <textarea
        name="descripcion"
        placeholder="Descripción"
        required></textarea>

    <br><br>

    <input
        type="number"
        name="anio"
        placeholder="Año"
        required>

    <br><br>

    <input
        type="text"
        name="imagen"
        placeholder="Imagen.jpg"
        required>

    <br><br>

    <select name="id_genero">

        <option value="1">Acción</option>
        <option value="2">Comedia</option>
        <option value="3">Drama</option>
        <option value="4">Terror</option>
        <option value="5">Ciencia Ficción</option>

    </select>

    <br><br>

    <button type="submit">

        Guardar

    </button>

</form>