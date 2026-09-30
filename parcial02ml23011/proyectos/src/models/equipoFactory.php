<?php

namespace App\Modelos;

use App\Enums\TipoEquipo;

class EquipoFactory
{
    public static function createEquipo(
        string $codigo,
        string $nombre,
        TipoEquipo $tipo
    ): Equipo {
        return match ($tipo) {
            TipoEquipo::Laptop => new Laptop($codigo, $nombre),
            TipoEquipo::Proyector => new Proyector($codigo, $nombre),
        };
    }
}