<?php
include("config/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Victor Fernández España">
    <title>Resultado Test
        <?php echo $testSeleccionado + 1; ?>
    </title>
    <link rel="stylesheet" href="styles/styles3.css">
</head>

<body>
    <h1> Resultados del Test Autoescuela</h1>
    <p>---------------------------------------------------------------------------------------------------------</p>
    <?php
    if (isset($_POST['respuestasSeleccionadas'])) {
        $pr_correctas = 0;
        $pr_incorrectas = 0;
        $respuestasDeUsuario = $_POST['respuestasSeleccionadas'];
        $testDeUsuario = $_POST['TestNum'];
        $preguntas_Totales = count($aTests[$testDeUsuario]["Preguntas"]);

        $marcadorPregunta = 0;
        foreach ($respuestasDeUsuario as $respuesta) {
            $seleccion = substr($respuesta, 0, 1);
            if ($aTests[$testDeUsuario]["Corrector"][$marcadorPregunta] == $seleccion) {

                echo "Pregunta " . $marcadorPregunta + 1 . ": " . '      <span>&#10004;</span></br />';
                $pr_correctas++;
            } else {
                echo "Pregunta " . $marcadorPregunta + 1 . ": " . '      <span>&#10060;</span><br />';
                $pr_incorrectas++;
            }

            $marcadorPregunta++;
        }
        echo "---------------------------------------------------------------------------------------------------------";
        echo "<br/> Preguntas correctas: " . $pr_correctas;
        echo "<br/> Preguntas incorrectas: " . $pr_incorrectas;
        echo "<br/> La puntuacion test: " . $pr_correctas . "/" . $preguntas_Totales . " = " . (($pr_correctas / $preguntas_Totales) * 10);

    }
    ?>
</body>

</html>