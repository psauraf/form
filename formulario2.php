<?php
session_start();

$errores = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['anterior'])) {
        header("Location: formulario1.php");
        exit;
    }

    $modalidad = $_POST['modalidad'] ?? '';
    $codigo_descuento = $_POST['codigo_descuento'] ?? '';
    $observaciones = $_POST['observaciones'] ?? '';

    if (empty($modalidad)) {
        $errores['modalidad'] = "Debe seleccionar una modalidad de inscripción.";
    }

    if (empty($errores)) {
        $_SESSION['modalidad'] = $modalidad;
        $_SESSION['codigo_descuento'] = $codigo_descuento;
        $_SESSION['observaciones'] = $observaciones;

        header("Location: formulario3.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario 2 - Datos de Inscripción</title>
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
        input[type="text"], textarea {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        textarea {
            height: 80px;
        }
        .radio-group {
            margin-top: 10px;
        }
        button {
            margin-top: 10px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <h1>Formulario</h1>
    <p>Datos Personales - <strong>Datos de Inscripción</strong> - Datos de Pago - Confirmar</p>
    <p>Los campos marcados con <span style="color: red;">*</span> son obligatorios.</p>

    <form method="POST">
        <fieldset>
            <legend>Datos de la Inscripción</legend>

            <label>Modalidad de Inscripción <span style="color: red;">*</span></label>
            <div class="radio-group">
                <label>
                    <input type="radio" name="modalidad" value="ANULACIÓN DE INSCRIPCIÓN (0 €)" 
                        <?= (isset($_SESSION['modalidad']) && $_SESSION['modalidad'] === 'ANULACIÓN DE INSCRIPCIÓN (0 €)') ? 'checked' : '' ?>>
                    ANULACIÓN DE INSCRIPCIÓN (0 €)
                </label>
                <label>
                    <input type="radio" name="modalidad" value="2 Días de Conferencias (150.8 €)" 
                        <?= (isset($_SESSION['modalidad']) && $_SESSION['modalidad'] === '2 Días de Conferencias (150.8 €)') ? 'checked' : '' ?>>
                    2 Días de Conferencias (150.8 €)
                </label>
                <label>
                    <input type="radio" name="modalidad" value="2 Días de Conferencias + Certificado (168.2 €)" 
                        <?= (isset($_SESSION['modalidad']) && $_SESSION['modalidad'] === '2 Días de Conferencias + Certificado (168.2 €)') ? 'checked' : '' ?>>
                    2 Días de Conferencias + Certificado (168.2 €)
                </label>
                <label>
                    <input type="radio" name="modalidad" value="2 Días de Conferencias + Tutorial (325.96 €)" 
                        <?= (isset($_SESSION['modalidad']) && $_SESSION['modalidad'] === '2 Días de Conferencias + Tutorial (325.96 €)') ? 'checked' : '' ?>>
                    2 Días de Conferencias + Tutorial (325.96 €)
                </label>
                <label>
                    <input type="radio" name="modalidad" value="2 Días de Conferencias + Tutorial + Certificado (343.36 €)" 
                        <?= (isset($_SESSION['modalidad']) && $_SESSION['modalidad'] === '2 Días de Conferencias + Tutorial + Certificado (343.36 €)') ? 'checked' : '' ?>>
                    2 Días de Conferencias + Tutorial + Certificado (343.36 €)
                </label>
                <span class="error"><?= $errores['modalidad'] ?? '' ?></span>
            </div>

            <label>Código de Descuento:
                <input type="text" name="codigo_descuento" value="<?= htmlspecialchars($_SESSION['codigo_descuento'] ?? '') ?>">
            </label>

            <label>Observaciones:
                <textarea name="observaciones"><?= htmlspecialchars($_SESSION['observaciones'] ?? '') ?></textarea>
            </label>
        </fieldset>

        <button type="submit" name="anterior">Anterior (Datos Personales)</button>
        <button type="submit">Siguiente (Datos de Pago) >></button>
    </form>
</body>
</html>
