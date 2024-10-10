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

      <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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


      <section class="content">
        <h2>Panel de control</h2>
            

        <p>Bienvenido, Usuario </p>

        <div class="box-container">
          <article class="box">
            <a href="indexEquipo.php">
              <i class="fas fa-laptop" aria-hidden="true"></i>
              <h5>Lista Equipos</h5>
            </a>
          </article>
          <article class="box">
            <a href="indexUsuario.php">
              <i class="fas fa-users" aria-hidden="true"></i>
              <h5>Lista Usuarios</h5>
            </a>
          </article>
          <article class="box">
            <a href="indexPrestamos.php">
              <i class="fas fa-handshake" aria-hidden="true"></i>
              <h5>Lista Préstamos</h5>
            </a>
          </article>
          <article class="box">
            <a href="agregarusuario.php">
              <i class="fas fa-file-contract" aria-hidden="true"></i>
              <h5>Agregar nuevo equipo</h5>
            </a>
          </article>
          <article class="box">
            <a href="agregarequipo.php">
              <i class="fas fa-box" aria-hidden="true"></i>
              <h5>Agregar nuevo Usuario</h5>
            </a>
          </article>
          <article class="box">
            <a href="agregarPrestamo.php">
              <i class="fas fa-box-open" aria-hidden="true"></i>
              <h5>Agregar nuevo Préstamo</h5>
            </a>
          </article>

        </div>
    
        <div class="container-video">
    <article class="video">
        <table class="column" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td width="40%">
                    <h2 style="color: white; padding-left: 100px;">
                        <b>Gestiona <br> con facilidad</b><br>
                        Descubre cómo en <br>
                        nuestro video.
                    </h2>
                </td>
                <td width="60%" style="position: relative;">
                    <button class="btn-overlay" id="openModal">Ver video</button>
                    <img src="../img/box-video.png" alt="Imagen de fondo" class="img-video">
                </td>
            </tr>
        </table>
    </article>
</div>


<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <video controls>
            <source src="ruta_de_tu_video.mp4" type="video/mp4">
            Tu navegador no soporta la etiqueta de video.
        </video>
    </div>
</div>
<script src="../js/video.js"></script>

      </section>
    </main>
  </div>

  <?php
  include 'page/footer.php';
  ?>
  <script src="../js/principales/menu.js"></script>
  
</body>

</html>