<?php

require_once 'config/conexion.php';

class Historial
{
    private $conexion;

    public function __construct()
    {
        $db = new Conexion();

        $this->conexion = $db->conectar();
    }

    public function registrar(
        $idUsuario,
        $idPelicula
    )
    {
        $sql = "
            INSERT INTO historial
            (
                id_usuario,
                id_pelicula
            )
            VALUES
            (?, ?)
        ";

        $stmt =
            $this->conexion->prepare($sql);

        return $stmt->execute([
            $idUsuario,
            $idPelicula
        ]);
    }

    public function obtenerPorUsuario(
        $idUsuario
    )
    {
        $sql = "
            SELECT
                h.*,
                p.titulo
            FROM historial h

            INNER JOIN peliculas p
                ON p.id = h.id_pelicula

            WHERE h.id_usuario = ?

            ORDER BY h.fecha_vista DESC
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