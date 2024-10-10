<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Equipos</title>
  <link rel="icon" href="../img/www.ico">
  <link rel="stylesheet" href="../css/Stylemenu.css">
  <link rel="stylesheet" href="../css/Styletablas.css">
  <link rel="stylesheet" href="../css/formularios.css">
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