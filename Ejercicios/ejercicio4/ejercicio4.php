<?php
require_once 'StrategySalida.php';

$mensajePrueba = "¡El Patrón Strategy nos permite cambiar el formato de salida fácilmente!";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4 | Patrón Strategy</title>
    <link rel="stylesheet" href="../../style.css">
    <style>
        .estrategia-test { margin-top: 20px; padding: 15px; border-bottom: 2px dashed #bdc3c7; }
    </style>
</head>
<body>
    <div class="container">
        <a href="../../index.php" class="volver">← Volver al Menú Principal</a>
        <h1>4. Patrón Strategy: Diferentes Tipos de Salida</h1>
        
        <p>Objetivo: Usar el **Patrón Strategy** para cambiar el algoritmo de salida (Consola, JSON, TXT) que el objeto principal utiliza, sin modificar el objeto.</p>
        
        <hr>

        <?php
        
        $sistema = new SistemaMensajes($mensajePrueba);

        $sistema->setEstrategia(new SalidaConsola());
        echo "<div class='estrategia-test'>";
        echo "<h2> Estrategia 1: Salida por Consola</h2>";
        echo $sistema->ejecutarSalida();
        echo "</div>";

        $sistema->setEstrategia(new SalidaJson());
        echo "<div class='estrategia-test'>";
        echo "<h2> Estrategia 2: Salida en formato JSON</h2>";
        echo $sistema->ejecutarSalida();
        echo "</div>";


        $sistema->setEstrategia(new SalidaTxt());
        echo "<div class='estrategia-test'>";
        echo "<h2> Estrategia 3: Salida en Archivo TXT</h2>";
        echo $sistema->ejecutarSalida();
        echo "</div>";

        ?>
        
    </div>
</body>
</html>