<?php
include("config/config.php");
$testSeleccionado = $_POST['TestNum'] + 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Victor Fernández España">
    <title>Resultado Test <?php echo $testSeleccionado; ?></title>
    <link rel="stylesheet" href="styles/styles1.css">
</head>

<body>


    <?php
    if (isset($_POST['respuestasSeleccionadas'])) {
        $respuestasDeUsuario = $_POST['respuestasSeleccionadas'];
        $testDeUsuario = $_POST['TestNum'];
        $preguntas_Totales = count($aTests[$testDeUsuario]["Preguntas"]);

        echo "<h1> Test Autoescuela $testSeleccionado </h1> ";
        foreach ($aTests[$testDeUsuario]["Preguntas"] as $key => $pregunta) {
            echo "<br/>";
            echo "-------------------------------------------------------------------------------------------------------------------------------------------------------";
            echo "<br/>";
            echo "<br/>";
            echo "Pregunta: " . $pregunta["Pregunta"] . "<br/>";

            $imagen = "dir_img_test" . ($testDeUsuario + 1) . "/img" . ($key + 1) . ".jpg";

            foreach ($pregunta["respuestas"] as $respuesta) {
                $checked = (isset($respuestasDeUsuario[$key]) && $respuestasDeUsuario[$key] == $respuesta) ? 'checked' : '';
                echo '<input type="radio" name="respuestasSeleccionadas[' . $key . ']" value="' . $respuesta . '" ' . $checked . '> ' . $respuesta . '<br/>';
            }

            echo "<br/>";
            if (file_exists($imagen)) {
                echo '<img src="' . $imagen . '" alt="Pregunta' . ($key + 1) . '"><br/>';
            }
        }
        echo "<br/>";
        echo "-------------------------------------------------------------------------------------------------------------------------------------------------------";
        echo "<h1> Resultados del Test Autoescuela</h1>";
        echo "<p>---------------------------------------------------------------------------------------------------------</p>";
        echo "<br/>";
        echo "<br/>";

        $pr_correctas = 0;
        $pr_incorrectas = 0;
        $marcadorPregunta = 0;

        foreach ($respuestasDeUsuario as $respuesta) {
            $seleccion = substr($respuesta, 0, 1);

            if ($aTests[$testDeUsuario]["Corrector"][$marcadorPregunta] == $seleccion) {
                echo "Pregunta " . ($marcadorPregunta + 1) . ": " . '      <span>&#10004;</span></br />';
                $pr_correctas++;
            } else {
                echo "Pregunta " . ($marcadorPregunta + 1) . ": " . '      <span>&#10060;</span><br />';
                $pr_incorrectas++;
            }

            $marcadorPregunta++;
        }

        echo "---------------------------------------------------------------------------------------------------------";
        echo "<br/> Preguntas correctas: " . $pr_correctas;
        echo "<br/> Preguntas incorrectas: " . $pr_incorrectas;
        echo "<br/> La puntuación del test: " . $pr_correctas . "/" . $preguntas_Totales . " = " . (($pr_correctas / $preguntas_Totales) * 100) . "%";
    }
    ?>

</body>

</html>
