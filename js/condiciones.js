document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const toggleSidebar = document.getElementById('toggle-sidebar');
    const userMenuToggle = document.getElementById('user-menu-toggle');
    const userMenuDropdown = document.getElementById('user-menu-dropdown');
    const downloadPdfBtn = document.getElementById('download-pdf-btn');

    toggleSidebar.addEventListener('click', function () {
        sidebar.classList.toggle('collapsed');
        document.body.classList.toggle('sidebar-collapsed');
    });

    userMenuToggle.addEventListener('click', function (event) {
        event.stopPropagation();
        const expanded = this.getAttribute('aria-expanded') === 'true' || false;
        this.setAttribute('aria-expanded', !expanded);
        userMenuDropdown.hidden = expanded;
    });

    document.addEventListener('click', function (event) {
        if (!userMenuToggle.contains(event.target) && !userMenuDropdown.contains(event.target)) {
            userMenuToggle.setAttribute('aria-expanded', 'false');
            userMenuDropdown.hidden = true;
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            userMenuToggle.setAttribute('aria-expanded', 'false');
            userMenuDropdown.hidden = true;
        }
    });

    // Descargar PDF
    downloadPdfBtn.addEventListener('click', function () {
        const {
            jsPDF
        } = window.jspdf;
        const pdf = new jsPDF();
        const logo = '../img/LogoDrivercom.png'; // Ruta del logo
        pdf.addImage(logo, 'PNG', 75, 10, 60, 30, undefined, 'FAST'); // Centrar el logo
        pdf.text("Condiciones de Uso", 75, 50, {
            align: "center"
        });
        pdf.setFontSize(12);
        const textLines = [
            "A continuación se detallan las condiciones de uso del sistema de inventario de DriverCom:",
            "1. Acceso y Uso: Los usuarios deben tener credenciales válidas para acceder al sistema.",
            "2. Responsabilidad: Los usuarios son responsables de las acciones realizadas bajo sus cuentas.",
            "3. Prohibiciones: Se prohíbe el uso del sistema para actividades ilegales o no autorizadas.",
            "4. Protección de Datos: Se deben respetar las políticas de privacidad y protección de datos.",
            "5. Modificaciones: DriverCom se reserva el derecho de modificar estas condiciones en cualquier momento.",
            "Al utilizar el sistema, los usuarios aceptan cumplir con estas condiciones."




        ];
        pdf.text(textLines, 10, 60);
        pdf.save('condiciones_de_uso.pdf');
    });
});