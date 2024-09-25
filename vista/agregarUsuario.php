<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DriverCom</title>
  <link rel="icon" href="../img/www.ico">
  <link rel="stylesheet" href="../css/Stylemenu.css">
  <link rel="stylesheet" href="../css/Stylosregistro.css">
  <link rel="stylesheet" href="../css/formularios.css">
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
            <a href="#" id="perfil-link">Perfil</a>
            <a href="#" id="logout-link">Salir</a>
          </div>
        </div>
      </header>

      <section id="usuarios-section" class="content">
        <h2>Gestión de Usuarios</h2>

        <!-- Formulario de Usuarios -->
        <div class="form-container">
          <form id="form-usuarios" action="../vista/usuario/guardarUsuario.php" method="POST">

            <div class="form-group">
              <label for="nombre-usuario">Nombre del Usuario</label>
              <input type="text" id="t1" name="t1" required>
            </div>

            <div class="form-group">
              <label for="email-usuario">Correo Electrónico</label>
              <input type="email" id="t2" name="t2" required>
            </div>

            <div class="form-group">
              <label for="password-usuario">Contraseña</label>
              <input type="password" id="t3" name="t3" required>
            </div>

            <div class="form-group">
              <label for="creado-por">Creado Por</label>
              <input type="text" id="t5" name="t5" required>
            </div>

            <div class="form-group">
              <label for="rol">Rol</label>
              <input type="number" id="t6" name="t6" required>
            </div>

            <!-- <div class="form-group">
              <label for="fecha-creacion">Fecha de Creación</label>
              <input type="date" id="t6" name="t6" required>
            </div>

            <div class="form-group">
              <label for="fecha-modificacion">Fecha de Modificación</label>
              <input type="date" id="t7" name="t7" required>
            </div> -->

            <div class="form-group">
              <button type="submit">Guardar Usuario</button>
            </div>
          </form>
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
    });
  </script>
</body>

</html>