<?php
require_once 'FactoryPersonajes.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 | Patrones de Diseño</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="container">
        <a href="../../index.php" class="volver">← Volver al Menú Principal</a>
        <h1>1. Patrón Factory: Fábrica de Personajes</h1>
        
        <p>El código a continuación usa la clase <code>FabricaPersonajes</code> para crear los monstruos. El código principal solo pide un <code>Personaje</code>, sin preocuparse si es un Esqueleto o un Zombi.</p>
        
        <hr>

        <?php
        $nivelFacil = 'facil';
        try {
            $personajeFacil = FabricaPersonajes::crearPersonaje($nivelFacil);
            
            echo "<div class='resultado'>";
            echo "<h2>✅ Personaje Nivel **FÁCIL**</h2>";
            echo "<p>El monstruo generado es: **" . get_class($personajeFacil) . "**</p>";
            echo "<ul>";
            echo "<li>**Ataque:** " . $personajeFacil->atacar() . "</li>";
            echo "<li>**Velocidad:** " . $personajeFacil->obtenerVelocidad() . " puntos.</li>";
            echo "</ul>";
            echo "</div>";
            
        } catch (InvalidArgumentException $e) {
            echo "<div style='color: red;'>Error: " . $e->getMessage() . "</div>";
        }

        $nivelDificil = 'dificil';
        try {
            $personajeDificil = FabricaPersonajes::crearPersonaje($nivelDificil);
            
            echo "<div class='resultado'>";
            echo "<h2>🔥 Personaje Nivel **DIFÍCIL**</h2>";
            echo "<p>El monstruo generado es: **" . get_class($personajeDificil) . "**</p>";
            echo "<ul>";
            echo "<li>**Ataque:** " . $personajeDificil->atacar() . "</li>";
            echo "<li>**Velocidad:** " . $personajeDificil->obtenerVelocidad() . " puntos.</li>";
            echo "</ul>";
            echo "</div>";

        } catch (InvalidArgumentException $e) {
            echo "<div style='color: red;'>Error: " . $e->getMessage() . "</div>";
        }
        ?>

    </div>
</body>
</html>