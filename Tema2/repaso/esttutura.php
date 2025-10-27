
<?php
echo "<h1> Estructurass</h1>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estructura?¿</title>
</head>
<body>

<div id="motores">
    <?php
$tipo_motor= rand(1,6);

echo "<h3>Tipo motor seleccionado: $tipo_motor</h3>";

switch($tipo_motor){
    case 1:
        echo "<p> gaoslina </p>";
        break;
    case 2: 
        echo "<p> diesel </p>";
        break;
    case 3:
        echo "<p> 125cc </p>";
        break;
    case 4:
        echo "<p> 250cc </p>";
        break;
    default:
        echo "<p> Motor no disponible </p>";
}
?>
</div>
<div id ="notas">
    <?php
    $nota = rand(0,10);

echo "<h3>Nota obtenida: $nota</h3>";

if($nota >=9){
    echo "<p> sobresaliente </p>";
} elseif ($nota >=7){
    echo "<p> notable </p>";

}elseif ($nota >=6){
    echo "<p> bien </p>";
}elseif($nota >=5){
    echo "<p> sugiciente </p> ";
}elseif($nota < 5){
    echo "<p> infuciente </p>";
}
?>

</div>
    
</body>
</html>