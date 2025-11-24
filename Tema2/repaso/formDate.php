<!DOCTYPE html>
<?php
date_default_timezone_set('Europe/madrid');
setlocale(LC_ALL,'es_ES.UTF-8');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datess</title>
</head>
<body>

<h2>Hola. te voy a pedir unso datos y de doy la fecha.</h2>

<p>Dia</p>
<input type="text" name="dia" placeholder="25">
<p>MEs</p>
<input type="text" name="mes" placeholder="12">
<p>año</p>
<input type="text" name="ano" placeholder="2020">

<button type="submit" name="enviar">Enviar</button>


<?php

if(isset($_POST['enviar'])){
            $errores = [];
            $datosCorrectos = true;

            // Validar que todos los campos estén presentes y no estén vacíos
            if(empty($_POST['dia']) || empty($_POST['mes']) || empty($_POST['ano'])){
                $errores[] = "Todos los campos son obligatorios";
                $datosCorrectos = false;
            } else {
                $dia = intval($_POST['dia']);
                $mes = intval($_POST['mes']);
                $ano = intval($_POST['ano']);

                // Validar año (no anterior a 1900)
                if($ano < 1900){
                    $errores[] = "El año no puede ser anterior a 1900";
                    $datosCorrectos = false;
                }

                // Validar año (no futuro)
                if($ano > date('Y')){
                    $errores[] = "El año no puede ser futuro";
                    $datosCorrectos = false;
                }

                // Validar fecha con checkdate
                if(!checkdate($mes, $dia, $ano)){
                    $errores[] = "La fecha introducida no es válida";
                    $datosCorrectos = false;
                }
            }

            // Mostrar resultados
            if($datosCorrectos){
                $fecha = "$dia-$mes-$ano";
                $objfecha = date_create_from_format('d-m-Y', $fecha);
                
                // Formatear fecha en español
                //$fecha_formateada = strftime("%A %d de %B de %Y", $objfecha->getTimestamp());
                
                // Capitalizar primera letra del día
                $fecha_formateada = ucfirst($fecha_formateada);
                
                echo "<div class='success'>✓ Fecha válida</div>";
                echo "<div class='fecha-resultado'>";
                echo "<strong>Fecha formateada:</strong> " . $fecha_formateada . "<br>";
                echo "<strong>Fecha numérica:</strong> " . date('d/m/Y', $objfecha->getTimestamp()) . "<br>";
                echo "<strong>Fecha en inglés:</strong> " . date('l, F j, Y', $objfecha->getTimestamp());
                echo "</div>";
                
            } else {
                echo "<div class='error'>";
                echo "<strong>Errores encontrados:</strong><br>";
                foreach($errores as $error){
                    echo "- " . $error . "<br>";
                }
                echo "</div>";
            }
        }


?>

    
</body>
</html>