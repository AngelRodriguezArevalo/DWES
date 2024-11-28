<?php
$rows = 5;
$colums = 6;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 50%;
            margin: auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            text-align: center;
            }
            /* Estilos para las celdas y bordes */
            th, td {
            border: 1px solid #ddd;
            padding: 8px;
            }
            /* Color de fondo para el encabezado */
            th {
            background-color: #f2f2f2;
            font-weight: bold;
            }
            /* Color alterno para filas */
            tr:nth-child(even) {
            background-color: #f9f9f9;
            }
            /* Efecto de hover en las filas */
            tr:hover {
            background-color: #e0e0e0;
            }
    </style>
</head>
<body>
    <table>
            <?php for ($i=1; $i <= $rows; $i++) { ?>  <!-- bucle que itera por filas -->
                <tr>        
                <?php for ($j=1; $j <= $colums; $j++) { ?> <!-- bucle que itera por columnas -->
                    <?php if (($i>=2 && $i <=4) && ($j>=2 && $j <=5)) { ?> <!-- condición para no rellenar cuadro -->
                    <td><?=''?></td>    
                    <?php }else{?> <!-- de lo contrario se rellena -->
                    <td><?='('.$i. ','. $j.')'?></td>
                    <?php } ?>     
                <?php } ?>
                </tr>
            <?php } ?>       
    </table>
    <hr>
    <br>
    <table>        
            <?php for ($i =1; $i <= 10; $i++) { ?>   
                <tr>        
                <?php for ($j =1; $j <= 12; $j++) { ?> 
                    <?php if (($i>=2 && $i <=9) && ($j>=2 && $j <=11)) { ?>
                    <td><?=''?></td>    
                    <?php }else{?>
                    <td><?='('.$i. ','. $j.')'?></td>
                    <?php } ?>     
                <?php } ?>
                </tr>
            <?php } ?>       
    </table>
    <hr>
    <br>
    <table> 
            <?php for ($i =1; $i <= 15; $i++) { ?>   
                <tr>        
                <?php for ($j =1; $j <= 18; $j++) { ?> 
                    <?php if (($i>=2 && $i <=14) && ($j>=2 && $j <=17)) { ?>
                    <td><?=''?></td>    
                    <?php }else{?>
                    <td><?='('.$i. ','. $j.')'?></td>
                    <?php } ?>     
                <?php } ?>
                </tr>
            <?php } ?>        
    </table>
</body>
</html>