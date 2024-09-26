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
        } elseif (isset($_GET['idequi'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['idequi'], "ID_Equipo");
        } elseif (isset($_GET['idusu'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['idusu'], "ID_Usuario");
        } elseif (isset($_GET['fpresta'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['fpresta'], "Fecha_Prestamo");
        } elseif (isset($_GET['fdevo'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['fdevo'], "Fecha_Devolucion");
        } elseif (isset($_GET['estado'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['estado'], "Estado");
        } elseif (isset($_GET['comentarios'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['ubi'], "Comentarios");
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
            isset($postData['t1']) &&
            isset($postData['t2']) &&
            isset($postData['t3']) &&
            // isset($postData['t4']) &&
            isset($postData['t5']) &&
            isset($postData['t6']) &&
            isset($postData['t7'])
        ) {
            // Asignar los valores a variables
            $idequi = $postData['t1'];
            $idper = $postData['t2'];
            $idusu = $postData['t3'];
            $fpresta = date("d-m-Y H:i:s"); // Fecha de creación actual
            $fdevo = $postData['t5'];
            $estado = $postData['t6'];
            $comentarios = $postData['t7'];

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
            isset($putData['t1']) &&
            isset($putData['t2']) &&
            isset($putData['t3']) &&
            isset($putData['t4']) &&
            isset($putData['t5']) &&
            isset($putData['t6']) &&
            isset($putData['t7']) &&
            isset($putData['t8']) &&
            isset($putData['t9'])
        ) {
            // Asignar los valores a variables
            $id = $putData['t1'];
            $nserie = $putData['t2'];
            $nombre = $putData['t3'];
            $marca = $putData['t4'];
            $categ = $putData['t5'];
            $estado = $putData['t6'];
            $ubi = $putData['t7'];
            $fingre = $putData['t8'];
            $ingresopor = $putData['t9'];

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
