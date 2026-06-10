<?php require 'vistas/layout/menu.php'; ?>
<link rel="stylesheet" href="assets/css/estilos.css">
<h1>Mi Perfil</h1>

<h3>
    Nombre:
    <?= htmlspecialchars($usuario['nombre']) ?>
</h3>

<p>
    Email:
    <?= htmlspecialchars($usuario['email']) ?>
</p>

<p>
    Rol:
    <?= htmlspecialchars($usuario['rol']) ?>
</p>

<hr>

<h3>
    Mis Preferencias
</h3>

<ul>

<?php foreach($preferencias as $preferencia): ?>

    <li>
        <?= htmlspecialchars($preferencia['nombre']) ?>
    </li>

<?php endforeach; ?>

</ul>

<hr>

<h3>
    Historial de Películas
</h3>

<ul>

<?php foreach($historial as $item): ?>

    <li>

        <?= htmlspecialchars($item['titulo']) ?>

        -

        <?= htmlspecialchars($item['fecha_vista']) ?>

    </li>

<?php endforeach; ?>

</ul>

<br>

<a href="index.php">
    Volver al Inicio
</a>