document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const toggleSidebar = document.getElementById('toggle-sidebar');
    const userMenuToggle = document.getElementById('user-menu-toggle');
    const userMenuDropdown = document.getElementById('user-menu-dropdown');

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
});

// Función para cargar datos de la persona a editar
function cargarDatosPersona(idPersona) {
    fetch('http://localhost/apidrivercom/persona.php?id=' + idPersona)
        .then(response => response.json())
        .then(data => {
            if (data && !data.error) {
                document.getElementById('id_persona').value = data.ID_Persona;
                document.getElementById('nombre').value = data.Nombre_Completo;
                document.getElementById('ndoc').value = data.Numero_Documento;
                document.getElementById('tel').value = data.Telefono;
                document.getElementById('email').value = data.Correo;
                document.getElementById('dir').value = data.Direccion;

                document.getElementById('submit-btn').innerText = "Actualizar Persona";
            } else {
                console.error('Error al obtener los datos:', data.error);
            }
        })
        .catch(error => console.error('Error al llamar a la API:', error));
}