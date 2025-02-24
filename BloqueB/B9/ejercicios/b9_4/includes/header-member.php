<?php
$show_logout = isset($_SESSION['user_email']); // Muestra Cerrar sesión si está autenticado
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Empresa</a>
        <ul class="navbar-nav ms-auto">
            <?php if ($show_logout): ?>
                <li class="nav-item"><a class="nav-link" href="logout.php">Cerrar Sesión</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
