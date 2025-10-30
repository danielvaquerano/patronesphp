<?php
require_once 'DecoratorArmas.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 | Patrón Decorator</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="container">
        <a href="../../index.php" class="volver">← Volver al Menú Principal</a>
        <h1>3. Patrón Decorator: Equipamiento Dinámico de Personajes</h1>
        
        <p>Objetivo: Añadir dinámicamente diferentes armas y mejoras a un personaje (Guerrero o Mago) sin modificar sus clases base.</p>
        
        <hr>

        <?php
        $guerreroBase = new Guerrero(); 

        $guerreroArmado = new EspadaLarga($guerreroBase); 

        $guerreroSuperArmado = new ArmaduraFortaleza($guerreroArmado); 
        
        $guerreroFinal = new EspadaLarga($guerreroSuperArmado); 

        echo "<div class='resultado'>";
        echo "<h2> Personaje 1: Guerrero Hiper-Armado</h2>";
        echo "<h3>Construcción:</h3>";
        echo "<p>Guerrero Base → Espada Larga → Armadura → Espada Larga (Doble)</p>";
        echo "<ul>";
        echo "<li>**Descripción:** " . $guerreroFinal->obtenerDescripcion() . "</li>";
        echo "<li>**Daño Total:** " . $guerreroFinal->obtenerDanio() . " (10 + 15 + 5 + 15)</li>";
        echo "</ul>";
        echo "</div>";


        $magoBase = new Mago();

        $magoArmado = new ArcoMagico($magoBase);

        echo "<div class='resultado'>";
        echo "<h2>🧙‍♂️ Personaje 2: Mago a Distancia</h2>";
        echo "<h3>Construcción:</h3>";
        echo "<p>Mago Base → Arco Mágico</p>";
        echo "<ul>";
        echo "<li>**Descripción:** " . $magoArmado->obtenerDescripcion() . "</li>";
        echo "<li>**Daño Total:** " . $magoArmado->obtenerDanio() . " (8 + 12)</li>";
        echo "</ul>";
        echo "</div>";
        ?>
        
    </div>
</body>
</html>