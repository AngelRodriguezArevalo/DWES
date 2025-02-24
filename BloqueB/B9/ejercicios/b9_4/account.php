<?php
include 'includes/sessions.php';
require_login(); // Solo usuarios logueados pueden acceder
?>
<?php include 'includes/header-member.php'; ?>

<div class="container mt-5">
    <h1>Bienvenido a tu cuenta</h1>
    <p>Aquí puedes ver tu información personal y archivos de trabajo.</p>
</div>

<?php include 'includes/footer.php'; ?>
