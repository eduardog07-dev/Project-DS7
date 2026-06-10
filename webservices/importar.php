<?php

require_once '../config/conexion.php';

$db = new Conexion();
$conexion = $db->conectar();

$rutaArchivo = 'peliculas.json';

if (!file_exists($rutaArchivo)) {

    header('Content-Type: application/json; charset=utf-8');

    echo json_encode([
        'estado' => 'error',
        'mensaje' => 'No se encontró el archivo peliculas.json'
    ]);

    exit;
}

$contenido = file_get_contents($rutaArchivo);

$peliculas = json_decode($contenido, true);

if (!$peliculas) {

    header('Content-Type: application/json; charset=utf-8');

    echo json_encode([
        'estado' => 'error',
        'mensaje' => 'El archivo JSON no tiene un formato válido'
    ]);

    exit;
}

$insertadas = 0;
$duplicadas = 0;

foreach ($peliculas as $pelicula) {

    $titulo = $pelicula['titulo'];
    $descripcion = $pelicula['descripcion'];
    $anio = $pelicula['anio'];
    $imagen = $pelicula['imagen'];
    $idGenero = $pelicula['id_genero'];

    $sqlExiste = "
        SELECT id
        FROM peliculas
        WHERE titulo = ?
    ";

    $stmtExiste = $conexion->prepare($sqlExiste);
    $stmtExiste->execute([$titulo]);

    $existe = $stmtExiste->fetch(PDO::FETCH_ASSOC);

    if ($existe) {

        $duplicadas++;

        continue;
    }

    $sql = "
        INSERT INTO peliculas
        (
            titulo,
            descripcion,
            anio,
            imagen,
            id_genero
        )
        VALUES
        (?, ?, ?, ?, ?)
    ";

    $stmt = $conexion->prepare($sql);

    $stmt->execute([
        $titulo,
        $descripcion,
        $anio,
        $imagen,
        $idGenero
    ]);

    $insertadas++;
}

header('Content-Type: application/json; charset=utf-8');

echo json_encode(
    [
        'estado' => 'ok',
        'mensaje' => 'Importación finalizada',
        'insertadas' => $insertadas,
        'duplicadas' => $duplicadas
    ],
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
);