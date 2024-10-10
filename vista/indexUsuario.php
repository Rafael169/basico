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

  <style>

.logo {
      font-size: 1.5rem;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      border-radius: 10px;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align:left ;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

  
</style>
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
            <li class="dropdown">
                <img src="../img/user2.jpg" href="#" class="dropbtn user-image" width="40" height="40"></i></img>
                <div class="dropdown-content">
                    <!-- <a href="#"><i class="fas fa-user-edit"></i> Perfil</a>
                    <a href="#"><i class="fas fa-cog"></i> Ajustes</a>-->
                    <a href="close.php"><i class="fas fa-sign-out-alt"></i> Salir</a>
                </div>
            </li>
        </button>

    </div>
</header>
      <section class="content" id="usuarios-section">
        <h2>Listado de Usuarios</h2>
        <div class="button-container">
          <button href="agregarUsuario.php"  id="add-user-btn" style=" bottom: 10px !important; right: 40px !important; padding: 10px 30px !important;
    background: #a62eff !important; color: white !important; border: none !important; border-radius: 20px !important; cursor: pointer !important;
    font-size: 16px !important; font-family: var(--font) !important;" >
            <i class="fas fa-plus"></i> Agregar nuevo Usuarios
          </button>
          <input type="text" id="search-input" placeholder="Buscar...">
          <button  id="download-pdf-btn" style=" bottom: 10px !important; right: 40px !important; padding: 10px 30px !important;
    background: #a62eff !important; color: white !important; border: none !important; border-radius: 20px !important; cursor: pointer !important;
    font-size: 16px !important; font-family: var(--font) !important;"><i class="fas fa-download"></i>Descargar PDF</button>
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
  <footer class="main-footer">
    <div class="footer-content">
        <div class="copyright">
            <strong>&copy; 2024 DriverCom</strong>
            <span class="separator">|</span>
            <span class="rights">Todos los derechos reservados.</span>
        </div>
        <div class="footer-links">
            <a href="politicas.php" class="footer-link"  style="text-decoration: none !important; color: #a62eff !important; ">Política de Privacidad</a>
            <span class="separator">|</span>
            <a href="indexCondiciones.php" class="footer-link" style="text-decoration: none !important; color: #a62eff !important; ">Condiciones de Uso</a>
        </div>
    </div>
</footer>
  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


  <script src="../js/principales/usuarios.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script>
</body>

</html>