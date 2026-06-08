<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>

<h1>Iniciar Sesión</h1>

<form method="POST" action="index.php?accion=procesar_login">

    <label>Email</label><br>
    <input type="email" name="email" required>

    <br><br>

    <label>Contraseña</label><br>
    <input type="password" name="password" required>

    <br><br>

    <button type="submit">
        Entrar
    </button>

</form>

<a href="index.php?accion=registro">
    Registrarse
</a>

</body>

</html>