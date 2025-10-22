<?php
// 
setlocale(LC_ALL, 'es_ES.UTF-8');
date_default_timezone_set('Europe/Madrid');

$fechaActual = date('l d \d\e F \d\e Y'); // Formato: día de la semana, día de mes de año el formato es el siguiente lowercase L es día de la semana completo d
$horaActual = date('H:i:s');

echo "<p>Fecha actual: $fechaActual</p>"; 
echo "<p>Hora actual: $horaActual</p>";


//mostartr fecha en formatos
$formatos = [
    "completo" => 'l, d \d\e F \d\e Y H:i:s',
    "corto" => 'd/m/Y',
    "hora" => 'H:i',
    "Dia y mes" => 'd \d\e F',
];


foreach ($formatos as $nombre => $formato){
    echo "<p>Formato $nombre: " . date($formato) . "</p>";
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
    
</body>
</html>