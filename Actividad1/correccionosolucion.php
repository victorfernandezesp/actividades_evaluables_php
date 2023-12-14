<?php
include("config/listado_verbos.php");

if (isset($_POST['miVariable'])) {
    $miVariable = json_decode($_POST['miVariable'], true);
    if (isset($miVariable) && is_array($miVariable)) {
        echo '<br/>';
        echo '<h2>Tabla de Verbos - Solucion</h2>';
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
                echo '<td style="background-color: green;">' . $valor . '</td>';
            }
            echo '</tr>';
        }
    
        echo '</table>';
    }
    
} else {
    echo "El campo 'miVariable' no se ha enviado en el formulario.";
}

?>
