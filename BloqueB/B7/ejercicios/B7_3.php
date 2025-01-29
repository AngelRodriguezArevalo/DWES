<?php
$message = '';  // Mensaje de estado
$moved = false; // Estado de la subida
$uploadDir = 'uploads/';
$moveDir = 'var/www/images/';
$maxSize = 2 * 1024 * 1024; // 2MB
$allowedTypes = ['image/jpeg', 'image/png'];
$allowedExts = ['jpeg', 'jpg', 'png'];

function cleanFileName($filename) {
    $basename = pathinfo($filename, PATHINFO_FILENAME); 
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $basename = preg_replace('/[^A-Za-z0-9]/', '-', $basename);
    return $basename . '.' . $extension;
}

function getUniqueFileName($filename, $uploadDir) {
    $basename = pathinfo($filename, PATHINFO_FILENAME);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $counter = 1;

    while (file_exists($uploadDir . $filename)) {
        $filename = $basename . '-' . $counter . '.' . $extension;
        $counter++;
    }
    return $filename;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $fileType = mime_content_type($_FILES['image']['tmp_name']);
        $fileExt = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        if (in_array($fileType, $allowedTypes) && in_array($fileExt, $allowedExts) && $_FILES['image']['size'] <= $maxSize) {
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $cleanFileName = cleanFileName($_FILES['image']['name']);
            $uniqueFileName = getUniqueFileName($cleanFileName, $uploadDir);
            $filePath = $uploadDir . $uniqueFileName;
            $movePath = $moveDir . $cleanFileName;
            //$webPath = '/images/' . $uniqueFileName;

            $moved = move_uploaded_file($_FILES['image']['tmp_name'], $movePath);

            if ($moved) {
                $message = "✅ Imagen subida correctamente.<br>";
                $message .= "<b>Nombre:</b> " . htmlspecialchars($uniqueFileName) . "<br>";
                $message .= "<b>Tamaño:</b> " . number_format($_FILES['image']['size'] / 1024, 2) . " KB<br>";
                $message .= "<img src='$movePath' width='200' alt='Imagen de perfil'>";
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
<form method="POST" action="B7_3.php" enctype="multipart/form-data">
  <label for="image"><b>Subir imagen de perfil:</b></label>
  <input type="file" name="image" accept="image/jpeg, image/png" id="image" required><br>
  <input type="submit" value="Subir">
</form>

<?php include 'includes/footer.php' ?>
