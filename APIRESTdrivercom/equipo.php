<?php
// Incluir el controlador de usuario
include 'controlador/equipoContralador.php';

// Permitir los métodos GET, POST, PUT, DELETE y OPTIONS
header("Access-Control-Allow-Origin: *"); // Permite solicitudes de cualquier origen
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // Especifica los métodos permitidos
// Permitir ciertos encabezados en las solicitudes
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// Instanciar el controlador de usuarios
$malumno = new equipoContralador();

// Manejar las diferentes solicitudes según el método HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Obtener información de usuario según el parámetro proporcionado
        if (isset($_GET['id'])) {
            echo $malumno->obtenerPorCampoEntero($_GET['id'], "ID_Equipo");
        } elseif (isset($_GET['nserie'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['nserie'], "Numero_Serie");
        } elseif (isset($_GET['nombre'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['nombre'], "Nombre_Equipo");
        } elseif (isset($_GET['marca'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['marca'], "Marca");
        } elseif (isset($_GET['categ'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['categ'], "Categoria");
        } elseif (isset($_GET['estado'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['estado'], "Estado");
        } elseif (isset($_GET['ubi'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['ubi'], "Ubicacion");
        } elseif (isset($_GET['fingre'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['fingre'], "Fecha_Ingreso");
        } elseif (isset($_GET['ingresopor'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['ingresopor'], "Ingresado_Por");
        }  elseif (isset($_GET['page'])) {
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
            isset($postData['t4']) &&
            isset($postData['t6']) &&
            isset($postData['t8']) 
        ) {
            // Asignar los valores a variables
            $nserie = $postData['t1'];
            $nombre = $postData['t2'];
            $marca = $postData['t3'];
            $categ = $postData['t4'];
            $estado = "Disponible";
            $ubi = $postData['t6'];
            $fingre = date("d-m-Y H:i:s"); // Fecha de creación actual
            $ingresopor = $postData['t8'];
        

            // Llamar a la función para agregar el usuario
            echo $malumno->agregarEquipo($nserie, $nombre, $marca, $categ, $estado, $ubi, $fingre, $ingrsopor);
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
            echo $malumno->actualizarEquipo($id, $nserie, $nombre, $marca, $categ, $estado, $ubi, $fingre, $ingresopor);
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
            echo $malumno->eliminarEquipo($id);
        } else {
            // Respuesta en caso de datos incompletos
            echo json_encode(['error' => 'Datos de Eliminación incompletos.'], JSON_UNESCAPED_UNICODE);
        }
        break;

    default:
        // Respuesta en caso de método no permitido
        echo json_encode(['error' => 'Método no permitido.'], JSON_UNESCAPED_UNICODE);
}
