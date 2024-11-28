<?php
$estudiantes = [
    [
        //informcación del estudiante
        $información =[
        'nombre' => 'Alex García',
        'fechaN' => '14-03-2005',
        'lugarR' => 'Madrid',
        'tlf' => 698997763,
        'email' => 'alex.garcia@example.com',
        'repetidor' => 'No',
        'estado' => 'Aprobado',
        ],
        
        // notas de cada materia
        $evalucaciones = [
            $matematicas = [
                $examen1 = 6,
                $examen2 = 7,
                $examen3 = 8,
                $examen4 = 6,
                $examen5 = 7,
                //calculo nota final
                $notaFinal = ($examen1+ $examen2+ $examen3+$examen4+$examen5)/5,
            ],
            $lengua = [
                $examen1 = 5,
                $examen2 = 6,
                $comentarioTexto = 7,
                $notaFinal = ((($examen1+ $examen2)/2)*0.4 + ($comentarioTexto*0.6)),
            ],
            $ingles = [
                $lectura = 6,
                $compresionA = 7,
                $expresionO = 6,
                $escritura = 6,
                $notaFinal = ($lectura+ $compresionA+ $expresionO+$escritura)/4,
            ],
            $tecnologia = [
                $proyecto = 8,
                $participacion = 7,
                $notaFinal = (($proyecto*0.8)+ ($participacion*0.2)),
            ],
        ]
        ],

        [
            $información =[
            'nombre' => 'María Lopez',
            'fechaN' => ' 20-05-2005',
            'lugarR' => 'Barcelona',
            'tlf' => 612321147,
            'email' => 'maria.lopez@example.com',
            'repetidor' => 'Si',
            'estado' => 'Aprobado',
            ],
            
            $evalucaciones = [
                $matematicas = [
                    $examen1 = 5,
                    $examen2 = 6,
                    $examen3 = 7,
                    $examen4 = 6,
                    $examen5 = 6,
                    $notaFinal = ($examen1+ $examen2+ $examen3+$examen4+$examen5)/5,
                ],
                $lengua = [
                    $examen1 = 6,
                    $examen2 = 5,
                    $comentarioTexto = 7,
                    $notaFinal = ((($examen1+ $examen2)/2)*0.4 + ($comentarioTexto*0.6)),
                ],
                $ingles = [
                    $lectura = 6,
                    $compresionA = 6,
                    $expresionO = 5,
                    $escritura = 6,
                    $notaFinal = ($lectura+ $compresionA+ $expresionO+$escritura)/4,
                ],
                $tecnologia = [
                    $proyecto = 6,
                    $participacion = 7,
                    $notaFinal = (($proyecto*0.8)+ ($participacion*0.2)),
                ],
            ]
            ],

            [
                $información =[
                'nombre' => 'Juan Perez',
                'fechaN' => '08-11-2004',
                'lugarR' => 'Sevilla',
                'tlf' => 677998844,
                'email' => 'juan.perez@example.com',
                'repetidor' => 'No',
                'estado' => 'Aprobado',
                ],
                
                $evalucaciones = [
                    $matematicas = [
                        $examen1 = 6,
                        $examen2 = 7,
                        $examen3 = 8,
                        $examen4 = 7,
                        $examen5 = 7,
                        $notaFinal = ($examen1+ $examen2+ $examen3+$examen4+$examen5)/5,
                    ],
                    $lengua = [
                        $examen1 = 6,
                        $examen2 = 7,
                        $comentarioTexto = 6,
                        $notaFinal = ((($examen1+ $examen2)/2)*0.4 + ($comentarioTexto*0.6)),
                    ],
                    $ingles = [
                        $lectura = 7,
                        $compresionA = 6,
                        $expresionO = 7,
                        $escritura = 6,
                        $notaFinal = ($lectura+ $compresionA+ $expresionO+$escritura)/4,
                    ],
                    $tecnologia = [
                        $proyecto = 8,
                        $participacion = 7,
                        $notaFinal = (($proyecto*0.8)+ ($participacion*0.2)),
                    ],
                ]
                ],

                [
                    $información =[
                    'nombre' => 'Lucía Sanchez',
                    'fechaN' => '22-09-2005',
                    'lugarR' => 'Valencia',
                    'tlf' => 664889977,
                    'email' => 'lucia.sanchez@example.com',
                    'repetidor' => 'Si',
                    'estado' => 'Suspenso',
                    ],
                    
                    $evalucaciones = [
                        $matematicas = [
                            $examen1 = 4,
                            $examen2 = 5,
                            $examen3 = 4,
                            $examen4 = 3,
                            $examen5 = 4,
                            $notaFinal = ($examen1+ $examen2+ $examen3+$examen4+$examen5)/5,
                        ],
                        $lengua = [
                            $examen1 = 5,
                            $examen2 = 5,
                            $comentarioTexto = 6,
                            $notaFinal = ((($examen1+ $examen2)/2)*0.4 + ($comentarioTexto*0.6)),
                        ],
                        $ingles = [
                            $lectura = 4,
                            $compresionA = 4,
                            $expresionO = 5,
                            $escritura = 4,
                            $notaFinal = ($lectura+ $compresionA+ $expresionO+$escritura)/4,
                        ],
                        $tecnologia = [
                            $proyecto = 5,
                            $participacion = 4,
                            $notaFinal = (($proyecto*0.8)+ ($participacion*0.2)),
                        ],
                    ]
                    ],
                    [
                        $información =[
                        'nombre' => 'Carlos Martínez',
                        'fechaN' => '05-01-2005',
                        'lugarR' => 'Zaragoza',
                        'tlf' => 618997755,
                        'email' => 'carlos.martinez@example.com',
                        'repetidor' => 'No',
                        'estado' => 'Suspenso',
                        ],
                        
                        $evalucaciones = [
                            $matematicas = [
                                $examen1 = 5,
                                $examen2 = 4,
                                $examen3 = 5,
                                $examen4 = 4,
                                $examen5 = 5,
                                $notaFinal = ($examen1+ $examen2+ $examen3+$examen4+$examen5)/5,
                            ],
                            $lengua = [
                                $examen1 = 4,
                                $examen2 = 4,
                                $comentarioTexto = 5,
                                $notaFinal = ((($examen1+ $examen2)/2)*0.4 + ($comentarioTexto*0.6)),
                            ],
                            $ingles = [
                                $lectura = 5,
                                $compresionA = 4,
                                $expresionO = 4,
                                $escritura = 4,
                                $notaFinal = ($lectura+ $compresionA+ $expresionO+$escritura)/4,
                            ],
                            $tecnologia = [
                                $proyecto = 4,
                                $participacion = 5,
                                $notaFinal = (($proyecto*0.8)+ ($participacion*0.2)),
                            ],
                        ]
                        ],
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Datos de Evaluación para cada estudiante</h1>

    <!--Estudiante 1 -->
    <h2>Estudiante 1: <?= $estudiantes[0][0]['nombre']?> - <?= $estudiantes[0][0]['estado']?></h2><br>
    <p>Fecha de naciemiento: <?= $estudiantes[0][0]['fechaN']?></p><br>
    <p>Lugar de residencia: <?= $estudiantes[0][0]['lugarR']?></p><br>
    <p>Teléfono: <?= $estudiantes[0][0]['tlf']?></p><br>
    <p>Correo electrónico: <?= $estudiantes[0][0]['email']?></p><br>
    <p>Estado repeditor: <?= $estudiantes[0][0]['repetidor']?></p><br>

    <p>Matemáticas: <?= $estudiantes[0][1][0][5]?></p><br>
    <p>Lengua: <?= $estudiantes[0][1][1][3]?></p><br>
    <p>Ingles: <?= $estudiantes[0][1][2][4]?></p><br>
    <p>Tecnología: <?= $estudiantes[0][1][3][2]?></p><br>

    <!--Estudiante 2 -->
    <h2>Estudiante 2: <?= $estudiantes[1][0]['nombre']?> - <?= $estudiantes[1][0]['estado']?></h2><br>
    <p>Fecha de naciemiento: <?= $estudiantes[1][0]['fechaN']?></p><br>
    <p>Lugar de residencia: <?= $estudiantes[1][0]['lugarR']?></p><br>
    <p>Teléfono: <?= $estudiantes[1][0]['tlf']?></p><br>
    <p>Correo electrónico: <?= $estudiantes[1][0]['email']?></p><br>
    <p>Estado repeditor: <?= $estudiantes[1][0]['repetidor']?></p><br>

    <p>Matemáticas: <?= $estudiantes[1][1][0][5]?></p><br>
    <p>Lengua: <?= $estudiantes[1][1][1][3]?></p><br>
    <p>Ingles: <?= $estudiantes[1][1][2][4]?></p><br>
    <p>Tecnología: <?= $estudiantes[1][1][3][2]?></p><br>

    <!--Estudiante 3 -->
    <h2>Estudiante 3: <?= $estudiantes[2][0]['nombre']?> - <?= $estudiantes[2][0]['estado']?></h2><br>
    <p>Fecha de naciemiento: <?= $estudiantes[2][0]['fechaN']?></p><br>
    <p>Lugar de residencia: <?= $estudiantes[1][0]['lugarR']?></p><br>
    <p>Teléfono: <?= $estudiantes[2][0]['tlf']?></p><br>
    <p>Correo electrónico: <?= $estudiantes[2][0]['email']?></p><br>
    <p>Estado repeditor: <?= $estudiantes[2][0]['repetidor']?></p><br>

    <p>Matemáticas: <?= $estudiantes[2][1][0][5]?></p><br>
    <p>Lengua: <?= $estudiantes[2][1][1][3]?></p><br>
    <p>Ingles: <?= $estudiantes[2][1][2][4]?></p><br>
    <p>Tecnología: <?= $estudiantes[2][1][3][2]?></p><br>

    <!--Estudiante 4 -->
    <h2>Estudiante 4: <?= $estudiantes[3][0]['nombre']?> - <?= $estudiantes[3][0]['estado']?></h2><br>
    <p>Fecha de naciemiento: <?= $estudiantes[3][0]['fechaN']?></p><br>
    <p>Lugar de residencia: <?= $estudiantes[3][0]['lugarR']?></p><br>
    <p>Teléfono: <?= $estudiantes[3][0]['tlf']?></p><br>
    <p>Correo electrónico: <?= $estudiantes[3][0]['email']?></p><br>
    <p>Estado repeditor: <?= $estudiantes[3][0]['repetidor']?></p><br>

    <p>Matemáticas: <?= $estudiantes[3][1][0][5]?></p><br>
    <p>Lengua: <?= $estudiantes[3][1][1][3]?></p><br>
    <p>Ingles: <?= $estudiantes[3][1][2][4]?></p><br>
    <p>Tecnología: <?= $estudiantes[3][1][3][2]?></p><br>

    <!--Estudiante 5 -->
    <h2>Estudiante 5: <?= $estudiantes[4][0]['nombre']?> - <?= $estudiantes[4][0]['estado']?></h2><br>
    <p>Fecha de naciemiento: <?= $estudiantes[4][0]['fechaN']?></p><br>
    <p>Lugar de residencia: <?= $estudiantes[4][0]['lugarR']?></p><br>
    <p>Teléfono: <?= $estudiantes[4][0]['tlf']?></p><br>
    <p>Correo electrónico: <?= $estudiantes[4][0]['email']?></p><br>
    <p>Estado repeditor: <?= $estudiantes[4][0]['repetidor']?></p><br>

    <p>Matemáticas: <?= $estudiantes[4][1][0][5]?></p><br>
    <p>Lengua: <?= $estudiantes[4][1][1][3]?></p><br>
    <p>Ingles: <?= $estudiantes[4][1][2][4]?></p><br>
    <p>Tecnología: <?= $estudiantes[4][1][3][2]?></p><br>
    
</body>
</html>