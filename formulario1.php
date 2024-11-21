<?php
session_start();

$errores = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $cargo = $_POST['cargo'] ?? '';
    $provincia = $_POST['provincia'] ?? '';
    $pais = $_POST['pais'] ?? '';

    if (empty($nombre)) {
        $errores['nombre'] = "El nombre es obligatorio.";
    }
    if (empty($apellidos)) {
        $errores['apellidos'] = "Los apellidos son obligatorios.";
    }
    if (empty($email)) {
        $errores['email'] = "El correo electrónico es obligatorio.";
    }
    if (empty($telefono)) {
        $errores['telefono'] = "El teléfono es obligatorio.";
    }

    if (empty($errores)) {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellidos'] = $apellidos;
        $_SESSION['email'] = $email;
        $_SESSION['telefono'] = $telefono;
        $_SESSION['cargo'] = $cargo;
        $_SESSION['provincia'] = $provincia;
        $_SESSION['pais'] = $pais;

        header("Location: formulario2.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario 1 - Datos Personales</title>
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
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        button {
            margin-top: 10px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <h1>Formulario</h1>
    <p><strong>Datos Personales</strong> - Datos de Inscripción - Datos de Pago - Confirmar</p>
    <p>Los campos marcados con <span style="color: red;">*</span> son obligatorios.</p>

    <form method="POST">
        <fieldset>
            <legend>Datos de la Persona a Inscribir</legend>

            <label>Nombre <span style="color: red;">*</span>
                <input type="text" name="nombre" value="<?= htmlspecialchars($_SESSION['nombre'] ?? '') ?>">
                <span class="error"><?= $errores['nombre'] ?? '' ?></span>
            </label>

            <label>Apellidos <span style="color: red;">*</span>
                <input type="text" name="apellidos" value="<?= htmlspecialchars($_SESSION['apellidos'] ?? '') ?>">
                <span class="error"><?= $errores['apellidos'] ?? '' ?></span>
            </label>

            <label>Correo Electrónico <span style="color: red;">*</span>
                <input type="email" name="email" value="<?= htmlspecialchars($_SESSION['email'] ?? '') ?>">
                <span class="error"><?= $errores['email'] ?? '' ?></span>
            </label>

            <label>Teléfono <span style="color: red;">*</span>
                <input type="text" name="telefono" value="<?= htmlspecialchars($_SESSION['telefono'] ?? '') ?>">
                <span class="error"><?= $errores['telefono'] ?? '' ?></span>
            </label>

            <label>Cargo
                <input type="text" name="cargo" value="<?= htmlspecialchars($_SESSION['cargo'] ?? '') ?>">
            </label>

            <label>Provincia
                <input type="text" name="provincia" value="<?= htmlspecialchars($_SESSION['provincia'] ?? '') ?>">
            </label>

            <label>País
                <input type="text" name="pais" value="<?= htmlspecialchars($_SESSION['pais'] ?? '') ?>">
            </label>
        </fieldset>

        <button type="submit">Siguiente (Datos de Inscripción) >></button>
    </form>
</body>
</html>
