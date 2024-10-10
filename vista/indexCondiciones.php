<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DriverCom</title>
  <link rel="icon" href="../img/www.ico">
  <link rel="stylesheet" href="../css/Stylemenu.css">
  <link rel="stylesheet" href="../css/Styletablas.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>

.logo {
      font-size: 1.5rem;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      border-radius: 10px;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align:left ;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

  
</style>
</head>

<body>
  <div class="dashboard">
    <?php
    include 'page/aside.php';
    ?>

    <main class="main-content">
    <header class="main-header">
    <div class="user-menu">
        <button class="user-menu-toggle" id="user-menu-toggle" aria-haspopup="true" aria-expanded="false">
            <li class="dropdown">
                <img src="../img/user2.jpg" href="#" class="dropbtn user-image" width="40" height="40"></i></img>
                <div class="dropdown-content">
                    <!-- <a href="#"><i class="fas fa-user-edit"></i> Perfil</a>
                    <a href="#"><i class="fas fa-cog"></i> Ajustes</a>-->
                    <a href="close.php"><i class="fas fa-sign-out-alt"></i> Salir</a>
                </div>
            </li>
        </button>

    </div>
</header>

      <section id="condiciones-section" class="content">
        <h2>Condiciones de Uso</h2>
        <div class="button-container">
          <button id="download-pdf-btn" style=" bottom: 10px !important; right: 40px !important; padding: 10px 30px !important;
    background: #a62eff !important; color: white !important; border: none !important; border-radius: 20px !important; cursor: pointer !important;
    font-size: 16px !important; font-family: var(--font) !important;">
            <i class="fas fa-download" ></i> Descargar PDF
          </button>
        </div>
        <div class="content-text">
          <p>A continuación se detallan las condiciones de uso del sistema de inventario de DriverCom:</p><br>
          <ol>
            <li><strong>Acceso y Uso:</strong> Los usuarios deben tener credenciales válidas para acceder al sistema.</li>
            <li><strong>Responsabilidad:</strong> Los usuarios son responsables de las acciones realizadas bajo sus cuentas.</li>
            <li><strong>Prohibiciones:</strong> Se prohíbe el uso del sistema para actividades ilegales o no autorizadas.</li>
            <li><strong>Protección de Datos:</strong> Se deben respetar las políticas de privacidad y protección de datos.</li>
            <li><strong>Modificaciones:</strong> DriverCom se reserva el derecho de modificar estas condiciones en cualquier momento.</li>
          </ol>
          <p>Al utilizar el sistema, los usuarios aceptan cumplir con estas condiciones.</p>
        </div>
      </section>
    </main>
  </div>


  <?php
  include 'page/footer.php';
  ?>

  <script src="../js/principales/condiciones.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>

</html>