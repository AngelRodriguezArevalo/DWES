<?php
$moved = false;
$message = '';
$error = '';
$upload_path = 'uploads/';
$thumb_path = 'uploads/thumbs/';
$max_size = 5242880; // 5MB
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
$allowed_exts = ['jpeg', 'jpg', 'png', 'gif'];

if (!file_exists($upload_path)) {
    mkdir($upload_path, 0777, true);
}
if (!file_exists($thumb_path)) {
    mkdir($thumb_path, 0777, true);
}

function create_filename($filename, $upload_path) {
    $basename = pathinfo($filename, PATHINFO_FILENAME);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $basename = preg_replace('/[^A-z0-9]/', '-', $basename);
    $i = 0;
    $new_filename = $basename . '.' . $extension;
    while (file_exists($upload_path . $new_filename)) {
        $i++;
        $new_filename = $basename . '-' . $i . '.' . $extension;
    }
    return $new_filename;
}

function resize_image_gd($orig_path, $new_path, $max_width, $max_height) {
    list($orig_width, $orig_height, $image_type) = getimagesize($orig_path);
    $ratio = $orig_width / $orig_height;

    if ($orig_width > $orig_height) {
        $new_height = $max_height;
        $new_width = $new_height * $ratio;
    } else {
        $new_width = $max_width;
        $new_height = $new_width / $ratio;
    }

    switch ($image_type) {
        case IMAGETYPE_GIF:
            $orig = imagecreatefromgif($orig_path);
            break;
        case IMAGETYPE_JPEG:
            $orig = imagecreatefromjpeg($orig_path);
            break;
        case IMAGETYPE_PNG:
            $orig = imagecreatefrompng($orig_path);
            break;
        default:
            return false;
    }

    $new = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($new, $orig, 0, 0, 0, 0, $new_width, $new_height, $orig_width, $orig_height);

    switch ($image_type) {
        case IMAGETYPE_GIF:
            imagegif($new, $new_path);
            break;
        case IMAGETYPE_JPEG:
            imagejpeg($new, $new_path);
            break;
        case IMAGETYPE_PNG:
            imagepng($new, $new_path);
            break;
    }
    return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    if ($_FILES['image']['error'] == 0) {
        $file_size = $_FILES['image']['size'];
        $file_type = mime_content_type($_FILES['image']['tmp_name']);
        $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        if ($file_size > $max_size) {
            $error = 'El archivo es demasiado grande (máx. 5MB). ';
        } elseif (!in_array($file_type, $allowed_types) || !in_array($file_ext, $allowed_exts)) {
            $error = 'Formato de archivo no permitido.';
        } else {
            $filename = create_filename($_FILES['image']['name'], $upload_path);
            $destination = $upload_path . $filename;
            $thumb_destination = $thumb_path . 'thumb_' . $filename;
            $moved = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
            $resized = resize_image_gd($destination, $thumb_destination, 200, 200);
        }
    } else {
        $error = 'Error al subir el archivo.';
    }

    if ($moved && $resized) {
        $message = "✅ Imagen subida correctamente.<br>
                    <b>Nombre:</b> $filename<br>
                    <b>Tamaño:</b> " . number_format($file_size / 1024, 2) . " KB<br>
                    <b>Miniatura:</b><br>
                    <img src='$thumb_destination' width='200'>";
    } else {
        $message = "❌ No se pudo subir la imagen. " . $error;
    }
}
?>

<?php include 'includes/header.php'; ?>

<?= $message ?>

<form method="POST" action="" enctype="multipart/form-data">
    <label for="image"><b>Subir imagen del producto:</b></label>
    <input type="file" name="image" accept="image/jpeg, image/png, image/gif" id="image" required><br>
    <input type="submit" value="Subir">
</form>

<?php include 'includes/footer.php'; ?>
