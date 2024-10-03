<?php
$baseUrl = "http://localhost/apidrivercom/equipo.php";

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
        $id = htmlspecialchars($item['ID_Equipo']); // ID del alumno
        $nserie = htmlspecialchars($item['Numero_Serie']);
        $nombre = htmlspecialchars($item['Nombre_Equipo']);
        $marca = htmlspecialchars($item['Marca']);
        $categ = htmlspecialchars($item['Categoria']);
        $estado = htmlspecialchars($item['Estado']);
        $ubi = htmlspecialchars($item['Ubicacion']);
        $fingre = htmlspecialchars($item['Fecha_Ingreso']);



        echo '<tr>';
        echo '<td>' . $id . '</td>';
        echo '<td>' . $nserie . '</td>';
        echo '<td>' . $nombre . '</td>';
        echo '<td>' . $marca . '</td>';
        echo '<td>' . $categ . '</td>';
        echo '<td>' . $estado . '</td>';
        echo '<td>' . $ubi . '</td>';
        echo '<td>' . $fingre . '</td>';


        // <a href="#" class="button-container delete-btn" data-id="' . $id . '" data-type="equipo"><img src="../img/papelera.png"></a>

        echo '<td>
                <a href="agregarEquipo.php" class="button-container" data-id="' . $id . '"><img src="../img/editar.png"></a>
                <a href="eliminaEquipo.php?id=' . $id . '" class="btn btn-delete" onclick="return confirm(\'¿Estás seguro de que deseas eliminar este registro?\');"><img src="../img/papelera.png"></a>
            
              </td>';
        echo '</tr>';
    }
}
