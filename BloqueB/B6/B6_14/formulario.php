<?php include 'includes/header.php'; ?>

<?php
// Inicializar variables
$error = '';
$direccion_ip = '';
$ip_por_defecto = '0.0.0.0';

// Manejar el envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $direccion_ip = $_POST['ip'] ?? '';

    // Filtrar la dirección IP
    if (!filter_var($direccion_ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        $error = "La dirección IP ingresada no es válida.";
        $direccion_ip = $ip_por_defecto;
    } elseif (filter_var($direccion_ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
        // Validar que la IP no esté en rangos reservados (privados o loopback)
        $mensaje = "La dirección IP <b>$direccion_ip</b> es válida y pública.";
    } else {
        $error = "La dirección IP ingresada pertenece a un rango reservado (privado o loopback).";
        $direccion_ip = $ip_por_defecto;
    }
}
?>

<div class="container">
    <h2>Validador de Direcciones IPv4</h2>

    <!-- Mostrar mensaje de error si existe -->
    <?php if ($error): ?>
        <p class="error" style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php elseif (isset($mensaje)): ?>
        <p class="success" style="color: green;"><?= $mensaje ?></p>
    <?php endif; ?>

    <form action="formulario.php" method="POST">
        <p>
            <label for="ip">Dirección IP:</label><br>
            <input type="text" id="ip" name="ip" value="<?= htmlspecialchars($direccion_ip) ?>" required>
        </p>
        <p><input type="submit" value="Validar"></p>
    </form>

    <?php if (!$error && isset($direccion_ip)): ?>
        <p><b>Resultado:</b> <?= htmlspecialchars($direccion_ip) ?></p>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>

<div class="container">
    <h2>Formulario de Registro de Evento</h2>

    <!-- Mostrar mensaje de error si existe -->
    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="registro_evento_filtrado.php" method="POST">
        <p>
            <label for="email">Correo electrónico:</label><br>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($datos_usuario['email']) ?>" required>
        </p>
        <p>
            <label for="edad">Edad:</label><br>
            <input type="number" id="edad" name="edad" value="<?= htmlspecialchars($datos_usuario['edad']) ?>" required>
        </p>
        <p>
            <label>
                <input type="checkbox" name="newsletter" <?= !empty($_POST['newsletter']) ? 'checked' : '' ?>>
                ¿Te gustaría recibir boletines de noticias?
            </label>
        </p>
        <p><input type="submit" value="Registrarse"></p>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
