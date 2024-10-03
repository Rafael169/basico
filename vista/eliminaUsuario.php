<?php

$url = "http://localhost/basico/apidrivercom/usuario.php";


$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
    die('Error: Campo Id vacio.');
}


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/x-www-form-urlencoded'
));


curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('id' => $id)));


$response = curl_exec($ch);


if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
   
    $decodedResponse = json_decode($response, true);
    if (isset($decodedResponse['error'])) {
        echo 'Error: ' . $decodedResponse['error'];
    } else {
        header('Location: ../vista/indexUsuario.php'); 
    }
}


curl_close($ch);
