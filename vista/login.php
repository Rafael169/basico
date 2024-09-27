<?php
// session_start();
// if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['error']) && isset($_SESSION['mensaje'])) {
//     echo "<script>alert('" . $_SESSION['mensaje'] . "');</script>";
//     unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
// }
// if (isset($_SESSION['datos']['data'][0]['rol'])) {
//     header("Location: ./indexmenu.php");
// }
?>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['error']) && isset($_SESSION['mensaje'])) {
    // Mostrar el modal si existe un mensaje
    echo "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('errorModal'));
            myModal.show();
        });
    </script>
    ";
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
    <!-- estilos boostra para el modal -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->

</head>

<body>
    <div class="Logo_Container"> <img src="../img/LogoDrivercom.png" alt="Logo" class="logo-image"> </div>
    <br></br>
    <a href="http://localhost/basico/vista/agregarUsuario.php"><strong> ======> Aqui para ingresar mientas tanto<====== </strong></a>
    <br></br> 
    <div class="main">
        <h1 class="title_1">Bienvenido</h1>
        <!-- dirreccion a la que se redirecciona al darle a iniciar -->
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


    <!-- modal para error -->

    <!-- <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Usuario o Contraseña Incorrecta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    if (isset($_SESSION['mensaje'])) {
                        echo $_SESSION['mensaje'];
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div> -->

</body>

</html>