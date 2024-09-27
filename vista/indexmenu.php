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
          <img src="../img/LogoDrivercom.png" alt="Logo DriverCom" width="100" height="70">
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
          <li><a href="indexPersona.php"><i class="fas fa-user"></i> <span>Persona</span></a></li>
          <li><a href="indexPrestamos.php"><i class="fas fa-handshake"></i> <span>Préstamos</span></a></li>
          <li><a href="indexCondiciones.php"><i class="fas fa-file-contract"></i><span>Condiciones de uso</span></a></li>
        </ul>
      </nav>
    </aside>

    <main class="main-content">
      <header class="main-header">
        <div class="user-menu">
          <button class="user-menu-toggle" id="user-menu-toggle" aria-haspopup="true" aria-expanded="false">
            <img src="../img/user2.jpg" class="user-image" alt="" width="40" height="40">
          </button>
          <div class="user-menu-dropdown" id="user-menu-dropdown" hidden>
          <a href="close.php" id="logout-link"><i class="fa-solid fa-right-from-bracket"></i>Salir</a>

          </div>
        </div>
      </header>
      <section class="content">
        <h2>Panel de control</h2>
        <div class="box-container">
          <article class="box">
            <a href="indexEquipo.php">
              <i class="fas fa-laptop" aria-hidden="true"></i>
              <h1>Lista Equipos</h1>
            </a>
          </article>
          <article class="box">
            <a href="indexUsuario.php">
              <i class="fas fa-users" aria-hidden="true"></i>
              <h1>Lista Usuarios</h1>
            </a>
          </article>
          <article class="box">
            <a href="indexPrestamos.php">
              <i class="fas fa-handshake" aria-hidden="true"></i>
              <h1>Lista Préstamos</h1>
            </a>
          </article>
          <article class="box">
            <a href="agregarusuario.php">
              <i class="fas fa-file-contract" aria-hidden="true"></i>
              <h1>Agregar nuevo equipo</h1>
            </a>
          </article>
          <article class="box">
            <a href="agregarequipo.php">
              <i class="fas fa-box" aria-hidden="true"></i>
              <h1>Agregar nuevo Usuario</h1>
            </a>
          </article>
          <article class="box">
            <a href="agregarPrestamo.php">
              <i class="fas fa-box-open" aria-hidden="true"></i>
              <h1>Agregar nuevo Préstamo</h1>
            </a>
          </article>
  
        </div>
      </section>
    </main>
  </div>
  <footer class="main-footer">
    <p><strong>&copy; 2024 Driver <small>Com</small>.  Todos los derechos reservados.</strong></p>
  </footer>
  <script src="../js/menu.js"></script>
</body>

</html>
