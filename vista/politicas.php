<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Política de Privacidad - DriverCom</title>
    <link rel="icon" href="../img/www.ico">
    <link rel="stylesheet" href="../css/Stylemenu.css">
    <link rel="stylesheet" href="../css/Styletablas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="dashboard">

        <aside class="sidebar" id="sidebar">
            <header class="sidebar-header">
                <h1>
                    <img src="../img/LogoDrivercom.png" alt="Logo DriverCom" width="100" height="70">
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
                    <li><a href="indexPersona.php"><i class="fas fa-user"></i> <span>Persona</span></a></li>
                    <li><a href="indexPrestamos.php"><i class="fas fa-handshake"></i> <span>Préstamos</span></a></li>
                    <!-- <li><a href="indexCondiciones.php"><i class="fas fa-file-contract"></i><span>Condiciones de uso</span></a></li> -->
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

            <section id="privacidad-section" class="content">
                <h2>Política de Privacidad</h2>
                <div class="content-text">
                    <p>En DriverCom, valoramos tu privacidad y estamos comprometidos con la protección de tus datos
                        personales. A continuación, te informamos sobre cómo recogemos, usamos y protegemos tu
                        información:</p><br>
                    <ol>
                        <li><strong>Recopilación de Datos:</strong> Recopilamos datos personales como nombre, correo
                            electrónico y otra información necesaria para el funcionamiento de nuestro servicio.</li>
                        <li><strong>Uso de los Datos:</strong> Los datos recopilados se utilizan para gestionar el
                            inventario y ofrecer un mejor servicio a los usuarios.</li>
                        <li><strong>Protección de Datos:</strong> Implementamos medidas de seguridad técnicas y
                            organizativas para proteger tu información.</li>
                        <li><strong>Derechos del Usuario:</strong> Tienes el derecho de acceder, rectificar o eliminar
                            tus datos personales en cualquier momento.</li>
                        <li><strong>Modificaciones:</strong> DriverCom se reserva el derecho de actualizar esta política
                            en cualquier momento. Las modificaciones serán notificadas a los usuarios.</li>
                    </ol>
                    <p>Si tienes alguna duda o solicitud relacionada con tu privacidad, puedes contactarnos a través de
                        los medios indicados.</p>
                </div>
                <button id="download-pdf" class="btn btn-primary" style=" bottom: 10px !important; right: 40px !important; padding: 10px 30px !important;
    background: #a62eff !important; color: white !important; border: none !important; border-radius: 20px !important; cursor: pointer !important;
    font-size: 16px !important; font-family: var(--font) !important;"> <i class="fas fa-download" ></i>  Descargar PDF</button>
            </section>
        </main>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
    document.getElementById('download-pdf').addEventListener('click', function() {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF();

        doc.text("Política de Privacidad", 10, 10);
        doc.text(
            "En DriverCom, valoramos tu privacidad y estamos comprometidos con la protección de tus datos personales.",
            10, 20);
        doc.text("A continuación, te informamos sobre cómo recogemos, usamos y protegemos tu información:", 10,
            30);
        doc.text(
            "1. Recopilación de Datos: Recopilamos datos personales como nombre, correo electrónico y otra información necesaria.",
            10, 40);
        doc.text(
            "2. Uso de los Datos: Los datos recopilados se utilizan para gestionar el inventario y ofrecer un mejor servicio.",
            10, 50);
        doc.text(
            "3. Protección de Datos: Implementamos medidas de seguridad técnicas y organizativas para proteger tu información.",
            10, 60);
        doc.text(
            "4. Derechos del Usuario: Tienes el derecho de acceder, rectificar o eliminar tus datos personales en cualquier momento.",
            10, 70);
        doc.text(
            "5. Modificaciones: DriverCom se reserva el derecho de actualizar esta política en cualquier momento.",
            10, 80);

        doc.save('Politica_de_Privacidad_DriverCom.pdf');
    });
    </script>
</body>

</html>