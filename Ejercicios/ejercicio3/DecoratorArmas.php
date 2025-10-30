<?php

interface Personaje {
    public function obtenerDescripcion(): string;
    public function obtenerDanio(): int;
}



class Guerrero implements Personaje {
    public function obtenerDescripcion(): string {
        return "Guerrero básico (sin arma)";
    }

    public function obtenerDanio(): int {
        return 10; 
    }
}

class Mago implements Personaje {
    public function obtenerDescripcion(): string {
        return "Mago novato (solo hechizos de mano)";
    }

    public function obtenerDanio(): int {
        return 8; 
    }
}



abstract class DecoradorArma implements Personaje {
    protected Personaje $personaje; 

    public function __construct(Personaje $personaje) {
        $this->personaje = $personaje;
    }

    abstract public function obtenerDescripcion(): string;
    abstract public function obtenerDanio(): int;
}


class EspadaLarga extends DecoradorArma {
    public function obtenerDescripcion(): string {
        return $this->personaje->obtenerDescripcion() . ", con Espada Larga (+15 DAÑO)";
    }

    public function obtenerDanio(): int {
        return $this->personaje->obtenerDanio() + 15; 
    }
}

class ArcoMagico extends DecoradorArma {
    public function obtenerDescripcion(): string {
        return $this->personaje->obtenerDescripcion() . ", con Arco Mágico (+12 DAÑO, RANGO)";
    }

    public function obtenerDanio(): int {
        return $this->personaje->obtenerDanio() + 12; 
    }
}

class ArmaduraFortaleza extends DecoradorArma {
    public function obtenerDescripcion(): string {
        return $this->personaje->obtenerDescripcion() . ", y Armadura de Fortaleza (+5 DAÑO MÁXIMO)";
    }

    public function obtenerDanio(): int {
        return $this->personaje->obtenerDanio() + 5; 
    }
}