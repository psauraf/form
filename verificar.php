<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['anterior'])) {
        header("Location: formulario3.php");
        exit;
    }

    header("Location: formulario1.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificación de Inscripción</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 20px;
            margin-bottom: 20px;
        }
        fieldset {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
        legend {
            font-weight: bold;
        }
        .data-label {
            font-weight: bold;
            margin-right: 10px;
        }
        .data-value {
            color: #555;
            font-size: 14px;
        }
        .data-row {
            margin-bottom: 10px;
        }
        .actions {
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Formulario</h1>
    <p>Datos Personales - Datos de Inscripción - Datos de Pago - <strong>Confirmar</strong></p>

    <fieldset>
        <legend>Datos de la Persona a Inscribir</legend>
        <div class="data-row">
            <span class="data-label">Nombre:</span>
            <span class="data-value"><?= htmlspecialchars($_SESSION['nombre'] ?? 'No proporcionado') ?></span>
        </div>
        <div class="data-row">
            <span class="data-label">Apellidos:</span>
            <span class="data-value"><?= htmlspecialchars($_SESSION['apellidos'] ?? 'No proporcionado') ?></span>
        </div>
        <div class="data-row">
            <span class="data-label">Correo Electrónico:</span>
            <span class="data-value"><?= htmlspecialchars($_SESSION['email'] ?? 'No proporcionado') ?></span>
        </div>
        <div class="data-row">
            <span class="data-label">Teléfono:</span>
            <span class="data-value"><?= htmlspecialchars($_SESSION['telefono'] ?? 'No proporcionado') ?></span>
        </div>
        <div class="data-row">
            <span class="data-label">Cargo:</span>
            <span class="data-value"><?= htmlspecialchars($_SESSION['cargo'] ?? 'No proporcionado') ?></span>
        </div>
        <div class="data-row">
            <span class="data-label">Provincia:</span>
            <span class="data-value"><?= htmlspecialchars($_SESSION['provincia'] ?? 'No proporcionado') ?></span>
        </div>
        <div class="data-row">
            <span class="data-label">País:</span>
            <span class="data-value"><?= htmlspecialchars($_SESSION['pais'] ?? 'No proporcionado') ?></span>
        </div>
    </fieldset>

    <fieldset>
        <legend>Datos de la Inscripción</legend>
        <div class="data-row">
            <span class="data-label">Modalidad de Inscripción:</span>
            <span class="data-value"><?= htmlspecialchars($_SESSION['modalidad'] ?? 'No proporcionado') ?></span>
        </div>
        <div class="data-row">
            <span class="data-label">Código de Descuento:</span>
            <span class="data-value"><?= htmlspecialchars($_SESSION['codigo_descuento'] ?? 'No proporcionado') ?></span>
        </div>
        <div class="data-row">
            <span class="data-label">Observaciones:</span>
            <span class="data-value"><?= htmlspecialchars($_SESSION['observaciones'] ?? 'No proporcionado') ?></span>
        </div>
    </fieldset>

    <fieldset>
        <legend>Datos de Pago</legend>
        <div class="data-row">
            <span class="data-label">Nombre del Titular:</span>
            <span class="data-value"><?= htmlspecialchars($_SESSION['nombre_titular'] ?? 'No proporcionado') ?></span>
        </div>
        <div class="data-row">
            <span class="data-label">Modalidad de Pago:</span>
            <span class="data-value"><?= htmlspecialchars($_SESSION['modalidad_pago'] ?? 'No proporcionado') ?></span>
        </div>
        <div class="data-row">
            <span class="data-label">Código Cuenta Cliente:</span>
            <span class="data-value"><?= htmlspecialchars($_SESSION['ccc_part1'] . '-' . $_SESSION['ccc_part2'] . '-' . $_SESSION['ccc_part3'] . '-' . $_SESSION['ccc_part4']) ?></span>
        </div>
        <div class="data-row">
            <span class="data-label">Número de Tarjeta:</span>
            <span class="data-value"><?= htmlspecialchars($_SESSION['numero_tarjeta'] ?? 'No proporcionado') ?></span>
        </div>
    </fieldset>

    <div class="actions">
        <form method="POST">
            <button type="submit" name="anterior">Anterior (Datos de Pago)</button>
            <button type="submit" name="enviar">Enviar Inscripción</button>
        </form>
    </div>
</body>
</html>
