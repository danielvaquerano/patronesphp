<?php

interface Personaje {
    public function atacar(): string;
    public function obtenerVelocidad(): int;
}


class Esqueleto implements Personaje {
    
    public function atacar(): string {
        return " ¡Esqueleto ataca! Lanza un hueso: Daño ligero y molesto.";
    }

    public function obtenerVelocidad(): int {
        return 10; // Esqueleto: Rápido, fácil.
    }
}

class Zombi implements Personaje {
    
    public function atacar(): string {
        return " ¡Zombi ataca! Muerde: Daño alto y te daña el ánimo.";
    }

    public function obtenerVelocidad(): int {
        return 3; // Zombi: Lento, difícil.
    }
}


class FabricaPersonajes {
    
    
    public static function crearPersonaje(string $nivel): Personaje {
        switch (strtolower($nivel)) {
            case 'facil':
                return new Esqueleto(); 
            case 'dificil':
                return new Zombi(); 
            default:
                throw new InvalidArgumentException("Nivel de dificultad '{$nivel}' no soportado. ¿Intentaste un nivel 'Pesadilla'? Tal vez en el Ejercicio 5.");
        }
    }
}

