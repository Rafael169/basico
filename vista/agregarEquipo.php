<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Equipos - DriverCom</title>
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
            
            <a href="#" id="logout-link">Salir</a>
          </div>
        </div>
      </header>


      <section id="equipos-section" class="content">
        <h2>Gestión de Equipos</h2>

        <!-- Formulario de Equipos -->
        <div class="form-container">
          <form id="form-equipos" action="../vista/usuario/guardarEquipo.php" method="POST">
            <!-- Campo oculto para ID Equipo (usado en edición) -->
            <!-- <input type="hidden" id="id_equipo" name="id_equipo"> -->

            <div class="form-group">
              <label for="numero-serie">Número de Serie</label>
              <input type="text" id="t1" name="t1" placeholder="Ingrese Número de Serie" required>
            </div>

            <div class="form-group">
              <label for="nombre-equipo">Nombre del Equipo</label>
              <input type="text" id="t2" name="t2" placeholder="Ingrese el nombre del equipo" required>
            </div>

            <div class="form-group">
              <label for="marca">Marca</label>
              <select id="t3" name="t3" required>
                <option value="" disabled selected>Seleccione una marca</option>
                <option value="HP">HP</option>
                <option value="DELL">DELL</option>
                <option value="LENOVO">LENOVO</option>
                <option value="ASUS">ASUS</option>
                <option value="ACER">ACER</option>
                <option value="APPLE">APPLE</option>
                <option value="OTROS">OTROS</option>
              </select>
            </div>

            <div class="form-group">
              <label for="categoria">Categoría</label>
              <select id="t4" name="t4" required>
                <option value="" disabled selected>Seleccione una categoría</option>
                <option value="Desktop">Desktop</option>
                <option value="Laptop">Laptop</option>
                <option value="Impresora">Impresora</option>
                <option value="Monitor">Monitor</option>
                <option value="Accesorio">Accesorio</option>
                <option value="Otros">Otros</option>
              </select>
            </div>


            <!-- <div class="form-group">
              <label for="estado">Estado</label>
              <input type="text" id="estado" name="estado" required>
            </div> -->

            <div class="form-group">
              <label for="ubicacion">Ubicación</label>
              <input type="text" id="t6" name="t6" placeholder="Ingrese La Ubicacion" required>
            </div>

            <!-- <div class="form-group">
              <label for="fecha-ingreso">Fecha de Ingreso</label>
              <input type="date" id="fecha_ingreso" name="fecha_ingreso" placeholder="Ingrese la Fecha de Ingreso" required>
            </div> -->

            <div class="form-group">
              <label for="ingresado-por"></label>
              <input type="hidden" id="t8" name="t8" placeholder="Ingreso Por" required>
              <button type="submit" value="1" id="submit-btn">Guardar Equipo</button>
            </div>

            <div class="form-group">
            </div>
          </form>
        </div>
      </section>
    </main>
  </div>

  <footer class="main-footer">
    <p><strong>&copy; 2024 Driver <small>Com</small>. Todos los derechos reservados.</strong></p>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Función para cargar datos de equipo a editar
      function cargarDatosEquipo(idEquipo) {
        fetch('http://localhost/apidrivercom/equipo.php?id=' + idEquipo)
          .then(response => response.json())
          .then(data => {
            if (data && !data.error) {
              document.getElementById('id_equipo').value = data.ID_Equipo;
              document.getElementById('numero_serie').value = data.Numero_Serie;
              document.getElementById('nombre_equipo').value = data.Nombre_Equipo;
              document.getElementById('marca').value = data.Marca;
              document.getElementById('categoria').value = data.Categoria;
              document.getElementById('estado').value = data.Estado;
              document.getElementById('ubicacion').value = data.Ubicacion;
              document.getElementById('fecha_ingreso').value = data.Fecha_Ingreso;
              document.getElementById('ingresado_por').value = data.Ingresado_Por;

              document.getElementById('submit-btn').innerText = "Actualizar Equipo";
            } else {
              console.error('Error al obtener los datos:', data.error);
            }
          })
          .catch(error => console.error('Error al llamar a la API:', error));
      }
    });
  </script>
</body>

</html>