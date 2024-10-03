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
            <img src="../img/user2.jpg" class="user-image" alt="" width="40" height="40">
            <span></span>
          </button>
          <div class="user-menu-dropdown" id="user-menu-dropdown" hidden>
            <a href="close.php" id="logout-link"><i class="fa-solid fa-right-from-bracket"></i>Salir</a>
          </div>
        </div>
      </header>

      <section id="condiciones-section" class="content">
        <h2>Condiciones de Uso</h2>
        <div class="button-container">
          <button id="download-pdf-btn">
            <i class="fas fa-download"></i> Descargar PDF
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