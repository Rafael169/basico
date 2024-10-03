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
            <span>Usuario</span>
          </button>
          <div class="user-menu-dropdown" id="user-menu-dropdown" hidden>
            <a href="close.php" id="logout-link"><i class="fa-solid fa-right-from-bracket"></i>Salir</a>

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
              <input type="text" id="t1" name="t1" placeholder="Ingrese Nombre Usuario" required>
            </div>

            <div class="form-group">
              <label for="email-usuario">Correo Electrónico</label>
              <input type="email" id="t2" name="t2" placeholder="Ingrese Correo" required>
            </div>

            <div class="form-group">
              <label for="password-usuario">Contraseña</label>
              <input type="password" id="t3" name="t3" placeholder="Ingrese Contraseña" required>
            </div>

            <div class="form-group">
              <label for="creado-por">Creado Por</label>
              <input type="text" id="t5" name="t5" placeholder="Ingrese Creado Por" required>
            </div>

            <div class="form-group">
              <label for="rol">Rol</label>
              <select id="t6" name="t6" required>
                <option value="" disabled selected>Seleccione un rol</option>
                <option value="1">Super Administrador</option>
                <option value="2">Administrador</option>
              </select>
            </div>

            <!-- <div class="form-group">
              <label for="rol">Rol</label>
              <input type="number" id="t6" name="t6" placeholder="Ingrese Rol id" required>
            </div> -->

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


  <?php
  include 'page/footer.php';
  ?>

  <script src="../js/add/addUsuario.js"></script>
</body>

</html>