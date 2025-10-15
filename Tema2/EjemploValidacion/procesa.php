<?php
//-------------DECLARACIÓN DE FUNCIONES AL PRINCIPIO--------------

function existenModulos(){
    global $errores;
    if(!isset($_POST['modulo'])){
        $errores[] = "NO has eligido ningun modulo, revísalo";
        return false;
    }
    return true;
}

function comprobarCadenas($cadena, $campo){
    global $errores;
    if(empty($cadena)){
        $errores[] = "El campo $campo está vacío";
        return false;
    }
    return true;
}

//-------------INICIALIZACIÓN Y PROCESAMIENTO--------------
$errores =[]; // Inicializar array de errores
$modulos =[];
//Procesar datos del formulario
$nombre = trim($_POST['nombre'] ?? ''); // Si es null?? que use '' 
comprobarCadenas($nombre, "Nombre");

$apellidos = trim($_POST['apellidos'] ?? '');
comprobarCadenas($apellidos, "Apellidos");

$mail = trim($_POST['mail'] ?? '');
comprobarCadenas($mail, "Mail");

$edad = $_POST['edad'] ?? '';

if(existenModulos()){
    foreach($_POST['modulo'] as $k => $v){
        $modulos[] = $v;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VAlidacion</title>
</head>
<body>
    <?php
    // --- MOSTRAR RESULTADOS ---
    if(count($errores)>0){
        echo "Ha habido ". count($errores) . " errores, estos han sido <br>";
        echo "<ol>";
        foreach($errores as $k => $v) {
            echo "<li> $v</li>";
        }
        echo "</ol>";
    }else {
        echo "Sin errores.<br> Los datos son: <br>";
        echo "Apellidos, Nombre: " . $apellidos . ", " . $nombre;
        echo "<br>e-mail: " . $mail;
        echo "<br>Edad: " . $edad . " años";
        echo "<br>Módulos matriculados: <br>";
        echo "<ol>";
        foreach ($modulos as $k => $v) {  // en $modulos como clave asociada a el valor respectivo
            echo "<li> $v</li>";
        }   
    }
    ?>
    
    
</body>
</html>