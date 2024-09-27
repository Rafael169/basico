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
            <a href="close.php" id="logout-link"><i class="fa-solid fa-right-from-bracket"></i>Salir</a>

          </div>
        </div>
      </header>
      <section class="content">
        <h2>Listado De Equipos</h2>
        <div class="button-container">
          <!-- boton de agregar equipo -->
          <button href="agregarusuario.php" id="add-equipment-btn">
            <i class="fas fa-plus"></i> Agregar nuevo equipo
          </button>
          <input type="text" id="search-input" placeholder="Buscar...">
          <button id="download-pdf-btn">
            <i class="fas fa-download"></i> Descargar PDF
          </button>
        </div>
        <table id="equipment-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Numero Serie</th>
              <th>Nombre Equipo</th>
              <th>Marca</th>
              <th>Categoria</th>
              <th>Estado</th>
              <th>Ubicacion</th>
              <th>Fecha Ingreso</th>
              <th>Ingresado Por</th>
              <th>Acciones</th>

            </tr>
          </thead>
          <tbody>
            <!-- Aquí irán las filas de la tabla -->
            <?php include '../vista/usuario/equipoConsumo.php'; ?>

            <!-- Agregar más filas según sea necesario -->
          </tbody>
        </table>
      </section>
    </main>
  </div>
  <footer class="main-footer">
    <p><strong>&copy; 2024 Driver <small>Com</small>. Todos los derechos reservados.</strong></p>

  </footer>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const sidebar = document.getElementById('sidebar');
      const toggleSidebar = document.getElementById('toggle-sidebar');
      const userMenuToggle = document.getElementById('user-menu-toggle');
      const userMenuDropdown = document.getElementById('user-menu-dropdown');
      const searchInput = document.getElementById('search-input');
      const equipmentTable = document.getElementById('equipment-table');
      const addEquipmentBtn = document.getElementById('add-equipment-btn');
      const downloadPdfBtn = document.getElementById('download-pdf-btn');

      // Toggle sidebar
      toggleSidebar.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
        document.body.classList.toggle('sidebar-collapsed');
      });

      // User menu dropdown
      userMenuToggle.addEventListener('click', function(event) {
        event.stopPropagation();
        const expanded = this.getAttribute('aria-expanded') === 'true' || false;
        this.setAttribute('aria-expanded', !expanded);
        userMenuDropdown.hidden = expanded;
      });

      // Close the dropdown when clicking outside
      document.addEventListener('click', function(event) {
        if (!userMenuToggle.contains(event.target) && !userMenuDropdown.contains(event.target)) {
          userMenuToggle.setAttribute('aria-expanded', 'false');
          userMenuDropdown.hidden = true;
        }
      });

      // Close dropdown when pressing Escape key
      document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
          userMenuToggle.setAttribute('aria-expanded', 'false');
          userMenuDropdown.hidden = true;
        }
      });

      // Filter table rows based on search input
      searchInput.addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        const rows = equipmentTable.querySelectorAll('tbody tr');
        rows.forEach(row => {
          const cells = row.querySelectorAll('td');
          const match = Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(filter));
          row.style.display = match ? '' : 'none';
        });
      });

      // Download table as PDF
      downloadPdfBtn.addEventListener('click', function() {
        const jsPDF = window.jspdf.jsPDF;
        const pdf = new jsPDF();
        pdf.text("Equipos", 10, 10);
        pdf.autoTable({
          html: '#equipment-table'
        });
        pdf.save('equipos.pdf');
      });


      // Add Equipment Button
      addEquipmentBtn.addEventListener('click', function() {
        window.location.href = 'agregarEquipo.php';
      });

    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script>
</body>

</html>