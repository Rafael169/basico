<?php
session_start();

// La URL de tu API
$url = "http://localhost/basico/apidrivercom/usuario.php";

// Verifica que los datos estén presentes
if (
    isset($_POST['edit-id']) &&
    isset($_POST['edit-nombre']) &&
    isset($_POST['edit-email']) &&
    isset($_POST['edit-pass']) &&
    // isset($_POST['edit-fmodi']) &&
    isset($_POST['edit-estado'])
) {
    $t1 = $_POST['edit-id']; // ID del usuario que vamos a editar
    $t2 = $_POST['edit-nombre'];
    $t3 = $_POST['edit-email'];
    $t4 = $_POST['edit-pass'];
    // $t8 = $_POST['edit-fmodi'];
    $t9 = $_POST['edit-estado'];

    // Los datos a enviar en la solicitud PUT
    $data = http_build_query(array(
        'edit-id' => $t1, // ID del usuario a modificar
        'edit-nombre' => $t2,
        'edit-email' => $t3,
        'edit-pass' => $t4,
        // 'edit-fmodi' => $t8,
        'edit-estado' => $t9
    ));
   echo("hghghghgh   " . $data);

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
        header('Location: ../indexUsuario.php');
        exit;
    } else {
        // Mostrar un error si la API no tuvo éxito
        echo 'Error al actualizar usuario: ' . $result['message'];
        header('Location: ../indexUsuario.php');
        exit;
    }
}
