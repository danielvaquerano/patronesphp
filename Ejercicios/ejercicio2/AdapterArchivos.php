<?php

    interface IArchivoNuevo {
        public function abrirArchivoModerno(string $nombreArchivo): string;
    }


    class Windows7Archivos {
        
        // El método antiguo (incompatible con Windows 10)
        public function abrirVersionAnterior(string $nombreArchivo, string $version): string {
            return " [Windows 7] Cargando archivo '{$nombreArchivo}' en formato {$version} (Versión antigua).";
        }
    }


    class AdaptadorArchivos implements IArchivoNuevo {
        
        private $windows7;

        public function __construct(Windows7Archivos $windows7) {
            $this->windows7 = $windows7;
        }

        public function abrirArchivoModerno(string $nombreArchivo): string {
            
            $resultado = $this->windows7->abrirVersionAnterior($nombreArchivo, "Office 2007/XP");
            
            return "🔄 [ADAPTADOR] Convertido y abierto correctamente en Windows 10.\n" . $resultado;
        }
    }



    function clienteWindows10(IArchivoNuevo $archivo): void {
        $nombre = "DocumentoImportante.docx";
        echo "<div class='resultado'>";
        echo "<h2> Windows 10: Intentando abrir el archivo...</h2>";
        echo "<p>Resultado de la carga para **{$nombre}**:</p>";
        $resultado = $archivo->abrirArchivoModerno($nombre);
        
        echo "<pre>" . $resultado . "</pre>";
        echo "</div>";
    }

