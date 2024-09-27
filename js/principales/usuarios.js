document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const toggleSidebar = document.getElementById('toggle-sidebar');
    const userMenuToggle = document.getElementById('user-menu-toggle');
    const userMenuDropdown = document.getElementById('user-menu-dropdown');
    const searchInput = document.getElementById('search-input');
    const userTable = document.getElementById('user-table');
    const addUserBtn = document.getElementById('add-user-btn');
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
        const rows = userTable.querySelectorAll('tbody tr');
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
        pdf.text("Usuarios", 10, 10);
        pdf.autoTable({
            html: '#user-table'
        });
        pdf.save('usuarios.pdf');
    });

    // Add User Button
    addUserBtn.addEventListener('click', function () {
        window.location.href = 'agregarUsuario.php';
    });
});


// modal Editar
  document.addEventListener('DOMContentLoaded', function() {
    const editModal = new bootstrap.Modal(document.getElementById('editModal'));
    const editForm = document.getElementById('edit-user-form');
    const saveChangesBtn = document.getElementById('save-changes-btn');

    let selectedUserId = null;

    // Al hacer clic en el botón de editar
    document.querySelectorAll('.edit-btn').forEach(function(button) {
      button.addEventListener('click', function(event) {
        event.preventDefault();

        // Obtener datos del usuario desde los atributos data-*
        const userId = this.getAttribute('data-id');
        const userName = this.getAttribute('data-nombre');
        const userEmail = this.getAttribute('data-email');
        const userEstado = this.getAttribute('data-estado');

        // Asignar los valores al formulario del modal
        document.getElementById('edit-id').value = userId;
        document.getElementById('edit-nombre').value = userName;
        document.getElementById('edit-email').value = userEmail;
        document.getElementById('edit-estado').value = userEstado;

        selectedUserId = userId; // Guardar el ID del usuario seleccionado

        editModal.show(); // Mostrar el modal
      });
    });

    // Al hacer clic en el botón de "Guardar cambios"
    saveChangesBtn.addEventListener('click', function() {
      const formData = new FormData(editForm);
      const url = `http://localhost/apidrivercom/usuario.php?id=${selectedUserId}`;

      fetch(url, {
        method: 'PUT',
        body: formData,
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert('Usuario actualizado correctamente');
          location.reload(); // Recargar la página para ver los cambios
        } else {
          alert('Error al actualizar el usuario');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Error al procesar la solicitud.');
      });
    });
  });

