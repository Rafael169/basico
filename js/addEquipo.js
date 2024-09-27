document.addEventListener('DOMContentLoaded', function() {
    const userMenuToggle = document.getElementById('user-menu-toggle');
    const userMenuDropdown = document.getElementById('user-menu-dropdown');

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