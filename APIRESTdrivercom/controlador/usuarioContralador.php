<?php
// Incluir el modelo de usuario
include 'modelo/usuarioModelo.php';

class usuarioContralador {
    private $usucontrol; // Instancia del modelo de usuario
    private $tabla = "usuarios"; // Nombre de la tabla de usuarios

    function __construct() {
        // Realiza la conexión a la base de datos
        $this->usucontrol = new usuarioModelo($this->tabla);
    }

    // Método para consultar un usuario por un campo entero
    function obtenerPorCampoEntero($getExterno, $campo) {
        $ma = $this->usucontrol->obtenerEntero($getExterno, $campo); // Llama al método del modelo
        return $this->mostrarResultado($ma); // Devuelve el resultado formateado
    }

    // Método para consultar un usuario por un campo de texto
    function obtenerPorCampoCadena($getExterno, $campo) {
        $ma = $this->usucontrol->obtenerCadena($getExterno, $campo); // Llama al método del modelo
        return $this->mostrarResultado($ma); // Devuelve el resultado formateado
    }

    // Método para obtener todos los usuarios
    function obtenerTodos($getExterno) {
        $uControl = $this->usucontrol->obtenerTodas($getExterno); // Llama al método del modelo
        return $this->mostrarResultado($uControl); // Devuelve el resultado formateado
    }

    // Método para agregar un nuevo usuario
    function agregarUsuario($nombre, $email, $pass, $fcreacion, $creadopor, $rol_id, $fmodi) {
        $uControl = $this->usucontrol->agregarUsuario($nombre, $email, $pass, $fcreacion, $creadopor, $rol_id, $fmodi); // Llama al método del modelo
        return $this->mostrarResultado($uControl); // Devuelve el resultado formateado
    }

    // Método para actualizar un usuario existente
    function actualizarUsuario($id_usuario, $nombre, $email, $pass, $fmodi, $estado) {
        $uControl = $this->usucontrol->actualizarUsuario($id_usuario, $nombre, $email, $pass, $fmodi, $estado); // Llama al método del modelo
        return $this->mostrarResultado($uControl); // Devuelve el resultado formateado
    }

    // Método para verificar el login de un usuario
    function obtenerLogin($us, $cu, $contra) {
        $uControl = $this->usucontrol->verUsuario($us, $cu, $contra); // Llama al método del modelo
        // Manejo de resultados de la verificación
        if (is_array($uControl)) {
            return json_encode($uControl, JSON_UNESCAPED_UNICODE); // Devuelve datos del usuario en JSON
        } else {
            return json_encode(['Error' => 'contraseña y usuario incorrecto'], JSON_UNESCAPED_UNICODE); // Mensaje de error
        }
    }

    // Método para eliminar un usuario
    function eliminarUsuario($id_usuario) {
        $uControl = $this->usucontrol->eliminarUsuario($id_usuario); // Llama al método del modelo
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
