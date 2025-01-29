<?php 
$message = '';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {   
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $fileType = mime_content_type($_FILES['image']['tmp_name']);
        $maxSize = 2 * 1024 * 1024; // 2MB

        if (in_array($fileType, $allowedTypes) && $_FILES['image']['size'] <= $maxSize) {
            $uploadDir = 'uploads/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = time() . '-' . basename($_FILES['image']['name']);
            $filePath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                $message = "✅ Archivo subido con éxito: <b>" . htmlspecialchars($_FILES['image']['name']) . "</b>";
                $message .= "<br><b>Tamaño:</b> " . number_format($_FILES['image']['size'] / 1024, 2) . " KB";
                $message .= "<br><b>Ubicación:</b> " . htmlspecialchars($filePath);
                $message .= "<br><img src='$filePath' width='200' alt='Imagen subida'>";
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
<form method="POST" action="B7_1.php" enctype="multipart/form-data">
  <label for="image"><b>Subir archivo:</b></label>
  <input type="file" name="image" accept="image/*" id="image" required><br>
  <input type="submit" value="Subir">
</form>

<?php include 'includes/footer.php' ?>
