<?php
$baseUrl = "http://localhost/apidrivercom/prestamo.php";

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
        $id = htmlspecialchars($item['ID_Prestamo']); // ID del alumno
        $idequi = htmlspecialchars($item['ID_Equipo']);
        $idusu = htmlspecialchars($item['ID_Usuario']);
        $fpresta = htmlspecialchars($item['Fecha_Prestamo']);
        $fdevo = htmlspecialchars($item['Fecha_Devolucion']);
        $estado = htmlspecialchars($item['Estado']);
        $comentarios = htmlspecialchars($item['Comentarios']);

        echo '<tr>';
        echo '<td>' . $id . '</td>';
        echo '<td>' . $idequi . '</td>';
        echo '<td>' . $idusu . '</td>';
        echo '<td>' . $fpresta . '</td>';
        echo '<td>' . $fdevo . '</td>';
        echo '<td>' . $estado . '</td>';
        echo '<td>' . $comentarios . '</td>';


        echo '<td>
                <a href="#" class="button-container" data-id="' . $id . '"><img src="../img/editar.png"></a>
                <a href="#" class="button-container delete-btn" data-id="' . $id . '" data-type="prestamo"><img src="../img/papelera.png"></a>
              </td>';
              


        echo '</tr>';
    }
}
