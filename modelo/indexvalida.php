<?php
session_start(); 

$t1 = $_POST['t1'];
$t2 = $_POST['t2'];
$baseUrl = "http://localhost/DriverCom/login.php";

function consumoApi($url, $data) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HEADER, false);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        return 'Error:' . curl_error($ch);
    }

    curl_close($ch);
    return json_decode($response, true);
}

$postData = http_build_query(array('t1' => $t1, 't2' => $t2));
$data = consumoApi($baseUrl, $postData);

if (isset($data['error'])) {
    $_SESSION['mensaje'] = 'Usuario o contraseña incorrectos';
    header("Location: ../index.php?error=error"); 
    exit();
} else {
    $_SESSION['datos'] = $data;
    header("Location: ../vista/indexmenu.php");
    exit();
}
?>