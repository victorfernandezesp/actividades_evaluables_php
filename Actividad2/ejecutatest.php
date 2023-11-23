<?php
include("config/config.php");

if (isset($_POST['selecciona'])) {
    $testSeleccionado = $_POST['selecciona'];
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Victor Fernández España">
    <title>Test Autoescuela
        <?php echo $testSeleccionado + 1; ?>
    </title>
    <link rel="stylesheet" href="styles/styles2.css">
</head>

<body>
    <h1> Test Autoescuela
        <?php echo $testSeleccionado + 1; ?>
    </h1>
    <form action="darresultados.php" method="post">
        <?php
        foreach ($aTests[$testSeleccionado]["Preguntas"] as $key => $pregunta) {
            echo "<br/>";
            echo "-------------------------------------------------------------------------------------------------------------------------------------------------------";
            echo "<br/>";
            echo "<br/>";
            echo "Pregunta: " . $pregunta["Pregunta"] . "<br/>";
            $imagen = "dir_img_test" . $testSeleccionado + 1 . "/img" . ($key + 1) . ".jpg";

            foreach ($pregunta["respuestas"] as $respuesta) {
                echo '<input type="radio" name="respuestasSeleccionadas[' . $key . ']" value="' . $respuesta . '"> ' . $respuesta . '<br/>';
            }
            echo "<br/>";
            if (file_exists($imagen)) {
                echo '<img src="' . $imagen . '" alt="Pregunta' . ($key + 1) . '"><br/>';
            }
        }
        echo "<br/>";
        echo "-------------------------------------------------------------------------------------------------------------------------------------------------------";
        echo "<br/>";
        echo "<br/>";
        echo '<input type="hidden" name="TestNum" value="' . $testSeleccionado . '">';

        ?>

        <input type="Submit" name="enviar" value="Enviar">
        <br /><br /><br /><br />
    </form>


</body>

</html>