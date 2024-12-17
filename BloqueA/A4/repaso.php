<?php
require_once "classes/Alumno.php";
require_once "classes/Modulo.php";

//crear modulo
$modulo = new Modulo("DWES");

//crear alumnos
$alumno1 = new Alumno("Pepe", 20, "Español", "pepe@gmail.com", false, [5.76,3.25,6,7]);
$alumno2 = new Alumno("Pepa", 40, "Noruego", "pepa@gmail.com", false, [10,5,0]);
$alumno3 = new Alumno("Leandro", 30, "Español", "leandro@gmail.com", false, [2,3,6,7]);

//editar alumnos matriculados
$alumno1 -> setMatriculado(true);
$alumno2 -> setMatriculado(true);

//agregar alumnos creados a modulo creado
$modulo -> agregarAlumno($alumno1);
$modulo -> agregarAlumno($alumno2);
$modulo -> agregarAlumno($alumno3);

//eliminar alumno de modulo por nombre
//$modulo -> expulsarAlumno("Leandro");

//obtener todos los alumnos guardados en modulo
$alumnos = $modulo -> getAlumnos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>
            <h1>Módulo: <?= $modulo->getNombreModulo() ?></h1>
            
            <h2>Alumnos</h2>
            <table border="1" cellpadding="10">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Nacionalidad</th>
                        <th>Email</th>
                        <th>Matriculado</th>
                        <th>Media</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alumnos as $alumno): ?>
                        <tr>
                            <td><?= $alumno->getNombre() ?></td>
                            <td><?= $alumno->getEdad() ?></td>
                            <td><?= $alumno->getNacionalidad() ?></td>
                            <td><?= $alumno->getEmail() ?></td>
                            <td><?= $alumno->getMatriculado() ? 'Matriculado' : 'No matriculado' ?></td>
                            <td><?= $alumno->calcularMedia() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
</body>
</html>