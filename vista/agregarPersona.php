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
          <a href="close.php" id="logout-link"><i class="fa-solid fa-right-from-bracket"></i>Salir</a>

          </div>
        </div>
      </header>

      <section id="personas-section" class="content">
        <h2>Gestión de Personas</h2>

        <!-- Formulario de Personas -->
        <div class="form-container">
          <form id="form-personas" action="../vista/usuario/guardarPersona.php" method="POST">
            <!-- Campo oculto para ID Persona (usado en edición) -->
            <input type="hidden" id="id_persona" name="id_persona">

            <div class="form-group">
              <label for="nombre-completo">Nombre Completo</label>
              <input type="text" id="nombre" name="nombre" placeholder="Ingrese Nombres" required>
            </div>

            <div class="form-group">
              <label for="numero-documento">Número de Documento</label>
              <input type="text" id="ndoc" name="ndoc" placeholder="Ingrese N° Documento" required>
            </div>

            <div class="form-group">
              <label for="telefono">Teléfono</label>
              <input type="text" id="tel" name="tel" placeholder="Ingrese Número Telefono" required>
            </div>

            <div class="form-group">
              <label for="correo">Correo Electrónico</label>
              <input type="email" id="email" name="email" placeholder="Ingrese El Correo" required>
            </div>

            <div class="form-group">
              <label for="direccion">Dirección</label>
              <input type="text" id="dir" name="dir" placeholder="Ingrese La Dirrección" required>
            </div>

            <div class="form-group">
              <button type="submit" id="submit-btn">Guardar Persona</button>
            </div>
          </form>
        </div>
      </section>
    </main>
  </div>

  <footer class="main-footer">
    <p><strong>&copy; 2024 Driver <small>Com</small>.  Todos los derechos reservados.</strong></p>
  </footer>

  <script src="../js/addPersona.js"></script>
</body>

</html>
