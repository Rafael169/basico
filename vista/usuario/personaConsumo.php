<?php
$baseUrl = "http://localhost/apidrivercom/persona.php";

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
        $id = htmlspecialchars($item['ID_Persona']); // ID del alumno
        $nom = htmlspecialchars($item['Nombre_Completo']);
        $nombre = htmlspecialchars($item['Numero_Documento']);
        $tele = htmlspecialchars($item['Telefono']);
        $email = htmlspecialchars($item['Correo']);
        $dir = htmlspecialchars($item['Direccion']);


        echo '<tr>';
        echo '<td>' . $id . '</td>';
        echo '<td>' . $nom . '</td>';
        echo '<td>' . $nombre . '</td>';
        echo '<td>' . $tele . '</td>';
        echo '<td>' . $email . '</td>';
        echo '<td>' . $dir . '</td>';

        echo '<td>
                <a href="agregarPersona.php" class="button-container" data-id="' . $id . '"><img src="../img/editar.png"></a>
                  <a href="eliminaPersona.php?id=' . $id . '" class="btn btn-delete" onclick="return confirm(\'¿Estás seguro de que deseas eliminar este registro?\');"><img src="../img/papelera.png"></a>
              </td>';

        echo '</tr>';
    }



}


