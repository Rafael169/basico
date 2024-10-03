<?php
session_start();

// La URL de tu API  
$url = "http://localhost/basico/apidrivercom/equipo.php"; // Reemplaza con la URL de tu API

// Verifica que los datos estén presentes
if (
    isset($_POST['t1']) &&
    isset($_POST['t2']) &&
    isset($_POST['t3']) &&
    isset($_POST['t4']) &&
    isset($_POST['t6']) &&
    isset($_POST['t8'])
) {
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];
    $t3 = $_POST['t3'];
    $t5 = $_POST['t4'];
    $t6 = $_POST['t6'];
    $t6 = $_POST['t8'];


    // Los datos a enviar en la solicitud POST
    $data = http_build_query(array(
        't1' => $t1,
        't2' => $t2,
        't3' => $t3,
        't4' => $t4,
        't6' => $t6,
        't8' => $t8,

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
        header("Location: ../indexEquipo.php?error=error");
        exit();
    }

    // Cierra la sesión cURL
    curl_close($ch);

    // Decodifica la respuesta JSON
    //$responseData = json_decode($response, true);
    $responseData = json_decode($response, true);
    $_SESSION['dato'] = $responseData['data']['codigo'];

    if ($_SESSION['dato'] === 'Exito') {
        header("Location: ../indexEquipo.php?g=1");
    }
    // Verifica si la respuesta indica éxito
    if ($responseData['data']['codigo'] === 'Exito') {
        $_SESSION['mensaje'] = $responseData['data']['mensaje'];
        $_SESSION['usuario'] = $_SESSION['usuario'];
        header("Location: ../indexEquipo.php?g=2");
    } else {
        $_SESSION['mensaje'] = 'Error al guardar el usuario: ' . (isset($responseData['error']) ? $responseData['error'] : 'Error desconocido');
        header("Location: ../indexEquipo.php");
    }
}
