<?php

function sanitizar($texto)
{
    return trim(strip_tags($texto));
}

function escapar($texto)
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

function validarEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validarId($id)
{
    return filter_var($id, FILTER_VALIDATE_INT);
}

function requireLogin()
{
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: index.php?accion=login");
        exit;
    }
}

function requireAdmin()
{
    requireLogin();

    if ($_SESSION['rol'] !== 'admin') {
        header("Location: index.php");
        exit;
    }
}

function generarTokenCSRF()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function validarTokenCSRF($token)
{
    if (
        !isset($_SESSION['csrf_token']) ||
        !hash_equals($_SESSION['csrf_token'], $token)
    ) {
        die("Solicitud no válida. Token CSRF incorrecto.");
    }

    return true;
}