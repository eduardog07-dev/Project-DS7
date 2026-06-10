<?php

require_once '../config/conexion.php';

$db = new Conexion();
$conexion = $db->conectar();

$formato = $_GET['formato'] ?? 'json';

$sql = "
    SELECT
        p.id,
        p.titulo,
        p.descripcion,
        p.anio,
        p.imagen,
        g.nombre AS genero
    FROM peliculas p

    INNER JOIN generos g
        ON g.id = p.id_genero

    ORDER BY p.id
";

$stmt = $conexion->prepare($sql);
$stmt->execute();

$peliculas = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($formato === 'xml') {

    header('Content-Type: application/xml; charset=utf-8');

    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->formatOutput = true;

    $raiz = $xml->createElement('peliculas');
    $xml->appendChild($raiz);

    foreach ($peliculas as $pelicula) {

        $item = $xml->createElement('pelicula');

        $item->appendChild(
            $xml->createElement('id', $pelicula['id'])
        );

        $item->appendChild(
            $xml->createElement('titulo', $pelicula['titulo'])
        );

        $item->appendChild(
            $xml->createElement('descripcion', $pelicula['descripcion'])
        );

        $item->appendChild(
            $xml->createElement('anio', $pelicula['anio'])
        );

        $item->appendChild(
            $xml->createElement('imagen', $pelicula['imagen'])
        );

        $item->appendChild(
            $xml->createElement('genero', $pelicula['genero'])
        );

        $raiz->appendChild($item);
    }

    echo $xml->saveXML();

    exit;
}

header('Content-Type: application/json; charset=utf-8');

echo json_encode(
    [
        'estado' => 'ok',
        'total' => count($peliculas),
        'peliculas' => $peliculas
    ],
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
);