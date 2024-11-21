<?php
session_start();

$errores = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['anterior'])) {
        header("Location: formulario2.php");
        exit;
    }

    $nombre_titular = $_POST['nombre_titular'] ?? '';
    $modalidad_pago = $_POST['modalidad_pago'] ?? '';
    $ccc_part1 = $_POST['ccc_part1'] ?? '';
    $ccc_part2 = $_POST['ccc_part2'] ?? '';
    $ccc_part3 = $_POST['ccc_part3'] ?? '';
    $ccc_part4 = $_POST['ccc_part4'] ?? '';
    $numero_tarjeta = $_POST['numero_tarjeta'] ?? '';

    if (empty($nombre_titular)) {
        $errores['nombre_titular'] = "El nombre del titular es obligatorio.";
    }

    if (empty($modalidad_pago)) {
        $errores['modalidad_pago'] = "Debe seleccionar una modalidad de pago.";
    }

    if (empty($ccc_part1) || empty($ccc_part2) || empty($ccc_part3) || empty($ccc_part4)) {
        $errores['ccc'] = "Debe completar el Código Cuenta Cliente.";
    }

    if (empty($numero_tarjeta)) {
        $errores['numero_tarjeta'] = "Debe proporcionar el número de tarjeta.";
    }

    if (empty($errores)) {
        $_SESSION['nombre_titular'] = $nombre_titular;
        $_SESSION['modalidad_pago'] = $modalidad_pago;
        $_SESSION['ccc_part1'] = $ccc_part1;
        $_SESSION['ccc_part2'] = $ccc_part2;
        $_SESSION['ccc_part3'] = $ccc_part3;
        $_SESSION['ccc_part4'] = $ccc_part4;
        $_SESSION['numero_tarjeta'] = $numero_tarjeta;
        header("Location: verificar.php");
        exit;
    }
    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario 3 - Datos de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 20px;
        }
        .error {
            color: red;
            font-size: 12px;
        }
        fieldset {
            border: 1px solid #ccc;
            padding: 10px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"] {
            width: calc(100% - 10px);
            padding: 5px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        .ccc-group input {
            width: calc(22% - 10px);
            display: inline-block;
            margin-right: 5px;
        }
        .radio-group {
            margin-top: 10px;
        }
        .radio-group label {
            display: block;
        }
        button {
            margin-top: 10px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <h1>Formulario</h1>
    <p>Datos Personales - Datos de Inscripción - <strong>Datos de Pago</strong> - Confirmar</p>
    <p>Los campos marcados con <span style="color: red;">*</span> son obligatorios.</p>

    <form method="POST">
        <fieldset>
            <legend>Datos de Pago</legend>

            <label>Nombre del titular <span style="color: red;">*</span>:</label>
            <input type="text" name="nombre_titular" value="<?= htmlspecialchars($_SESSION['nombre_titular'] ?? '') ?>">
            <span class="error"><?= $errores['nombre_titular'] ?? '' ?></span>

            <label>Modalidad de Pago <span style="color: red;">*</span>:</label>
            <div class="radio-group">
                <label>
                    <input type="radio" name="modalidad_pago" value="Domiciliación bancaria" 
                        <?= (isset($_SESSION['modalidad_pago']) && $_SESSION['modalidad_pago'] === 'Domiciliación bancaria') ? 'checked' : '' ?>>
                    Domiciliación bancaria
                </label>
                <label>
                    <input type="radio" name="modalidad_pago" value="Transferencia bancaria" 
                        <?= (isset($_SESSION['modalidad_pago']) && $_SESSION['modalidad_pago'] === 'Transferencia bancaria') ? 'checked' : '' ?>>
                    Transferencia bancaria
                </label>
                <label>
                    <input type="radio" name="modalidad_pago" value="Tarjeta de crédito" 
                        <?= (isset($_SESSION['modalidad_pago']) && $_SESSION['modalidad_pago'] === 'Tarjeta de crédito') ? 'checked' : '' ?>>
                    Tarjeta de crédito
                </label>
            </div>
            <span class="error"><?= $errores['modalidad_pago'] ?? '' ?></span>

            <label>Código Cuenta Cliente (CCC) <span style="color: red;">*</span>:</label>
            <div class="ccc-group">
                <input type="text" name="ccc_part1" maxlength="4" value="<?= htmlspecialchars($_SESSION['ccc_part1'] ?? '') ?>">
                <input type="text" name="ccc_part2" maxlength="4" value="<?= htmlspecialchars($_SESSION['ccc_part2'] ?? '') ?>">
                <input type="text" name="ccc_part3" maxlength="4" value="<?= htmlspecialchars($_SESSION['ccc_part3'] ?? '') ?>">
                <input type="text" name="ccc_part4" maxlength="4" value="<?= htmlspecialchars($_SESSION['ccc_part4'] ?? '') ?>">
            </div>
            <span class="error"><?= $errores['ccc'] ?? '' ?></span>

            <label>Número de tarjeta:</label>
            <input type="text" name="numero_tarjeta" value="<?= htmlspecialchars($_SESSION['numero_tarjeta'] ?? '') ?>">
            <span class="error"><?= $errores['numero_tarjeta'] ?? '' ?></span>
        </fieldset>

        <button type="submit" name="anterior">Anterior (Datos de Inscripción)</button>
        <button type="submit">Siguiente (Confirmar Inscripción) >> </button>
    </form>
</body>
</html>
