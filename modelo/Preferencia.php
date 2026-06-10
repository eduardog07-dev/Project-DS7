<?php

require_once 'config/conexion.php';

class Preferencia
{
    private $conexion;

    public function __construct()
    {
        $db = new Conexion();
        $this->conexion = $db->conectar();
    }

    public function obtenerPorUsuario($idUsuario)
    {
        $sql = "SELECT id_genero
                FROM preferencias
                WHERE id_usuario = ?";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([$idUsuario]);

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function guardar($idUsuario, $generos)
    {
        $sql = "DELETE
                FROM preferencias
                WHERE id_usuario = ?";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([$idUsuario]);

        foreach ($generos as $idGenero) {

            $sql = "INSERT INTO preferencias
                    (
                        id_usuario,
                        id_genero
                    )
                    VALUES
                    (?, ?)";

            $stmt = $this->conexion->prepare($sql);

            $stmt->execute([
                $idUsuario,
                $idGenero
            ]);
        }

        return true;
    }
    public function nombresPreferencias($idUsuario)
{
    $sql = "
        SELECT
            g.nombre
        FROM preferencias p

        INNER JOIN generos g
            ON g.id = p.id_genero

        WHERE p.id_usuario = ?
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