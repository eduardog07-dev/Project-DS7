<?php

require_once 'config/conexion.php';

class Usuario
{
    private $conexion;

    public function __construct()
    {
        $db = new Conexion();
        $this->conexion = $db->conectar();
    }

    public function registrar($nombre, $email, $password)
    {
        $sql = "INSERT INTO usuarios
                (nombre, email, password, rol)
                VALUES
                (?, ?, ?, 'usuario')";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            $nombre,
            $email,
            $password
        ]);
    }

    public function buscarPorEmail($email)
    {
        $sql = "SELECT *
                FROM usuarios
                WHERE email = ?";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $sql = "SELECT *
                FROM usuarios
                WHERE id = ?";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function existeEmail($email)
{
    $sql = "SELECT id
            FROM usuarios
            WHERE email = ?";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute([$email]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}