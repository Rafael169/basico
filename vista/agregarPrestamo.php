<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DriverCom</title>
  <link rel="icon" href="../img/www.ico">
  <link rel="stylesheet" href="../css/Stylemenu.css">
  <link rel="stylesheet" href="../css/Styletablas.css">
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
          <a href="close.php" id="logout-link"><i class="fa-solid fa-right-from-bracket"></i>Salir</a>

          </div>
        </div>
      </header>

      <section id="prestamos-section" class="content">
        <h2>Gestión de Préstamos</h2>

        <!-- Formulario de Préstamos -->
        <div class="form-container">
          <form id="form-prestamos"  action="../vista/usuario/guardarPrestamo.php" method="POST">
            
            <div class="form-group">
              <label for="id-prestamo">ID Préstamo</label>
              <input type="text" id="id-prestamo" name="id_prestamo" required>
            </div>

            <div class="form-group">
              <label for="id-equipo">ID Equipo</label>
              <select id="id-equipo" name="id_equipo" required></select> <!-- Dinámico desde la API -->
            </div>

            

            <div class="form-group">
              <label for="id-persona">ID Persona</label>
              <select id="id-persona" name="id_persona" required></select> <!-- Dinámico desde la API -->
            </div>

            <div class="form-group">
              <label for="id-usuario">ID Usuario</label>
              <select id="id-usuario" name="id_usuario" required></select> <!-- Dinámico desde la API -->
            </div>

            <div class="form-group">
              <label for="fecha-prestamo">Fecha de Préstamo</label>
              <input type="date" id="fecha-prestamo" name="fecha_prestamo" required>
            </div>

            <div class="form-group">
              <label for="fecha-devolucion">Fecha de Devolución</label>
              <input type="date" id="fecha-devolucion" name="fecha_devolucion" required>
            </div>

            <div class="form-group">
              <label for="estado">Estado</label>
              <select id="estado" name="estado" required>
                <option value="activo">Activo</option>
                <option value="devuelto">Devuelto</option>
                <option value="pendiente">Pendiente</option>
              </select>
            </div>

            <div class="form-group">
              <label for="comentarios">Comentarios</label>
              <textarea id="comentarios" name="comentarios" rows="4"></textarea>
            </div>

            <div class="form-group">
              <button type="submit">Guardar Préstamo</button>
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
    document.addEventListener('DOMContentLoaded', function () {
      // Cargar datos de la API para los selectores
      cargarDatos('api/equipos', 'id-equipo');
      cargarDatos('api/personas', 'id-persona');
      cargarDatos('api/usuarios', 'id-usuario');

      function cargarDatos(url, elementoId) {
        fetch(url)
          .then(response => response.json())
          .then(data => {
            const select = document.getElementById(elementoId);
            data.forEach(item => {
              const option = document.createElement('option');
              option.value = item.id;  // Aquí debes ajustar el valor de ID según la respuesta de tu API
              option.textContent = item.nombre;  // Aquí ajustas el texto que mostrará la opción
              select.appendChild(option);
            });
          })
          .catch(error => console.error('Error al cargar los datos:', error));
      }

      // Manejo del menú y sidebar (Opcional, reutilizado de tu código anterior)
      const sidebar = document.getElementById('sidebar');
      const toggleSidebar = document.getElementById('toggle-sidebar');
      const userMenuToggle = document.getElementById('user-menu-toggle');
      const userMenuDropdown = document.getElementById('user-menu-dropdown');

      toggleSidebar.addEventListener('click', function () {
        sidebar.classList.toggle('collapsed');
        document.body.classList.toggle('sidebar-collapsed');
      });

      userMenuToggle.addEventListener('click', function (event) {
        event.stopPropagation();
        const expanded = this.getAttribute('aria-expanded') === 'true' || false;
        this.setAttribute('aria-expanded', !expanded);
        userMenuDropdown.hidden = expanded;
      });

      document.addEventListener('click', function (event) {
        if (!userMenuToggle.contains(event.target) && !userMenuDropdown.contains(event.target)) {
          userMenuToggle.setAttribute('aria-expanded', 'false');
          userMenuDropdown.hidden = true;
        }
      });

      document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
          userMenuToggle.setAttribute('aria-expanded', 'false');
          userMenuDropdown.hidden = true;
        }
      });
    });
  </script>
</body>

</html>
