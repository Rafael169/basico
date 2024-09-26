<?php
// Incluir el modelo de usuario
include 'modelo/personaModelo.php';

class personaContralador {
    private $usucontrol; // Instancia del modelo de usuario
    private $tabla = "personas"; // Nombre de la tabla de usuarios

    function __construct() {
        // Realiza la conexión a la base de datos
        $this->usucontrol = new personaModelo($this->tabla);
    }
    
    // Método para consultar un usuario por un campo entero
    function obtenerPorCampoEntero($getExterno, $campo) {
        $uControl = $this->usucontrol->obtenerEntero($getExterno, $campo); // Llama al método del modelo
        return $this->mostrarResultado($uControl); // Devuelve el resultado formateado
    }

    // Método para consultar un usuario por un campo de texto
    function obtenerPorCampoCadena($getExterno, $campo) {
        $uControl = $this->usucontrol->obtenerCadena($getExterno, $campo); // Llama al método del modelo
        return $this->mostrarResultado($uControl); // Devuelve el resultado formateado
    }

    // Método para obtener todos los usuarios
    function obtenerTodos($getExterno) {
        $uControl = $this->usucontrol->obtenerTodas($getExterno); // Llama al método del modelo
        return $this->mostrarResultado($uControl); // Devuelve el resultado formateado
    }

    // Método para agregar un nuevo usuario
    function agregarPersona($nom, $ndoc, $tele, $email, $dir) {
        $uControl = $this->usucontrol->agregarPersona($nom, $ndoc, $tele, $email, $dir); // Llama al método del modelo
        return $this->mostrarResultado($uControl); // Devuelve el resultado formateado
    }

    // Método para actualizar un usuario existente
    function actualizarPersona($id, $nom, $ndoc, $tele, $email, $dir) {
        $uControl = $this->usucontrol->actualizarPersona($id, $nom, $ndoc, $tele, $email, $dir); // Llama al método del modelo
        return $this->mostrarResultado($uControl); // Devuelve el resultado formateado
    }



    // Método para eliminar un usuario
    function eliminarPersona($id) {
        $uControl = $this->usucontrol->eliminarPersona($id); // Llama al método del modelo
        return $this->mostrarResultado($uControl); // Devuelve el resultado formateado
    }

    // Método privado para mostrar resultados en formato JSON
    private function mostrarResultado($resu) {
        // Si el resultado es un array, se convierte a JSON
        if (is_array($resu) ) {
            return json_encode(['data' => $resu], JSON_UNESCAPED_UNICODE);
        } else {
            // Si el resultado es un mensaje de error, se envía tal cual
            return json_encode(['error' => $resu], JSON_UNESCAPED_UNICODE);
        }
    }
}
?>
