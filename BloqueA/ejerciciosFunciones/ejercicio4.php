<?php
function generate_password(int $length = 8): string {
    static $password_count = 0;

    $password_count++;

    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $password = '';
    $max_index = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $random_index = rand(0, $max_index);
        $password .= $characters[$random_index];
    }

    echo "Contraseñas generadas: $password_count <br>";

    return $password;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= generate_password()?>
    <br>
    <?= generate_password(4)?>
    <br>
    <?= generate_password(40)?>
</body>
</html>