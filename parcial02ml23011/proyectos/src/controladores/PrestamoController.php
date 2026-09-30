<?php

namespace App\Controladores;

use App\Enums\TipoEquipo;
use App\Excepciones\DatosInvalidosException;
use App\Modelos\EquipoFactory;

class PrestamoController
{
    public function formulario(?string $error = null, array $datos = []): void
    {
        require __DIR__ . '/../../vistas/formulario.php';
    }

    public function guardar(): void
    {
        $carnet = trim($_POST['carnet'] ?? '');
        $codigo = trim($_POST['codigo'] ?? '');
        $nombre = trim($_POST['nombre'] ?? '');
        $tipo = trim($_POST['tipo'] ?? '');

        try {
            if ($carnet === '' || $codigo === '' || $nombre === '' || $tipo === '') {
                throw new DatosInvalidosException(
                    'Todos los campos son obligatorios.'
                );
            }

            if (!preg_match('/^[A-Z]{2}\d{5}$/', $carnet)) {
                throw new DatosInvalidosException(
                    'El carnet debe tener 2 letras mayúsculas seguidas de 5 dígitos.'
                );
            }

            try {
                $tipoEquipo = TipoEquipo::from($tipo);
            } catch (\ValueError) {
                throw new DatosInvalidosException(
                    'El tipo de equipo no es válido.'
                );
            }

            $equipo = EquipoFactory::createEquipo(
                $codigo,
                $nombre,
                $tipoEquipo
            );

            $_SESSION['prestamos'][] = [
                'carnet' => $carnet,
                'codigo' => $equipo->codigo,
                'nombre' => $equipo->nombre,
                'tipo' => $tipoEquipo->value,
                'dias' => $equipo->diasMaximoPrestamo()
            ];

            header('Location: listar.php');
            exit;
        } catch (DatosInvalidosException $e) {
            $this->formulario(
                $e->getMessage(),
                [
                    'carnet' => $carnet,
                    'codigo' => $codigo,
                    'nombre' => $nombre,
                    'tipo' => $tipo
                ]
            );
        }
    }
}
