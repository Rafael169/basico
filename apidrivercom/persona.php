<?php
// Incluir el controlador de usuario
include 'controlador/personaContralador.php';

// Permitir los métodos GET, POST, PUT, DELETE y OPTIONS
header("Access-Control-Allow-Origin: *"); // Permite solicitudes de cualquier origen
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // Especifica los métodos permitidos
// Permitir ciertos encabezados en las solicitudes
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// Instanciar el controlador de usuarios
$malumno = new personaContralador();

// Manejar las diferentes solicitudes según el método HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Obtener información de usuario según el parámetro proporcionado
        if (isset($_GET['id'])) {
            echo $malumno->obtenerPorCampoEntero($_GET['id'], "ID_Persona");
        } elseif (isset($_GET['nombre'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['nombre'], "Nombre_Completo");
        } elseif (isset($_GET['ndoc'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['ndoc'], "Numero_Documento");
        } elseif (isset($_GET['tel'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['tel'], "Telefono");
        } elseif (isset($_GET['email'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['email'], "Correo");
        } elseif (isset($_GET['dir'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['dir'], "Direccion");
        } 
         elseif (isset($_GET['page'])) {
            echo $malumno->obtenerTodos($_GET['page']);
        } else {
            // Respuesta en caso de parámetros incorrectos
            echo json_encode(['error' => 'Parámetros Incorrectos.'], JSON_UNESCAPED_UNICODE);
        }
        break;

    case 'POST':
        // Leer datos del cuerpo de la solicitud
        parse_str(file_get_contents("php://input"), $postData);
        // Validar que todos los campos necesarios estén presentes
        if (
            isset($postData['nombre']) &&
            isset($postData['ndoc']) &&
            isset($postData['tel']) &&
            isset($postData['email']) &&
            isset($postData['dir']) 
        ) {
            // Asignar los valores a variables
            $nom = $postData['nombre'];
            $ndoc = $postData['ndoc'];
            $tele = $postData['tel'];
            $email = $postData['email'];
            $dir = $postData['dir'];
            // Llamar a la función para agregar el usuario
            echo $malumno->agregarPersona($nom, $ndoc, $tele, $email, $dir);
        } else {
            // Respuesta en caso de datos incompletos
            echo json_encode(['error' => 'Datos de Guardar incompletos.'], JSON_UNESCAPED_UNICODE);
        }
        break;



    case 'PUT':
        // Leer datos del cuerpo de la solicitud
        parse_str(file_get_contents("php://input"), $putData);
        // Validar que todos los campos necesarios estén presentes
        if (
            isset($putData['edit-id']) &&
            isset($putData['edit-nombre']) &&
            isset($putData['edit-ndoc']) &&
            isset($putData['edit-tel']) &&
            isset($putData['edit-email']) &&
            isset($putData['edit-dir'])
        ) {
            // Asignar los valores a variables
            $id = $putData['edit-id'];
            $nom = $putData['edit-nombre'];
            $ndoc = $putData['edit-ndoc'];
            $tele = $putData['edit-tel'];
            $email = $putData['edit-email'];
            $dir = $putData['edit-dir'];
      
            // Llamar a la función para actualizar el usuario
            echo $malumno->actualizarPersona($id, $nom, $ndoc, $tele, $email, $dir);
        } else {
            // Respuesta en caso de datos incompletos
            echo json_encode(['error' => 'Datos de Actualización incompletos.'], JSON_UNESCAPED_UNICODE);
        }
        break;

    case 'DELETE':
        // Leer datos del cuerpo de la solicitud
        parse_str(file_get_contents("php://input"), $deleteData);
        // Verificar que el ID esté presente para eliminar
        if (isset($deleteData['id'])) {
            $id = $deleteData['id'];
            // Llamar a la función para eliminar el usuario
            echo $malumno->eliminarPersona($id);
        } else {
            // Respuesta en caso de datos incompletos
            echo json_encode(['error' => 'Datos de Eliminación incompletos.'], JSON_UNESCAPED_UNICODE);
        }
        break;

    default:
        // Respuesta en caso de método no permitido
        echo json_encode(['error' => 'Método no permitido.'], JSON_UNESCAPED_UNICODE);
}
