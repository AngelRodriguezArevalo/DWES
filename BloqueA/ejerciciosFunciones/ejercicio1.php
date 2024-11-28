<?php
function generate_multiplication_table(int $number) {
        echo "<table>";
        for ($i = 1; $i <= 10; $i++) {
            $result = $number * $i;
            echo "<tr>";
            echo "<td>{$number}</td>";
            echo "<td>x</td>";
            echo "<td>{$i}</td>";
            echo "<td>=</td>";
            echo "<td>{$result}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 50%;
            text-align: center;
            margin: 20px auto; 
        }
        th, td {
            border: 1px solid black; 
            padding: 8px; 
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    
</head>
<body>
    <?php
    generate_multiplication_table(5);
    ?>
</body>
</html>