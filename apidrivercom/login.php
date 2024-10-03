<?php
include 'controlador/usuarioContralador.php';

// Permite los microservicios POST
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

//crea el objeto usuarioControlador
$usuarioControlador = new usuarioContralador();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        // formato application/x-www-form-urlencoded
        parse_str(file_get_contents("php://input"), $postData);

        // Verificar datos correctamente
        if (!empty($postData) && isset($postData['t1']) && isset($postData['t2'])) {
            $u = $postData['t1'];
            $c = $postData['t2'];
            
            // Llamar al método de login y devolver la respuesta
            $resultado = $usuarioControlador->obtenerLogin($u, "Nombre_Usuario", $c);
            echo $resultado;
        } else {
            // Mensaje de error si faltan campos
            echo json_encode(['error' => 'Campos vacíos o datos no proporcionados correctamente.'], JSON_UNESCAPED_UNICODE);
        }
        break;
    
    default:
        // Mensaje de error si se utiliza un método no permitido
        echo json_encode(['error' => 'Método no permitido.'], JSON_UNESCAPED_UNICODE);
        break;
}
?>