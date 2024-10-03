<?php
// Incluir el controlador de usuario
include 'controlador/prestamoContralador.php';

// Permitir los métodos GET, POST, PUT, DELETE y OPTIONS
header("Access-Control-Allow-Origin: *"); // Permite solicitudes de cualquier origen
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // Especifica los métodos permitidos
// Permitir ciertos encabezados en las solicitudes
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// Instanciar el controlador de usuarios
$malumno = new prestamoContralador();

// Manejar las diferentes solicitudes según el método HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Obtener información de usuario según el parámetro proporcionado
        if (isset($_GET['id'])) {
            echo $malumno->obtenerPorCampoEntero($_GET['id'], "ID_Prestamo");
        } elseif (isset($_GET['idequipo'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['idequipo'], "ID_Equipo");
        } elseif (isset($_GET['idPersona'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['idPersona'], "ID_Persona");
        } elseif (isset($_GET['idUsuario'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['idUsuario'], "ID_Usuario");
        } elseif (isset($_GET['fdevo'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['fdevo'], "Fecha_Prestamo");
        } elseif (isset($_GET['fDevo'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['fDevo'], "Fecha_Devolucion");
        } elseif (isset($_GET['estado'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['estado'], "Estado");
        } elseif (isset($_GET['comentario'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['comentario'], "Comentarios");
        } elseif (isset($_GET['page'])) {
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
            isset($postData['idequipo']) &&
            isset($postData['idpersona']) &&
            isset($postData['idusuario']) &&
            // isset($postData['t4']) &&
            isset($postData['fdevo']) &&
            isset($postData['comentario'])
        ) {
            // Asignar los valores a variables
            $idequi = $postData['idequipo'];
            $idper = $postData['idpersona'];
            $idusu = $postData['idusuario'];
            $fpresta = date("d-m-Y H:i:s"); // Fecha de creación actual
            $fdevo = $postData['fdevo'];
            $estado = 'Activo'; // Estado inicial
            $comentarios = $postData['comentario'];

            // Llamar a la función para agregar el usuario
            echo $malumno->agregarPrestamo($idequi, $idper, $idusu, $fpresta, $fdevo, $estado, $comentarios);
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
            isset($putData['edit-idequi']) &&
            isset($putData['edit-idper']) &&
            isset($putData['edit-idusu']) &&
            // isset($putData['fpresta']) &&
            isset($putData['edit-fdevo']) &&
            isset($putData['edit-estado']) &&
            isset($putData['edit-comentarios'])
        ) {
            // Asignar los valores a variables
            $id = $putData['edit-id'];
            $idequi = $putData['edit-idequi'];
            $idper = $putData['edit-idper'];
            $idusu = $putData['edit-idusu'];
            $fpresta = date("d-m-Y H:i:s"); // Fecha de creación actual
            $fdevo = $putData['edit-fdevo'];
            $estado = $putData['edit-estado'];
            $comentarios = $putData['edit-comentarios'];

            // Llamar a la función para actualizar el usuario
            echo $malumno->actualizarPrestamo($id, $idequi, $idper, $idusu, $fpresta, $fdevo, $estado, $comentarios);
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
            echo $malumno->eliminarPrestamo($id);
        } else {
            // Respuesta en caso de datos incompletos
            echo json_encode(['error' => 'Datos de Eliminación incompletos.'], JSON_UNESCAPED_UNICODE);
        }
        break;

    default:
        // Respuesta en caso de método no permitido
        echo json_encode(['error' => 'Método no permitido.'], JSON_UNESCAPED_UNICODE);
}
