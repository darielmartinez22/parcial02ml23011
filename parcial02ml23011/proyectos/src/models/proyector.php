<?php

namespace App\Modelos;

class Proyector extends Equipo
{
    public function diasMaximoPrestamo(): int
    {
        return 1;
    }
}