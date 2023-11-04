<?php
include("config/listado_verbos.php"); // Asegúrate de incluir la misma lista de verbos

if (isset($_POST['miVariable'])) {
    $miVariable = json_decode($_POST['miVariable'], true);
    if (isset($miVariable) && is_array($miVariable)) {
        echo '<h2>Solucion - Verbos Seleccionados</h2>';
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>Español</th>';
        echo '<th>Presente</th>';
        echo '<th>Pasado Simple</th>';
        echo '<th>Participio</th>';
        echo '</tr>';
    
        foreach ($miVariable as $verbo) {
            echo '<tr>';
            foreach ($verbo as $valor) {
                echo '<td>' . $valor . '</td>';
            }
            echo '</tr>';
        }
    
        echo '</table>';
    }
    
} else {
    echo "El campo 'miVariable' no se ha enviado en el formulario.";
}

?>
