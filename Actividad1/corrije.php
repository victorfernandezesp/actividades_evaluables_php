<?php
include("config/listado_verbos.php");

if (isset($_POST['miVariable'])) {
    $miVariable = json_decode($_POST['miVariable'], true);
    $verbos = $_POST['verbos'];
    $dificultad = $_POST['dificultad'];
    $total_verbos = $verbos * $dificultad;
    $contador = 0;
    if (isset($miVariable) && is_array($miVariable)) {
        echo '<br/>';
        echo '<h2>Tabla de Verbos - Correccion</h2>';
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>Español</th>';
        echo '<th>Presente</th>';
        echo '<th>Pasado Simple</th>';
        echo '<th>Participio</th>';
        echo '</tr>';
        
        foreach ($miVariable as $verbo) {
            echo '<tr>';
            foreach ($verbo as $key => $valor) {
                $inputName = 'hueco_' . $key;
                
                if (isset($_POST[$inputName]) && $_POST[$inputName] === $valor) {
                    echo '<td style="background-color: green;">' . $valor . '</td>';
                    $contador++;
                } else {
                    echo '<td style="background-color: grey;">' . $valor . '</td>';
                }
            }
            echo '</tr>';
        }
    
        echo '</table>';
        echo '<h2>Has acertado ' . $contador . '/'. $total_verbos .'</h2>';
    }
    
} else {
    echo "El campo 'miVariable' no se ha enviado en el formulario.";
}

?>
