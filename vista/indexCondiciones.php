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
</head>

<body>
  <div class="dashboard">
    <aside class="sidebar" id="sidebar">
      <header class="sidebar-header">
        <h1>
          <img src="../img/LogoDrivercom.png" alt="Logo DriverCom" width="40" height="40">
          Driver<small>Com</small>
        </h1>
        <button id="toggle-sidebar" class="toggle-sidebar" aria-label="Toggle Sidebar">
          <i class="fas fa-bars"></i>
        </button>
      </header>
      <nav class="sidebar-nav">
        <ul>
          <li><a href="indexmenu.php"><i class="fas fa-home"></i> <span>Home</span></a></li>
          <li><a href="indexEquipo.php"><i class="fas fa-laptop"></i> <span>Equipos</span></a></li>
          <li><a href="indexUsuario.php"><i class="fas fa-users"></i> <span>Usuarios</span></a></li>
          <li><a href="indexPersona.php"><i class="fas fa-user"></i> <span>Registro de persona</span></a></li>
          <li><a href="indexPrestamos.php"><i class="fas fa-handshake"></i> <span>Préstamos</span></a></li>
          <li><a href="indexCondiciones.php"><i class="fas fa-file-contract"></i> <span>Condiciones de uso</span></a></li>
        </ul>
      </nav>
    </aside>

    <main class="main-content">
      <header class="main-header">
        <div class="user-menu">
          <button class="user-menu-toggle" id="user-menu-toggle" aria-haspopup="true" aria-expanded="false">
            <img src="../img/user2.jpg" class="user-image" alt="" width="40" height="40">
            <span>Usuario</span>
          </button>
          <div class="user-menu-dropdown" id="user-menu-dropdown" hidden>
            
            <a href="#" id="logout-link">Salir</a>
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

  <footer class="main-footer">
  <p><strong>&copy; 2024 Driver <small>Com</small>.  Todos los derechos reservados.</strong></p>

  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const sidebar = document.getElementById('sidebar');
      const toggleSidebar = document.getElementById('toggle-sidebar');
      const userMenuToggle = document.getElementById('user-menu-toggle');
      const userMenuDropdown = document.getElementById('user-menu-dropdown');
      const downloadPdfBtn = document.getElementById('download-pdf-btn');

      toggleSidebar.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
        document.body.classList.toggle('sidebar-collapsed');
      });

      userMenuToggle.addEventListener('click', function(event) {
        event.stopPropagation();
        const expanded = this.getAttribute('aria-expanded') === 'true' || false;
        this.setAttribute('aria-expanded', !expanded);
        userMenuDropdown.hidden = expanded;
      });

      document.addEventListener('click', function(event) {
        if (!userMenuToggle.contains(event.target) && !userMenuDropdown.contains(event.target)) {
          userMenuToggle.setAttribute('aria-expanded', 'false');
          userMenuDropdown.hidden = true;
        }
      });

      document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
          userMenuToggle.setAttribute('aria-expanded', 'false');
          userMenuDropdown.hidden = true;
        }
      });

      // Descargar PDF
      downloadPdfBtn.addEventListener('click', function() {
        const {
          jsPDF
        } = window.jspdf;
        const pdf = new jsPDF();
        const logo = '../img/LogoDrivercom.png'; // Ruta del logo
        pdf.addImage(logo, 'PNG', 75, 10, 60, 30, undefined, 'FAST'); // Centrar el logo
        pdf.text("Condiciones de Uso", 75, 50, {
          align: "center"
        });
        pdf.setFontSize(12);
        const textLines = [
          "A continuación se detallan las condiciones de uso del sistema de inventario de DriverCom:",
          "1. Acceso y Uso: Los usuarios deben tener credenciales válidas para acceder al sistema.",
          "2. Responsabilidad: Los usuarios son responsables de las acciones realizadas bajo sus cuentas.",
          "3. Prohibiciones: Se prohíbe el uso del sistema para actividades ilegales o no autorizadas.",
          "4. Protección de Datos: Se deben respetar las políticas de privacidad y protección de datos.",
          "5. Modificaciones: DriverCom se reserva el derecho de modificar estas condiciones en cualquier momento.",
          "Al utilizar el sistema, los usuarios aceptan cumplir con estas condiciones."



          
        ];
        pdf.text(textLines, 10, 60);
        pdf.save('condiciones_de_uso.pdf');
      });
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>

</html>