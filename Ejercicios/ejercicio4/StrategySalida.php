<?php

interface IEstrategiaSalida {
    public function mostrar(string $mensaje): string;
}

class SalidaConsola implements IEstrategiaSalida {
    public function mostrar(string $mensaje): string {
        return "<pre style='background: #333; color: #0f0; padding: 10px;'>[CONSOLA] > Mensaje recibido: " . $mensaje . "</pre>";
    }
}

class SalidaJson implements IEstrategiaSalida {
    public function mostrar(string $mensaje): string {
        $datos = [
            "tipo" => "JSON",
            "timestamp" => date("Y-m-d H:i:s"),
            "contenido" => $mensaje
        ];
        return "<pre style='background: #f0f0f0; color: #333; padding: 10px; border: 1px dashed #ccc;'>[JSON] " . json_encode($datos, JSON_PRETTY_PRINT) . "</pre>";
    }
}

class SalidaTxt implements IEstrategiaSalida {
    public function mostrar(string $mensaje): string {
        $salida = "--- INICIO TXT ---\nFECHA: " . date("Y-m-d H:i:s") . "\nMENSAJE: " . $mensaje . "\n--- FIN TXT ---";
        return "<pre style='background: #ffe0b2; color: #6d4c41; padding: 10px; border: 1px solid #ff9800;'>[TXT] " . $salida . "</pre>";
    }
}

class SistemaMensajes {
    
    private IEstrategiaSalida $estrategia;
    private string $mensaje;

    public function __construct(string $mensaje) {
        $this->mensaje = $mensaje;
        $this->estrategia = new SalidaConsola(); 
    }

    public function setEstrategia(IEstrategiaSalida $nuevaEstrategia): void {
        $this->estrategia = $nuevaEstrategia;
    }

    public function ejecutarSalida(): string {
        return $this->estrategia->mostrar($this->mensaje);
    }
}