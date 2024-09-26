<?php
session_start();

// La URL de tu API
$url = "http://localhost/apidrivercom/usuario.php";

// Verifica que los datos estén presentes
if (
    isset($_POST['id']) &&
    isset($_POST['nombre']) &&
    isset($_POST['email']) &&
    isset($_POST['pass']) &&
    isset($_POST['fmodi']) &&
    isset($_POST['estadi'])
) {
    $t1 = $_POST['id']; // ID del usuario que vamos a editar
    $t2 = $_POST['nombre'];
    $t2 = $_POST['email'];
    $t3 = $_POST['pass'];
    $t8 = $_POST['fmodi'];
    $t9 = $_POST['estadi'];

    // Los datos a enviar en la solicitud PUT
    $data = http_build_query(array(
        'id' => $t1, // ID del usuario a modificar
        'nombre' => $t2,
        'email' => $t3,
        'pass' => $t8,
        'fmodi' => $t8,
        'estadi' => $t9
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
        header('Location: indexUsuario.php');
        exit;
    } else {
        // Mostrar un error si la API no tuvo éxito
        echo 'Error al actualizar usuario: ' . $result['message'];
    }
}
