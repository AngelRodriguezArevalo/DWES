<?php
$message = '';  // Mensaje de estado
$moved = false; // Estado de la subida

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $fileType = mime_content_type($_FILES['image']['tmp_name']);
        $maxSize = 2 * 1024 * 1024; // 2MB

        if (in_array($fileType, $allowedTypes) && $_FILES['image']['size'] <= $maxSize) {
            $uploadDir = 'uploads/';
            $moveDir = 'var/www/images/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = time() . '-' . basename($_FILES['image']['name']);
            $filePath = $moveDir . $fileName;

            $moved = move_uploaded_file($_FILES['image']['tmp_name'], $filePath);

            if ($moved) {
                $message = "✅ Imagen subida correctamente.<br>";
                $message .= "<b>Nombre:</b> " . htmlspecialchars($_FILES['image']['name']) . "<br>";
                $message .= "<b>Tamaño:</b> " . number_format($_FILES['image']['size'] / 1024, 2) . " KB<br>";
                $message .= "<img src='$filePath' width='200' alt='Imagen de perfil'>";
            } else {
                $message = "❌ Error al mover el archivo.";
            }
        } else {
            $message = "⚠️ Archivo no permitido o demasiado grande (Máx. 2MB)";
        }
    } else {
        $message = "❌ No se pudo subir el archivo.";
    }
}
?>

<?php include 'includes/header.php' ?>

<?= $message ?>
<form method="POST" action="B7_2.php" enctype="multipart/form-data">
  <label for="image"><b>Subir imagen de perfil:</b></label>
  <input type="file" name="image" accept="image/*" id="image" required><br>
  <input type="submit" value="Subir">
</form>

<?php include 'includes/footer.php' ?>
