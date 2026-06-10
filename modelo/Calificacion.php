<?php

require_once 'config/conexion.php';

class Calificacion
{
    private $conexion;

    public function __construct()
    {
        $db = new Conexion();

        $this->conexion = $db->conectar();
    }

    public function guardar(
        $idUsuario,
        $idPelicula,
        $puntuacion,
        $comentario
    )
    {
        $sql = "
            INSERT INTO calificaciones
            (
                id_usuario,
                id_pelicula,
                puntuacion,
                comentario
            )
            VALUES
            (?, ?, ?, ?)
        ";

        $stmt =
            $this->conexion->prepare($sql);

        return $stmt->execute([
            $idUsuario,
            $idPelicula,
            $puntuacion,
            $comentario
        ]);
    }

    public function obtenerPorPelicula(
        $idPelicula
    )
    {
        $sql = "
            SELECT
                c.*,
                u.nombre
            FROM calificaciones c

            INNER JOIN usuarios u
                ON u.id = c.id_usuario

            WHERE c.id_pelicula = ?

            ORDER BY c.fecha DESC
        ";

        $stmt =
            $this->conexion->prepare($sql);

        $stmt->execute([
            $idPelicula
        ]);

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }
}