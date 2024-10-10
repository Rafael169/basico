    // Obtener los elementos del DOM
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("openModal");
    var span = document.getElementsByClassName("close")[0];

    // Cuando el usuario haga clic en el botón, abre el modal
    btn.onclick = function() {
        modal.style.display = "flex"; // Cambia a flex para mostrar el modal
    }

    // Cuando el usuario haga clic en el botón de cierre, cierra el modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Cuando el usuario haga clic fuera del contenido del modal, cierra el modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }