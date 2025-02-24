<?php
include 'includes/sessions.php';

if ($logged_in) { // Si ya está logueado, redirigir a la cuenta
    header('Location: account.php');
    exit;
}    

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email    = $_POST['email'];
    $user_password = $_POST['password'];

    if ($user_email == $email && $user_password == $password) { // Validación
        login($user_email);
        header('Location: account.php');
        exit;
    } else {
        $error = "Correo o contraseña incorrectos.";
    }
}
?>

<?php include 'includes/header-member.php'; ?>
<div class="container mt-5">
    <h1>Iniciar Sesión</h1>
    <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
    <form method="POST" action="login.php">
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" placeholder="empleado@empresa.com" required>
        </div>
        <div class="mb-3">
            <label>Contraseña:</label>
            <input type="password" name="password" class="form-control" placeholder="123456"required>
        </div>
        <input type="submit" class="btn btn-primary" value="Iniciar Sesión">
    </form>
</div>
<?php include 'includes/footer.php'; ?>
