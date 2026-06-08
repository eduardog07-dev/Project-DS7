<?php

require_once 'modelo/Usuario.php';
require_once 'helpers/seguridad.php';

class AuthController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }

    /**
     * Mostrar formulario de login
     */
    public function mostrarLogin()
    {
        require 'vistas/login.php';
    }

    /**
     * Mostrar formulario de registro
     */
    public function mostrarRegistro()
    {
        require 'vistas/registro.php';
    }

    /**
     * Registrar usuario
     */
    public function registro()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require 'vistas/registro.php';
            return;
        }

        $nombre = sanitizar($_POST['nombre'] ?? '');
        $email = sanitizar($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (
            empty($nombre) ||
            empty($email) ||
            empty($password)
        ) {
            die("Todos los campos son obligatorios");
        }

        if (!validarEmail($email)) {
            die("Correo electrónico inválido");
        }

        if ($this->usuarioModel->existeEmail($email)) {
            die("El correo ya está registrado");
        }

        $passwordHash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $registrado = $this->usuarioModel->registrar(
            $nombre,
            $email,
            $passwordHash
        );

        if (!$registrado) {
            die("Error al registrar usuario");
        }

        header("Location: index.php?accion=login");
        exit;
    }

    /**
     * Iniciar sesión
     */
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require 'vistas/login.php';
            return;
        }

        $email = sanitizar($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (
            empty($email) ||
            empty($password)
        ) {
            die("Debe completar todos los campos");
        }

        $usuario = $this->usuarioModel->buscarPorEmail($email);

        if (!$usuario) {
            die("Usuario o contraseña incorrectos");
        }

        if (
            !empty($usuario['bloqueado_hasta']) &&
            strtotime($usuario['bloqueado_hasta']) > time()
        ) {
            die("Cuenta bloqueada temporalmente");
        }

        if (
            !password_verify(
                $password,
                $usuario['password']
            )
        ) {
            die("Usuario o contraseña incorrectos");
        }

        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['rol'] = $usuario['rol'];

        header("Location: index.php");
        exit;
    }

    /**
     * Cerrar sesión
     */
    public function logout()
    {
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {

            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();

        header("Location: index.php");
        exit;
    }
}