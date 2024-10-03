<?php
session_start();

// La URL de tu API
$url = "http://localhost/apidrivercom/equipo.php";

// Verifica que los datos estén presentes
if (
    isset($_POST['edit-id']) &&
    isset($_POST['edit-nserie']) &&
    isset($_POST['edit-nombre']) &&
    isset($_POST['edit-marca']) &&
    isset($_POST['edit-categ']) &&
    isset($_POST['edit-estado']) &&
    isset($_POST['edit-ubi'])
) {
    $t1 = $_POST['edit-id']; // ID del usuario que vamos a editar
    $t2 = $_POST['edit-nserie'];
    $t3 = $_POST['edit-nombre'];
    $t4 = $_POST['edit-marca'];
    $t5 = $_POST['edit-categ'];
    $t6 = $_POST['edit-estado'];
    $t7 = $_POST['edit-ubi'];
    // Los datos a enviar en la solicitud PUT
    $data = http_build_query(array(
        'edit-id' => $t1, // ID del usuario a modificar
        'edit-nserie' => $t2,
        'edit-nombre' => $t3,
        'edit-marca' => $t4,
        'edit-categ' => $t5,
        'edit-estado' => $t6,
        'edit-ubi' => $t7
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
        header('Location: ../indexEquipo.php');
        exit;
    } else {
        // Mostrar un error si la API no tuvo éxito
        echo 'Error al actualizar usuario: ' . $result['message'];
        header('Location: ../indexEquipo.php');
        exit;
    }
}
