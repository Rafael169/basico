document.addEventListener('DOMContentLoaded', function() {
    // Cargar datos de la API para los selectores
    cargarDatos('api/equipos', 'id-equipo');
    cargarDatos('api/personas', 'id-persona');
    cargarDatos('api/usuarios', 'id-usuario');

    function cargarDatos(url, elementoId) {
      fetch(url)
        .then(response => response.json())
        .then(data => {
          const select = document.getElementById(elementoId);
          data.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id; // Aquí debes ajustar el valor de ID según la respuesta de tu API
            option.textContent = item.nombre; // Aquí ajustas el texto que mostrará la opción
            select.appendChild(option);
          });
        })
        .catch(error => console.error('Error al cargar los datos:', error));
    }

    // Manejo del menú y sidebar (Opcional, reutilizado de tu código anterior)
    const sidebar = document.getElementById('sidebar');
    const toggleSidebar = document.getElementById('toggle-sidebar');
    const userMenuToggle = document.getElementById('user-menu-toggle');
    const userMenuDropdown = document.getElementById('user-menu-dropdown');

    toggleSidebar.addEventListener('click', function() {
      sidebar.classList.toggle('collapsed');
      document.body.classList.toggle('sidebar-collapsed');
    });

    userMenuToggle.addEventListener('click', function(event) {
      event.stopPropagation();
      const expanded = this.getAttribute('aria-expanded') === 'true' || false;
      this.setAttribute('aria-expanded', !expanded);
      userMenuDropdown.hidden = expanded;
    });

    document.addEventListener('click', function(event) {
      if (!userMenuToggle.contains(event.target) && !userMenuDropdown.contains(event.target)) {
        userMenuToggle.setAttribute('aria-expanded', 'false');
        userMenuDropdown.hidden = true;
      }
    });

    document.addEventListener('keydown', function(event) {
      if (event.key === 'Escape') {
        userMenuToggle.setAttribute('aria-expanded', 'false');
        userMenuDropdown.hidden = true;
      }
    });
  });