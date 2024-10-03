
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
        window.location.href = 'agregarPersona.php';
    });

});




// modal Editar
document.addEventListener('DOMContentLoaded', function () {
    const editModal = new bootstrap.Modal(document.getElementById('editModalPersona'));
    // const editForm = document.getElementById('edit-user-form');
    // const saveChangesBtn = document.getElementById('save-changes-btn');

    let selectedUserId = null;

    // Al hacer clic en el botón de editar
    document.querySelectorAll('.edit-btn').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            // Obtener datos del usuario desde los atributos data-*
            const userId = this.getAttribute('data-id');
            const userName = this.getAttribute('data-nombre');
            const userEmail = this.getAttribute('data-ndoc');
            const userEstado = this.getAttribute('data-tel');
            const userPass = this.getAttribute('data-email');
            const userDir = this.getAttribute('data-dir');
            // const userFecha = this.getAttribute('data-fecha');

            
            
            
            
            
            
            // Asignar los valores al formulario del modal
            document.getElementById('edit-id').value = userId;
            document.getElementById('edit-nombre').value = userName;
            document.getElementById('edit-ndoc').value = userEmail;
            document.getElementById('edit-tel').value = userEstado;
            document.getElementById('edit-email').value = userPass;
            document.getElementById('edit-dir').value = userDir;
            // document.getElementById('edit-fecha').value = userFecha;

            selectedUserId = userId; // Guardar el ID del usuario seleccionado

            editModal.show(); // Mostrar el modal
        });
    });
});
