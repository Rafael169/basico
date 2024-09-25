<?php
session_start();

// La URL de tu API  
$url = "http://localhost/apidrivercom/persona.php"; // Reemplaza con la URL de tu API

// Verifica que los datos estén presentes
if (
    isset($_POST['nombre']) &&
    isset($_POST['ndoc']) &&
    isset($_POST['tel']) &&
    isset($_POST['email']) &&
    isset($_POST['dir']) 
) {
    $t1 = $_POST['nombre'];
    $t2 = $_POST['ndoc'];
    $t3 = $_POST['tel'];
    $t5 = $_POST['email'];
    $t6 = $_POST['dir'];

    // Los datos a enviar en la solicitud PUT
    $data = http_build_query(array(
        'nombre' => $t1,
        'ndoc' => $t2,
        'tel' => $t3,
        'email' => $t5,
        'dir' => $t6,
    ));

    // Inicializa cURL
    $ch = curl_init($url);

    // Configura las opciones de cURL para PUT
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorna la respuesta como texto
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); // Cambia el método a PUT
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // Los datos a enviar en el cuerpo de la solicitud

    // Ejecuta la solicitud cURL y obtiene la respuesta
    $response = curl_exec($ch);

    // Verifica si hubo errores en cURL
    if (curl_errno($ch)) {
        $_SESSION['mensaje'] = 'Error al actualizar el usuario: ' . curl_error($ch);
        header("Location: ../indexPersona.php?error=error");
        exit();
    }

    // Cierra la sesión cURL
    curl_close($ch);
}
?>
