<?php
// Incluir el controlador de usuario
include 'controlador/usuarioContralador.php';

// Permitir los métodos GET, POST, PUT, DELETE y OPTIONS
header("Access-Control-Allow-Origin: *"); // Permite solicitudes de cualquier origen
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // Especifica los métodos permitidos
// Permitir ciertos encabezados en las solicitudes
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// Instanciar el controlador de usuarios
$malumno = new usuarioContralador();

// Manejar las diferentes solicitudes según el método HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Obtener información de usuario según el parámetro proporcionado
        if (isset($_GET['id'])) {
            echo $malumno->obtenerPorCampoEntero($_GET['id'], "ID_Usuario");
        } elseif (isset($_GET['usu'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['usu'], "Nombre_Usuario");
        } elseif (isset($_GET['pass'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['pass'], "Contrasena");
        } elseif (isset($_GET['fcreacion'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['fcreacion'], "Fecha_Creacion");
        } elseif (isset($_GET['creadopor'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['creadopor'], "Creado_Por");
        } elseif (isset($_GET['estado'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['estado'], "Estado");
        } elseif (isset($_GET['idrol'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['idrol'], "ID_Rol");
        } elseif (isset($_GET['fmodi'])) {
            echo $malumno->obtenerPorCampoCadena($_GET['fmodi'], "Fecha_Modificacion");
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
            isset($postData['t5']) &&
            isset($postData['t6'])
        ) {
            // Asignar los valores a variables
            $nombre = $postData['t1'];
            $email = $postData['t2'];
            $pass = $postData['t3'];
            $fcreacion = date("d-m-Y H:i:s"); // Fecha de creación actual
            $creadopor = $postData['t5'];
            $rol_id = $postData['t6'];
            $fmodi = date("d-m-Y H:i:s"); // Fecha de modificación actual
            $estado = 'Activo'; // Estado inicial
            // Llamar a la función para agregar el usuario
            echo $malumno->agregarUsuario($nombre, $email, $pass, $fcreacion, $creadopor, $rol_id, $fmodi);
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
            isset($putData['t8']) &&
            isset($putData['t9'])
        ) {
            // Asignar los valores a variables
            $id_usuario = $putData['t1'];
            $nombre = $putData['t2'];
            $email = $putData['t3'];
            $pass = $putData['t4'];
            $fmodi = $putData['t8'];
            $estado = $putData['t9'];
            // Llamar a la función para actualizar el usuario
            echo $malumno->actualizarUsuario($id_usuario, $nombre, $email, $pass, $fmodi, $estado);
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
            echo $malumno->eliminarUsuario($id);
        } else {
            // Respuesta en caso de datos incompletos
            echo json_encode(['error' => 'Datos de Eliminación incompletos.'], JSON_UNESCAPED_UNICODE);
        }
        break;

    default:
        // Respuesta en caso de método no permitido
        echo json_encode(['error' => 'Método no permitido.'], JSON_UNESCAPED_UNICODE);
}
