document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const toggleSidebar = document.getElementById('toggle-sidebar');
    const userMenuToggle = document.getElementById('user-menu-toggle');
    const userMenuDropdown = document.getElementById('user-menu-dropdown');
    const searchInput = document.getElementById('search-input');
    const equipmentTable = document.getElementById('equipment-table');
    const addEquipmentBtn = document.getElementById('add-equipment-btn');
    const downloadPdfBtn = document.getElementById('download-pdf-btn');

    // Toggle sidebar
    toggleSidebar.addEventListener('click', function () {
        sidebar.classList.toggle('collapsed');
        document.body.classList.toggle('sidebar-collapsed');
    });

    // User menu dropdown
    userMenuToggle.addEventListener('click', function (event) {
        event.stopPropagation();
        const expanded = this.getAttribute('aria-expanded') === 'true' || false;
        this.setAttribute('aria-expanded', !expanded);
        userMenuDropdown.hidden = expanded;
    });

    // Close the dropdown when clicking outside
    document.addEventListener('click', function (event) {
        if (!userMenuToggle.contains(event.target) && !userMenuDropdown.contains(event.target)) {
            userMenuToggle.setAttribute('aria-expanded', 'false');
            userMenuDropdown.hidden = true;
        }
    });

    // Close dropdown when pressing Escape key
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            userMenuToggle.setAttribute('aria-expanded', 'false');
            userMenuDropdown.hidden = true;
        }
    });

    // Filter table rows based on search input
    searchInput.addEventListener('input', function () {
        const filter = this.value.toLowerCase();
        const rows = equipmentTable.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            const match = Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(filter));
            row.style.display = match ? '' : 'none';
        });
    });

    // Download table as PDF
    downloadPdfBtn.addEventListener('click', function () {
        const jsPDF = window.jspdf.jsPDF;
        const pdf = new jsPDF();
        pdf.text("Equipos", 10, 10);
        pdf.autoTable({
            html: '#equipment-table'
        });
        pdf.save('equipos.pdf');
    });


    // Add Equipment Button
    addEquipmentBtn.addEventListener('click', function () {
        window.location.href = 'agregarEquipo.php';
    });

});