
<?php
echo "<h3>Información del servidor<h3>";
echo "<table border='1' cellpadding ='5'>";
echo "<tr><th>Clave</th><th>Valor</th></tr>";


foreach($_SERVER as $clave => $valor){
    echo "<tr><td>$clave</td><td>$valor</td></tr>";
}

//DEtectar navegador
$user_agent = $_SERVER['HTTP_USER_AGENT'];
if(strpos($user_agent, needle: 'Firefox') !== false){
    $navegador = 'Mozilla Firefox';
    echo "<p>Estás usando $navegador</p>";

} elseif (strpos($user_agent, 'Chrome') !== false){
    $navegador = 'Google Chrome';
    echo "<p>Estás usando $navegador</p>";

}else {
    $navegador = 'Navegador desconocido';
    echo "<p>Estás usando $navegador</p>";
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