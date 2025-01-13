<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba XSS</title>
</head>
<body>
    <h1>Prueba XSS</h1>
    <p>Haz clic en el enlace para enviar un mensaje potencialmente malicioso:</p>
    <ul>
        <!-- Enlace con un mensaje que podría incluir código malicioso -->
        <li>
            <a href="xss.php?msg=<script>alert('XSS!')</script>">
                Mensaje con código malicioso
            </a>
        </li>
        <li>
            <a href="xss.php?msg=<b>Texto en negrita</b>">
                Mensaje con etiquetas HTML
            </a>
        </li>
        <li>
            <a href="xss.php?msg=Mensaje%20seguro">
                Mensaje seguro
            </a>
        </li>
    </ul>
</body>
</html>
