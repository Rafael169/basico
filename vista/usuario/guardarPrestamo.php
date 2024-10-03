<?php
session_start();

// La URL de tu API  
$url = "http://localhost/apidrivercom/prestamo.php"; // Reemplaza con la URL de tu API

// Verifica que los datos estén presentes
if (
    isset($_POST['idpersona']) &&
    isset($_POST['idequipo']) &&
    isset($_POST['idusuario']) &&
    isset($_POST['fdevo']) &&
    isset($_POST['comentario']) 
) {
    $t1 = $_POST['idpersona'];
    $t2 = $_POST['idequipo'];
    $t3 = $_POST['idusuario'];
    $t4 = $_POST['fdevo'];
    $t5 = $_POST['comentario'];

    // Los datos a enviar en la solicitud POST
    $data = http_build_query(array(
        'idpersona' => $t1,
        'idequipo' => $t2,
        'idusuario' => $t3,
        'fdevo' => $t4,
        'comentario' => $t5,
        
    ));

    // Inicializa  cURL
    $ch = curl_init($url);

    // Configura las opciones de cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorna la transferencia como una cadena de texto
    curl_setopt($ch, CURLOPT_POST, true); // Indica que es una solicitud POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // Los datos a enviar en el cuerpo de la solicitud

    // Ejecuta la solicitud cURL y obtiene la respuesta
    $response = curl_exec($ch);

    // Verifica si hubo errores en cURL
    if (curl_errno($ch)) {
        $_SESSION['mensaje'] = 'Error al guardar el usuario: ' . curl_error($ch);
        header("Location: ../indexPrestamos.php?error=error");
        exit();
    }

    // Cierra la sesión cURL
    curl_close($ch);

    // Decodifica la respuesta JSON
    //$responseData = json_decode($response, true);
    $responseData = json_decode($response, true);
    $_SESSION['dato'] = $responseData['data']['codigo'];

    if ($_SESSION['dato'] === 'Exito') {
        header("Location: ../indexPrestamos.php?g=1");
    }
    // Verifica si la respuesta indica éxito
    if ($responseData['data']['codigo'] === 'Exito') {
        $_SESSION['mensaje'] = $responseData['data']['mensaje'];
        $_SESSION['usuario'] = $_SESSION['usuario'];
        header("Location: ../indexPrestamos.php?g=2");
    } else {
        $_SESSION['mensaje'] = 'Error al guardar el usuario: ' . (isset($responseData['error']) ? $responseData['error'] : 'Error desconocido');
        header("Location: ../indexPrestamos.php");
    }
}
