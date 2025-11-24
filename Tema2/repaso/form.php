<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="post" name="asigs">
        <p>NOmbre</p>
        <input type="text" name="nombre" placeholder="Nombre">
        <p>seleciciona modulos</p>

        <fieldset width="50%">
        <p><input type="checkbox" name="modulo[]" value="DWESE" >DWESE</input></p>
        <p><input type="checkbox" name="modulo[]" value ="DWEC">DWEC</input></p>

        <button type="submit" name="enviar" value="enviar">Enviar</button>
        </fieldset>
    </form>

    <?php

    if(isset($_POST['enviar'])){

            //vefiicar y mostar nome
            if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
                echo "Tu nombre es {$_POST['nombre']}<br>";
            }
            else{
                echo "no hay nombre";
            }

            $totalModulos = 0;


            //verficar y mostrar modulos

            if(isset($_POST['modulo']) && is_array($_POST['modulo'])){
                $totalModulos = count($_POST['modulo']);

                

                echo "<br>Los modulos elegidos son: ";

                echo "<ol>";

                foreach($_POST['modulo'] as $key => $valor){
                    echo "<li>$valor</li>";
                }
                echo "</ol>";
            }else{
                echo "<br>no hay modulos";
            }

            echo "<br>has elegido {$totalModulos} modulos <br>";
    }
    ?>



    <div id ="noseya">

    <form method="post">
        <fieldset width="50%">
            <legend style="font-weight: bold;">NObre</legend>
        <p>Ingresa el nombre</p>
        <p><input type="text" name="nombre" placeholder="nombre"></p>

        <p>ingresa email</p>
        <p><input type="email" name="correo" placeholder="emial@mail.com"></p>

        <p>Ingresa edad</p>
        <p><input type="number" name="edad" value="0"></p>
        </fieldset>


        <fieldset width="40%">
            <legend style="font-weight: bold;">MOdulos a elegir</legend>

            <p><input type="checkbox" name="modulo[]" value="modulo1">modulo1 <br></p>
            <p><input type="checkbox" name="modulo[]" value="modulo2">modulo2 <br></p>
            <p><input type="checkbox" name="modulo[]" value="modulo3">modulo3 <br></p>

        </fieldset>

        <button type="submit" name="enviar">Enviar</button>
    </form>

    <?php

    if(isset($_POST['enviar'])){
        $todobien = true;
        $errores = [];

        
        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
            
            echo"Hola {$_POST['nombre']} <br>";

        }else{
            $errores []= "no hay nombre";
            $todobien = false;

        }
        
        if(isset($_POST['correo']) && !empty($_POST['correo'])){

            echo "<p>Tu email es {$_POST['correo']} <br>";
        }else{
            
            $errores []= "no hay correo";
            $todobien = false;
        }

        if(!empty($_POST['edad']) && $_POST['edad'] > 0){

            echo "<p>Tienes {$_POST['edad']} años <br>";

        }else{
            
            $errores []= "no hay edad o pusiste algo sin sentido, debe ser  > 0";
            $todobien = false;
        }


        if(isset($_POST['modulo']) && is_array($_POST['modulo']) && count($_POST['modulo']) > 0){
    

        }else{
            
            $errores []= "Hay que elegir almenos 1 modulo.";
            $todobien = false;
        }


        if($todobien){
            echo "<div class='success'>";
                echo "<h3>Datos enviados correctamente:</h3>";
                echo "Hola {$_POST['nombre']} <br>";
                echo "Tu email es: {$_POST['correo']}<br>";
                echo "Tienes {$_POST['edad']} años<br>";
                echo "Has elegido los siguientes módulos:<br>";
                echo "<ol>";
                foreach($_POST['modulo'] as $key =>$valor) {
                    echo "<li>$valor</li>";
                }
                echo "</ol>";
                echo "</div>";
            } else {
                echo "<div class='error'>";
                echo "<h3>Errores encontrados:</h3>";
                echo "<ul>";
                foreach($_POST['modulo'] as $key =>$valor) {
                    echo "<li>$valor</li>";
                }
                echo "</ul>";
                echo "</div>";
            }
        }

    
    ?>
    </div>
    



</body>
</html>