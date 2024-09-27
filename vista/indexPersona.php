<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DriverCom</title>
  <link rel="icon" href="../img/www.ico">
  <link rel="stylesheet" href="../css/Stylemenu.css">
  <link rel="stylesheet" href="../css/Styletablas.css">
  <link rel="stylesheet" href="../css/modalStyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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
            <span></span>
          </button>
          <div class="user-menu-dropdown" id="user-menu-dropdown" hidden>
            <a href="close.php" id="logout-link"><i class="fa-solid fa-right-from-bracket"></i>Salir</a>
          </div>
        </div>
      </header>
      <section class="content">
        <h2>Lista De Personas</h2>
        <div class="button-container">
          <button href="agregarPersona.php" id="add-equipment-btn">
            <i class="fas fa-plus"></i> Agregar nueva Persona
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
              <th>Nombre Completo</th>
              <th>Numero Documento</th>
              <th>Telefono</th>
              <th>Correo</th>
              <th>Direccion</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <!-- Aquí irán las filas de la tabla -->
            <?php
            include '../vista/usuario/personaConsumo.php';
            ?>

            <!-- Agregar más filas según sea necesario -->
          </tbody>
        </table>
      </section>
    </main>
  </div>


  <!-- fin modal -->
  <!-- Modal de confirmación de eliminación -->

  <!-- fin modal -->

  <footer class="main-footer">
    <p><strong>&copy; 2024 Driver <small>Com</small>. Todos los derechos reservados.</strong></p>

  </footer>


  <!-- Modal Bootstrap 5 -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Estás seguro de que deseas eliminar este registro?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="../js/persona.js"></script>
  <script src="../js/modalPersona.js"></script>
  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script>
</body>

</html>