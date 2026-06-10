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

public function totalUsuarios()
{
    $sql = "SELECT COUNT(*) AS total
            FROM usuarios";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function totalCalificaciones()
{
    $sql = "SELECT COUNT(*) AS total
            FROM calificaciones";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function peliculasMasCalificadas()
{
    $sql = "
        SELECT
            p.titulo,
            COUNT(c.id) AS total_calificaciones,
            ROUND(AVG(c.puntuacion), 2) AS promedio
        FROM peliculas p

        INNER JOIN calificaciones c
            ON c.id_pelicula = p.id

        GROUP BY
            p.id,
            p.titulo

        ORDER BY
            promedio DESC,
            total_calificaciones DESC
    ";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function usuariosMasActivos()
{
    $sql = "
        SELECT
            u.nombre,
            COUNT(h.id) AS total_vistas
        FROM usuarios u

        INNER JOIN historial h
            ON h.id_usuario = u.id

        GROUP BY
            u.id,
            u.nombre

        ORDER BY
            total_vistas DESC
    ";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function generosMasVistos()
{
    $sql = "
        SELECT
            g.nombre AS genero,
            COUNT(h.id) AS total_vistas
        FROM historial h

        INNER JOIN peliculas p
            ON p.id = h.id_pelicula

        INNER JOIN generos g
            ON g.id = p.id_genero

        GROUP BY
            g.id,
            g.nombre

        ORDER BY
            total_vistas DESC
    ";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}