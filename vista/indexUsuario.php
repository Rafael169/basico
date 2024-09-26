<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DriverCom</title>
  <link rel="icon" href="../img/www.ico">
  <link rel="stylesheet" href="../css/Stylemenu.css">
  <link rel="stylesheet" href="../css/Styletablas.css">
  <!-- Bootstrap CSS -->
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
            <span>Usuario</span>
          </button>
          <div class="user-menu-dropdown" id="user-menu-dropdown" hidden>

            <a href="#" id="logout-link">Salir</a>
          </div>
        </div>
      </header>
      <section class="content" id="usuarios-section">
        <h2>Listado de Usuarios</h2>
        <div class="button-container">
          <button href="agregarUsuario.php" id="add-user-btn">
            <i class="fas fa-plus"></i> Agregar nuevo Usuarios
          </button>
          <input type="text" id="search-input" placeholder="Buscar...">
          <button id="download-pdf-btn">Descargar PDF</button>
        </div>
        <table id="user-table">
          <thead>
            <tr>
              <th>ID_Usuario</th>
              <th>Nombre_Usuario</th>
              <th>Correo_Electronico</th>
              <th>Estado</th>
              <th>Fecha_Modificacion</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <!-- Aquí irán las filas de la tabla -->
            <?php include '../vista/usuario/usuarioConsumo.php'; ?>
            <!-- Agregar más filas según sea necesario -->
          </tbody>
        </table>
      </section>
    </main>
  </div>


  <footer class="main-footer">
    <p><strong>&copy; 2024 Driver <small>Com</small>. Todos los derechos reservados.</strong></p>
  </footer>

  <!-- Modal de confirmación de eliminación -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Estás seguro de que deseas eliminar este registro?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger" id="confirm-delete-btn">Eliminar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal de edición -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Editar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="edit-user-form">
            <input type="hidden" id="edit-id" name="ID_Usuario">
            <div class="mb-3">
              <label for="edit-nombre" class="form-label">Nombre de Usuario</label>
              <input type="text" class="form-control" id="edit-nombre" name="Nombre_Usuario" required>
            </div>
            <div class="mb-3">
              <label for="edit-email" class="form-label">Correo Electrónico</label>
              <input type="email" class="form-control" id="edit-email" name="Correo_Electronico" required>
            </div>
            <div class="mb-3">
              <label for="edit-estado" class="form-label">Estado</label>
              <input type="text" class="form-control" id="edit-estado" name="Estado" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="save-changes-btn">Guardar cambios</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>





  <script src="../js/EliminarModal.js"></script>
  <script src="../js/usuarios.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script>
</body>

</html>