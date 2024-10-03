
<?php
$baseUrl = "http://localhost/basico/apidrivercom/prestamo.php";

// Función para consumir la API
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

// Validar si hay un error en la respuesta de la API
if (isset($data['error'])) {
    echo '<tr><td colspan="7">' . htmlspecialchars($data['error']) . '</td></tr>';
} else {
    // Validar que 'data' exista y tenga resultados
    if (isset($data['data']) && is_array($data['data'])) {
        foreach ($data['data'] as $item) {
            // Validar si las claves existen antes de usarlas
            $id = isset($item['ID_Prestamo']) ? htmlspecialchars($item['ID_Prestamo']) : 'N/A';
            $idequi = isset($item['ID_Equipo']) ? htmlspecialchars($item['ID_Equipo']) : 'N/A';
            $idusu = isset($item['ID_Usuario']) ? htmlspecialchars($item['ID_Usuario']) : 'N/A';
            $fpresta = isset($item['Fecha_Prestamo']) ? htmlspecialchars($item['Fecha_Prestamo']) : 'N/A';
            $fdevo = isset($item['Fecha_Devolucion']) ? htmlspecialchars($item['Fecha_Devolucion']) : 'N/A';
            $estado = isset($item['Estado']) ? htmlspecialchars($item['Estado']) : 'N/A';
            $comentarios = isset($item['Comentarios']) ? htmlspecialchars($item['Comentarios']) : 'N/A';

            // Imprimir los datos en la tabla
            echo '<tr>';
            echo '<td>' . $id . '</td>';
            echo '<td>' . $idequi . '</td>';
            echo '<td>' . $idusu . '</td>';
            echo '<td>' . $fpresta . '</td>';
            echo '<td>' . $fdevo . '</td>';
            echo '<td>' . $estado . '</td>';
            echo '<td>' . $comentarios . '</td>';

            // Acciones: editar y eliminar
            echo '<td>
                <a href="#" class="button-container" data-id="' . $id . '"><img src="../img/editar.png"></a>
                <a href="eliminaPrestamo.php?id=' . $id . '" class="btn btn-delete" onclick="return confirm(\'¿Estás seguro de que deseas eliminar este registro?\');"><img src="../img/papelera.png"></a>
              </td>';

            echo '</tr>';
        }
    }
}

?>