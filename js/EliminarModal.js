document.addEventListener('DOMContentLoaded', function () {
    let deleteLink = ''; // Para almacenar el enlace de eliminación
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const confirmDeleteBtn = document.getElementById('confirm-delete-btn');

    // Al hacer clic en el botón de eliminar (ícono de papelera)
    document.querySelectorAll('.delete-btn').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            deleteLink = 'eliminaUsuario.php?id=' + this.getAttribute('data-id'); // Guardar el enlace de eliminación
            deleteModal.show(); // Mostrar el modal
        });
    });

    // Al hacer clic en el botón de confirmación en el modal
    confirmDeleteBtn.addEventListener('click', function () {
        window.location.href = deleteLink; // Redirigir a la URL de eliminación
    });
});