<?php

declare(strict_types=1);

session_start();

require __DIR__ . '/../vendor/autoload.php';

use App\Controladores\PrestamoController;

$controller = new PrestamoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->guardar();
} else {
    $controller->formulario();
}