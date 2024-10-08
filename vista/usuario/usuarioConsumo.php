<?php
$baseUrl = "http://localhost/basico/apidrivercom/usuario.php";

function consumoApi($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    return json_decode($response, true);
}

$page = 1;
$apiUrl = $baseUrl . "?page=" . $page;  // URL de la API
$data = consumoApi($apiUrl);

if (isset($data['error'])) {
    echo '<tr><td colspan="7">' . htmlspecialchars($data['error']) . '</td></tr>';
} else {
    foreach ($data['data'] as $item) {
        $id = htmlspecialchars($item['ID_Usuario']); // ID del alumno
        $nombre = htmlspecialchars($item['Nombre_Usuario']);
        $email = htmlspecialchars($item['Correo_Electronico']);
        $estado = htmlspecialchars($item['Estado']);
        $fcrea = htmlspecialchars($item['Fecha_Creacion']);
        $fmodi = htmlspecialchars($item['Fecha_Modificacion']);
        $rol = htmlspecialchars($item['ID_Rol']);

        echo '<tr>';
        echo '<td>' . $id . '</td>';
        echo '<td>' . $nombre . '</td>';
        echo '<td>' . $email . '</td>';
        echo '<td>' . $estado . '</td>';
        echo '<td>' . $fcrea . '</td>';
        // echo '<td>' . $fmodi . '</td>';
        echo '<td>' . $rol . '</td>';



        echo '<td>
                <a href="#" class="button-container edit-btn" data-id="' . $id . '" data-nombre="' . $nombre . '" data-email="' . $email . '" data-estado="' . $estado . '"><img src="../img/editar.png"></a>
                <a href="eliminaUsuario.php?id=' . $id . '" class="btn btn-delete" onclick="return confirm(\'¿Deseas eliminar este registro?\');"><img src="../img/papelera.png"></a>
                </td>';
        echo '</tr>';
    }
}
