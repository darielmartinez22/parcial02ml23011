<?php

namespace App\Modelos;

class Laptop extends Equipo
{
    public function diasMaximoPrestamo(): int
    {
        return 3;
    }
}