<?php
// Inicialización de variables
$sanitizedData = [
    'nombre' => '',
    'descripcion' => '',
    'precio' => '',
    'bebida_incluida' => ''
];
$errors = [
    'nombre' => '',
    'descripcion' => '',
    'precio' => '',
    'bebida_incluida' => ''
];
$message = '';

// variables imagenes
$moved         = false; // Estado de subida
$messageImagen = ''; // Mensaje de estado
$error         = ''; // Mensaje de error
$upload_path   = __DIR__ . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR; // Carpeta de imágenes originales
$thumb_path    = $upload_path . 'miniaturas' . DIRECTORY_SEPARATOR; // Carpeta de miniaturas
$max_size      = 5 * 1024 * 1024; // Tamaño máximo 5MB
$allowed_types = ['image/jpeg', 'image/png']; // Tipos permitidos
$allowed_exts  = ['jpeg', 'jpg', 'png']; // Extensiones permitidas


// Función para crear una miniatura de 300x300 píxeles con Imagick
function create_thumbnail($source, $thumbpath)
{
    $image = new Imagick($source);
    $image->thumbnailImage(300, 300, true);
    $image->writeImage($thumbpath);
    return true;
}

// Función para generar nombres de archivo
function create_filename($filename, $upload_path)
{
    $basename   = pathinfo($filename, PATHINFO_FILENAME);
    $extension  = pathinfo($filename, PATHINFO_EXTENSION);
    $filename   = $basename . '.' . $extension;

    return $filename;
}

//POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //crear carpetas para imagenes
    if (!file_exists($upload_path)) mkdir($upload_path, 0777, true); // Crear carpeta si no existe
    if (!file_exists($thumb_path)) mkdir($thumb_path, 0777, true);   // Crear carpeta de miniaturas

    // subida de la imagen, redimensión de la imagen, validacion de la imagen
    if ($_FILES['image']['error'] === 0) { // Si no hay errores en la subida
        $error  .= ($_FILES['image']['size'] <= $max_size) ? '' : 'Archivo demasiado grande. ';
        $type   = mime_content_type($_FILES['image']['tmp_name']);
        $error .= in_array($type, $allowed_types) ? '' : 'Tipo de archivo no permitido. ';
        $ext    = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $error .= in_array($ext, $allowed_exts) ? '' : 'Extensión no válida. ';

        if (!$error) {
            $filename    = create_filename($_FILES['image']['name'], $upload_path);
            $destination = $upload_path . $filename;
            $thumbfile   = $thumb_path . $filename;
            $moved       = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
            $resized     = create_thumbnail($destination, $thumbfile);
        }
    } else {
        $error = 'Error al subir la imagen.';
    }

    if ($moved && $resized) {
        $messageImagen = '✅ Imagen subida correctamente.<br>';
        $messageImagen .= '<b>Vista previa:</b><br><img src="imagenes/miniaturas/' . $filename . '" width="300">';
    } else {
        $messageImagen = '❌ No se pudo subir el archivo. ' . $error;
    }

    // Filtros de validación texto
    $validation_filters = [
        'nombre' => [
            'filter' => FILTER_VALIDATE_REGEXP, //filtro para letras de a A a la Z y con un min de 1 caracteres y 20 de max
            'options' => ['regexp' => '/^[A-Za-z\s]{1,20}$/']
        ],
        'descripcion' => [
            'filter' => FILTER_VALIDATE_REGEXP, //filtro para letras de a A a la Z y con un min de 1 caracteres y 200 de max
            'options' => ['regexp' => '/^[A-Za-z\s]{1,200}$/']
        ],
        'precio' => [
            'filter' => FILTER_VALIDATE_FLOAT
        ],
        'bebida_incluida' => [
            'filter' => FILTER_VALIDATE_REGEXP, //filtro con dos opciones
            'options' => ['regexp' => '/^(Si|No)$/']
        ]
    ];

    // Validar datos
    $sanitizedData = filter_input_array(INPUT_POST, $validation_filters);

    // Crear mensajes de error
    $errors['nombre'] = $sanitizedData['nombre'] ? '' : 'El nombre debe tener solo letras y espacios, entre 1 y 20 caracteres.';
    $errors['descripcion'] = $sanitizedData['descripcion'] ? '' : 'La descripción debe tener solo letras, espacios y números entre 1 y 200 caracteres.';
    $errors['precio'] = $sanitizedData['precio'] ? '' : 'El precio debe tener solo dígitos.';
    $errors['bebida_incluida'] = $sanitizedData['bebida_incluida'] ? '' : 'Debes indicar si deseas incluir o no bebida.';

    // Validar si hay errores
    $invalid = implode('', $errors);

    if ($invalid) {
        $message = 'Por favor, revise los siguientes errores:';
    } else {
        // Saneamiento de datos
        $sanitizedData['nombre'] = filter_var($sanitizedData['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sanitizedData['descripcion'] = filter_var($sanitizedData['descripcion'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $message = '¡Gracias! Su registro fue exitoso.';
    }
}
?>

<h1>Formulario de Registro para el menú del día de un restaurante</h1>

<!-- Mensajes -->
<p style="color: red;"><?= $message ?></p>

<!-- Mostrar errores -->
<?php if (!empty($errors)): ?>
    <ul style="color: red;">
        <?php foreach ($errors as $field => $error): ?>
            <?php if ($error): ?>
                <li><?= $error ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<!-- Formulario -->
<form action="examenb7.php" method="POST" enctype="multipart/form-data">
    
    
    <h2><b>Plato 1:</b></h2>
    <p>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($sanitizedData['nombre'] ?? '') ?>">
    </p>
    <p>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" value="<?= htmlspecialchars($sanitizedData['descripcion'] ?? '') ?>">
    </p>
    <p>
        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" value="<?= htmlspecialchars($sanitizedData['precio'] ?? '') ?>">
    </p>

    <p>
        <label for="bebida_incluida">Bebida incluida:</label>
        <select id="bebida_incluida" name="bebida_incluida">
            <option value="">Seleccione</option>
            <option value="Si" <?= $sanitizedData['bebida_incluida'] === 'Si' ? 'selected' : '' ?>>Si</option>
            <option value="No" <?= $sanitizedData['bebida_incluida'] === 'No' ? 'selected' : '' ?>>No</option>
        </select>
    </p>

    
    <label for="image"><b>Subir imagen del plato:</b></label>
    <input type="file" name="image" id="image" required><br>

    <!-- Registro -->
    <p>
        <button type="submit">Registrar</button>
    </p>
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($invalid)): ?>
    <h3>Datos Registrados</h3>
    <p><b>Primer plato:</b></p>
    <p>Nombre: <?= $sanitizedData['nombre'] ?></p>
    <p>Descripción: <?= $sanitizedData['descripcion'] ?></p>
    <p>Precio: <?= $sanitizedData['precio'] ?>€</p>
    <p>Bebida incluida: <?= $sanitizedData['bebida_incluida'] ?></p>
    <?= $messageImagen ?>
<?php endif; ?>
