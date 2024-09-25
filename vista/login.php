<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['error']) && isset($_SESSION['mensaje'])) {
    echo "<script>alert('" . $_SESSION['mensaje'] . "');</script>";
    unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
}
if (isset($_SESSION['datos']['data'][0]['rol'])) {
    header("Location: ./indexmenu.php");
}
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <title>Login DriverCom</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/www.ico">
    <link rel="stylesheet" href="../css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../private/var/folders/71/jh5wv0ss0rvgwfdqk4v0wdkw0000gp/T/Adobe/login-form-18/Login_D/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

</head>

<body>
    <div class="Logo_Container"> <img src="../img/LogoDrivercom.png" alt="Logo" class="logo-image"> </div>
    <div class="main">
        <h1 class="title_1">Bienvenido</h1>
        <form action="../modelo/indexvalida.php" method="POST">
            <label for="first">
                <h4>Usuario:</h4>
            </label>
            <input type="Text" name="t1" id="t1" placeholder="Ingrese su Usuario" required>
            <label for="password">
                <h4>Contraseña:</h4>
            </label>
            <input type="password" name="t2" id="t2" placeholder="Ingrese su Contraseña" required>
            <table class="login-options">
                <tr><label>
                        <td><input type="checkbox" id="rememberMe" name="rememberMe"></td>
                        <td>
                            <p>Recordar contraseña</p>
                        </td>
                    </label>
                </tr>
            </table>
            <div class="wrap">
                <button type="submit" value="Ingresar">Iniciar</button>
            </div>
        </form>
    </div>
</body>

</html>