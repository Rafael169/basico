<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Equipos</title>
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
            <span></span>
          </button>
          <div class="user-menu-dropdown" id="user-menu-dropdown" hidden>
            <a href="close.php" id="logout-link"><i class="fa-solid fa-right-from-bracket"></i>Salir</a>
          </div>
        </div>
      </header>

      <section id="equipos-section" class="content">
        <h2>Registro de Equipos</h2>

        <!-- Formulario de Equipos -->
        <div class="form-container">
          <form id="form-equipos" action="../vista/equipo/guardarEquipo.php" method="POST">


            <div class="form-group">
              <label for="numero-serie">Número de Serie</label>
              <input type="text" id="numero-serie" name="numero-serie" placeholder="Ingrese Número de Serie" required>
            </div>

            <div class="form-group">
              <label for="nombre-equipo">Nombre del Equipo</label>
              <input type="text" id="nombre-equipo" name="nombre-equipo" placeholder="Ingrese Nombre del Equipo" required>
            </div>

            <div class="form-group">
              <label for="marca-equipo">Marca</label>
              <select id="marca-equipo" name="marca-equipo" required>
                <option value="" disabled selected>Seleccione la Marca</option>
                <option value="HP">HP</option>
                <option value="Dell">Dell</option>
                <option value="Lenovo">Lenovo</option>
                <option value="Apple">Apple</option>
                <option value="Asus">Asus</option>
                <option value="Acer">Acer</option>
                <option value="Otra">Otra</option>
              </select>
            </div>

            <div class="form-group">
              <label for="categoria-equipo">Categoría</label>
              <select id="categoria-equipo" name="categoria-equipo" required>
                <option value="" disabled selected>Seleccione la Categoría</option>
                <option value="Laptop">Laptop</option>
                <option value="Desktop">Desktop</option>
                <option value="Tablet">Tablet</option>
                <option value="Servidor">Servidor</option>
                <option value="Impresora">Impresora</option>
                <option value="Monitor">Monitor</option>
                <option value="Otro">Otro</option>
              </select>
            </div>

            <div class="form-group">
              <label for="estado-equipo">Estado</label>
              <select id="estado-equipo" name="estado-equipo" required>
                <option value="" disabled selected>Seleccione el Estado</option>
                <option value="Nuevo">Nuevo</option>
                <option value="Usado">Usado</option>
                <option value="Dañado">Dañado</option>
                <option value="Reparación">En reparación</option>
                <option value="Obsoleto">Obsoleto</option>
              </select>
            </div>

            <div class="form-group">
              <label for="ubicacion-equipo">Ubicación</label>
              <input type="text" id="ubicacion-equipo" name="ubicacion-equipo" placeholder="Ingrese Ubicación del Equipo" required>
            </div>

            <div class="form-group">
              <button type="submit">Guardar Equipo</button>
            </div>

          </form>
        </div>
      </section>
    </main>
  </div>


  <?php
  include 'page/footer.php';
  ?>

  <script src="../js/add/addEquipo.js"></script>

</body>

</html>