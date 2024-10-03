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
              <th>rol</th>
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





  <!-- Modal de edición -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Editar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="edit-user-form" action="./usuario/editarUsuario.php" method="POST">
            <input type="hidden" id="edit-id" name="edit-id">
            <div class="mb-3">
              <label for="edit-nombre" class="form-label">Nombre de Usuario</label>
              <input type="text" class="form-control" id="edit-nombre" name="edit-nombre" required>
            </div>
            <div class="mb-3">
              <label for="edit-email" class="form-label">Correo Electrónico</label>
              <input type="email" class="form-control" id="edit-email" name="edit-email" required>
            </div>


            <div class="mb-3">
              <label for="edit-pass" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="edit-pass" name="edit-pass" required>
            </div>

            <!-- <div class="mb-3">
              <label for="edit-fecha" class="form-label">Fecha Modificacion</label>
              <input type="date" class="form-control" id="edit-fecha" name="edit-fecha" required>
            </div> -->
            <div class="mb-3">
              <label for="edit-estado" class="form-label">Estado</label>
              <input type="text" class="form-control" id="edit-estado" name="edit-estado" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <input type="submit" class="btn btn-primary" id="bg" value="Guardar cambios">

            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


  <script src="../js/principales/usuarios.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script>
</body>

</html>