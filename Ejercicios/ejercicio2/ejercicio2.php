<?php
// Incluimos todas las clases definidas en el archivo de lógica
require_once 'AdapterArchivos.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 | Patrón Adapter</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="container">
        <a href="../../index.php" class="volver">← Volver al Menú Principal</a>
        <h1>2. Patrón Adapter: Compatibilidad de Windows</h1>
        
        <p>Objetivo: Usar la clase antigua <code>Windows7Archivos</code> (el Adaptado) en el nuevo sistema <code>clienteWindows10</code> (el Objetivo), gracias al <code>AdaptadorArchivos</code> (el Adaptador).</p>
        
        <hr>

        <?php
        echo "<h3>Ejemplo 1: Usando un Objeto Nativo (No necesita adaptador)</h3>";
        
        $archivoModernoSimulado = new class implements IArchivoNuevo {
            public function abrirArchivoModerno(string $nombreArchivo): string {
                return "✅ [Windows 10 Nativo] Archivo '{$nombreArchivo}' abierto directamente (formato actual).";
            }
        };
        
        clienteWindows10($archivoModernoSimulado);


        echo "<h3>Ejemplo 2: Usando un Archivo Antiguo (Necesita Adaptador)</h3>";
        
        $archivoWindows7 = new Windows7Archivos();
        
        $adaptador = new AdaptadorArchivos($archivoWindows7);
        
        clienteWindows10($adaptador);

        ?>
        
    </div>
</body>
</html>