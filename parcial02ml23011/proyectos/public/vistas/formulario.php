<?php

use App\Enums\TipoEquipo;

$error = $error ?? '';
$datos = $datos ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamo de equipo</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="contenedor">
    <h1>Préstamo de equipo audiovisual</h1>

    <?php if ($error !== ''): ?>
        <div class="alerta-error">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <label for="carnet">Carnet del estudiante</label>
        <input
            type="text"
            id="carnet"
            name="carnet"
            value="<?= htmlspecialchars($datos['carnet'] ?? '') ?>"
        >

        <label for="codigo">Código del equipo</label>
        <input
            type="text"
            id="codigo"
            name="codigo"
            value="<?= htmlspecialchars($datos['codigo'] ?? '') ?>"
        >

        <label for="nombre">Nombre del equipo</label>
        <input
            type="text"
            id="nombre"
            name="nombre"
            value="<?= htmlspecialchars($datos['nombre'] ?? '') ?>"
        >

        <label for="tipo">Tipo de equipo</label>
        <select id="tipo" name="tipo">
            <option value="">Seleccione un tipo</option>

            <?php foreach (TipoEquipo::cases() as $tipoEquipo): ?>
                <option
                    value="<?= htmlspecialchars($tipoEquipo->value) ?>"
                    <?= ($datos['tipo'] ?? '') === $tipoEquipo->value ? 'selected' : '' ?>
                >
                    <?= htmlspecialchars($tipoEquipo->name) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Registrar préstamo</button>
    </form>

    <a class="enlace" href="listar.php">Ver préstamos</a>
</div>

</body>
</html>