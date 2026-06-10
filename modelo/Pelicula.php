<?php

require_once 'config/conexion.php';

class Pelicula
{
    private $conexion;

    public function __construct()
    {
        $db = new Conexion();
        $this->conexion = $db->conectar();
    }

    public function listar()
    {
        $sql = "SELECT
                    p.*,
                    g.nombre AS genero
                FROM peliculas p
                INNER JOIN generos g
                    ON p.id_genero = g.id
                ORDER BY p.id DESC";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $sql = "SELECT *
                FROM peliculas
                WHERE id = ?";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear(
        $titulo,
        $descripcion,
        $anio,
        $imagen,
        $id_genero
    )
    {
        $sql = "INSERT INTO peliculas
                (
                    titulo,
                    descripcion,
                    anio,
                    imagen,
                    id_genero
                )
                VALUES
                (?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            $titulo,
            $descripcion,
            $anio,
            $imagen,
            $id_genero
        ]);
    }

    public function actualizar(
        $id,
        $titulo,
        $descripcion,
        $anio,
        $imagen,
        $id_genero
    )
    {
        $sql = "UPDATE peliculas
                SET
                    titulo = ?,
                    descripcion = ?,
                    anio = ?,
                    imagen = ?,
                    id_genero = ?
                WHERE id = ?";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            $titulo,
            $descripcion,
            $anio,
            $imagen,
            $id_genero,
            $id
        ]);
    }

    public function eliminar($id)
    {
        $sql = "DELETE
                FROM peliculas
                WHERE id = ?";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([$id]);
    }
    public function totalPeliculas()
{
    $sql = "SELECT COUNT(*) AS total
            FROM peliculas";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function recomendacionesPorUsuario(
    $idUsuario
)
{
    $sql = "
        SELECT
            p.*,
            g.nombre AS genero
        FROM peliculas p

        INNER JOIN generos g
            ON p.id_genero = g.id

        INNER JOIN preferencias pref
            ON pref.id_genero = p.id_genero

        WHERE pref.id_usuario = ?

        ORDER BY p.titulo
    ";

    $stmt =
        $this->conexion->prepare($sql);

    $stmt->execute([
        $idUsuario
    ]);

    return $stmt->fetchAll(
        PDO::FETCH_ASSOC
    );
}
}