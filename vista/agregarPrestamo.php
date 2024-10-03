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
    <aside class="sidebar" id="sidebar">

      <?php
      include 'page/aside.php';
      ?>

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

      <section id="prestamos-section" class="content">
        <h2>Gestión de Préstamos</h2>

        <!-- Formulario de Préstamos -->
        <div class="form-container">
          <form id="form-prestamos" action="../vista/usuario/guardarPrestamo.php" method="POST">





            <?php
            $baseUrl = "http://localhost/basico/apidrivercom/persona.php";

            function consumoApi($url)
            {
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_HEADER, false);
              $response = curl_exec($ch);
              if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
              }
              curl_close($ch);
              return json_decode($response, true);
            }

            $page = 1;
            $apiUrl = $baseUrl . "?page=" . $page;  // URL de la API
            $data = consumoApi($apiUrl);

            ?>

            <div class="form-group">
              <label for="id-persona">ID Persona</label>
              <select id="idpersona" name="idpersona" required>
                <?php foreach ($data['data'] as $item) { ?>
                  <option value="<?php echo $item["ID_Persona"]; ?>"><?php echo $item['Nombre_Completo']; ?></option>
                <?php } ?>
              </select>
            </div>

            <?php
            $baseUrl = "http://localhost/basico/apidrivercom/equipo.php";

            function consumoApiEquipo($url)
            {
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_HEADER, false);
              $response = curl_exec($ch);
              if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
              }
              curl_close($ch);
              return json_decode($response, true);
            }

            $page = 1;
            $apiUrl = $baseUrl . "?page=" . $page;  // URL de la API
            $data = consumoApiEquipo($apiUrl);

            ?>
            <?php
            // Imprimir la variable $data o depuracion para ver los datos
            // echo '<pre>';
            // var_dump($data);
            // echo '</pre>';
            ?>
            <div class="form-group">
              <label for="id-equipo">ID Equipo</label>
              <select id="idequipo" name="idequipo" required>
                <?php foreach ($data['data'] as $item) { ?>
                  <option value="<?php echo $item["ID_Equipo"]; ?>"><?php echo $item['Nombre_Equipo']; ?></option>
                <?php } ?>
              </select> <!-- Dinámico desde la API -->
            </div>





            <?php
            $baseUrl = "http://localhost/basico/apidrivercom/usuario.php";

            function consumoApiUsuario($url)
            {
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_HEADER, false);
              $response = curl_exec($ch);
              if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
              }
              curl_close($ch);
              return json_decode($response, true);
            }

            $page = 1;
            $apiUrl = $baseUrl . "?page=" . $page;  // URL de la API
            $data = consumoApiUsuario($apiUrl);

            ?>

            <div class="form-group">
              <label for="id-usuario">ID Usuario</label>
              <select id="idequipo" name="idusuario" required>
                <?php foreach ($data['data'] as $item) { ?>
                  <option value="<?php echo $item["ID_Usuario"]; ?>"><?php echo $item['Nombre_Usuario']; ?></option>
                <?php } ?>
              </select> <!-- Dinámico desde la API -->
            </div>


            <div class="form-group">
              <label for="fecha-devolucion">Fecha de Devolución</label>
              <input type="date" id="fdevo" name="fdevo" required>
            </div>


            <div class="form-group">
              <label for="comentarios">Comentarios</label>
              <textarea id="comentario" name="comentario" rows="4"></textarea>
            </div>

            <div class="form-group">
              <button type="submit">Guardar Préstamo</button>
            </div>
          </form>
        </div>
      </section>
    </main>
  </div>


  <?php
  include 'page/footer.php';
  ?>

  <script src="../js/add/addPrestamo.js"></script>
</body>

</html>