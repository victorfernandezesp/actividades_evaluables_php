<?php
include("config/listado_verbos.php");
$numeroverbos = 0;
if (isset($_POST["num_verbos"]) && isset($_POST["nivel"])) {
    $numeroverbos = (int) $_POST["num_verbos"];
    $dificultad = $_POST["nivel"];
    $array_verbos_seleccionados = array(); // Mueve la inicialización del array aquí

    // Selección de verbos aleatorios
    while (count($array_verbos_seleccionados) < $numeroverbos) {
        $numeroAleatorio = mt_rand(0, count($irregular_verbs) - 1);
        $verbo_aleatorio = implode("", $irregular_verbs[$numeroAleatorio]);

        $encontrado = false;
        foreach ($array_verbos_seleccionados as $verbo_seleccionado) {
            if (implode("", $verbo_seleccionado) == $verbo_aleatorio) {
                $encontrado = true;
                break;
            }
        }

        if (!$encontrado) {
            $array_verbos_seleccionados[] = $irregular_verbs[$numeroAleatorio];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Victor Fernandez España</title>
</head>

<body>
    <?php
    if ($numeroverbos == 0) {
        echo '<form action="" method="post">';
        echo '    <label for="num_verbos">Numero de Verbos</label>';
        echo '    <input type="text" name="num_verbos">';
        echo '    <br>';
        echo '    <label for="nivel">Nivel de Dificultad</label>';
        echo '    <select name="nivel">';
        echo '        <option value="1">Facil</option>';
        echo '        <option value="2">Medio</option>';
        echo '        <option value="3">Dificil</option>';
        echo '    </select>';
        echo '    <br>';
        echo '    <input type="submit" value="Enviar">';
        echo '</form>';
    } elseif ($numeroverbos > 0) {
        echo '<form method="post" action="correccionosolucion.php">';
        echo '<h2>Tabla de Verbos - Nivel de Dificultad: ' . $dificultad . '</h2>';
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>Español</th>';
        echo '<th>Presente</th>';
        echo '<th>Pasado Simple</th>';
        echo '<th>Participio</th>';
        echo '</tr>';

        for ($i = 0; $i < $numeroverbos; $i++) {
            $contador = 0;
            $indicesAleatorios = (array) array_rand($array_verbos_seleccionados[$i], $dificultad); // Convertir a array
            echo '<tr>';
            foreach ($array_verbos_seleccionados[$i] as $key => $value) {
                if (in_array($key, $indicesAleatorios)) {
                    $value = ""; // Deja el valor en blanco para crear un hueco
                    echo ' <td> <input type="text" name="hueco_' . $contador . '" value="' . $value . '"> </td>';

                } else {
                    echo '<td>' . $value . '</td>';
                }
                $contador++;
            }
            echo '<input type="hidden" name="miVariable" value="' . htmlspecialchars(json_encode($array_verbos_seleccionados)) . '">';

            echo '</tr>';
        }

        echo '</table>';
        echo '<input type="submit" value="Correjir">';
        echo '<input type="submit" name="Solucion" value="Solucion">';
        echo '</form>';
    }
    ?>
</body>


</html>