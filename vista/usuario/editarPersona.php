<?php
session_start();

// La URL de tu API
$url = "http://localhost/apidrivercom/persona.php";

// Verifica que los datos estén presentes
if (
    isset($_POST['edit-id']) &&
    isset($_POST['edit-nombre']) &&
    isset($_POST['edit-ndoc']) &&
    isset($_POST['edit-tel']) &&
    isset($_POST['edit-email']) &&
    isset($_POST['edit-dir'])
) {
    $t1 = $_POST['edit-id']; // ID del usuario que vamos a editar
    $t2 = $_POST['edit-nombre'];
    $t3 = $_POST['edit-ndoc'];
    $t4 = $_POST['edit-tel'];
    $t8 = $_POST['edit-email'];
    $t9 = $_POST['edit-dir'];
    // Los datos a enviar en la solicitud PUT
    $data = http_build_query(array(
        'edit-id' => $t1, // ID del usuario a modificar
        'edit-nombre' => $t2,
        'edit-ndoc' => $t3,
        'edit-tel' => $t4,
        'edit-email' => $t8,
        'edit-dir' => $t9
    ));


    // Inicializa cURL
    $ch = curl_init($url);

    // Configura las opciones de cURL para PUT
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // Ejecuta la solicitud cURL y obtiene la respuesta
    $response = curl_exec($ch);

    // Verifica si hubo errores en cURL
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    curl_close($ch);

    // Procesa la respuesta de la API
    $result = json_decode($response, true);

    if ($result['success']) {
        // Redireccionar a la página de lista de usuarios
        header('Location: ../indexPersona.php');
        exit;
    } else {
        // Mostrar un error si la API no tuvo éxito
        echo 'Error al actualizar usuario: ' . $result['message'];
        header('Location: ../indexPersona.php');
        exit;
    }
}
