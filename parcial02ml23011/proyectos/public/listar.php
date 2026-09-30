<?php

declare(strict_types=1);

session_start();

require __DIR__ . '/../vendor/autoload.php';

$prestamos = $_SESSION['prestamos'] ?? [];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamos registrados</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="contenedor listado">
    <h1>Préstamos registrados</h1>

    <table>
        <thead>
            <tr>
                <th>Carnet</th>
                <th>Código</th>
                <th>Equipo</th>
                <th>Tipo</th>
                <th>Días máximos</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($prestamos as $prestamo): ?>
                <tr>
                    <td><?= htmlspecialchars($prestamo['carnet']) ?></td>
                    <td><?= htmlspecialchars($prestamo['codigo']) ?></td>
                    <td><?= htmlspecialchars($prestamo['nombre']) ?></td>
                    <td><?= htmlspecialchars($prestamo['tipo']) ?></td>
                    <td><?= htmlspecialchars((string) $prestamo['dias']) ?></td>
                </tr>
            <?php endforeach; ?>

            <?php if (empty($prestamos)): ?>
                <tr>
                    <td colspan="5">No hay préstamos registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a class="enlace" href="index.php">Registrar otro préstamo</a>
</div>

</body>
</html>