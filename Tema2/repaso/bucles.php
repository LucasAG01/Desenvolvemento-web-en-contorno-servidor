<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucles?¿</title>
</head>
<body>
    <h1>Aqui van cosas de buvles</h1>

    <div id = "tablass">
    <?php
    $numero = 7;
    echo "<h2>Tabla multiplicar numero $numero</h2>";

    for($i=1; $i<=10; $i++){
        echo "<p>$numero * $i = " . ($numero  * $i)."</p>";
    }

    ?>
    </div>

    <div id =Condatdor>
        <?php
        echo "<h3> Contador regresivo </h3>";
        $contador  = 10;
        while($contador  >=1){
            echo "$contador <br>";
            $contador--;
        }
        echo "<p>¡Despegue!</p>";
        ?>
    </div>


    <div id="arrayss">
        <?php
        $colores = ["rojo", "verde", "azul", "amarillo"];
        echo "<h3> COlroes primarios </h3>";
        foreach($colores as $indice => $color){
            echo "<p> COlor en el índice $indice es $color </p> <br>";

        }
        ?>
    </div>

    <div id="xd">
    <?php
    $usuarios = [
            "admin" => ["password" => "1234", "role" => "administrador", "activo"=>true],
            "nana" => ["password" => "password", "role" => "usuario", "activo"=>true],
            "JoJO" => ["password" => "abcd1234", "role" => "editorr", "activo"=>false],
            "Lain" => ["password" => "lain2001", "role" => "administrador", "activo"=>true],
    ];



    //Datos form simulados
    $usuario_input ="nana";
    $password_input ="password";

    echo "<h3> Verififaciojn </h3>";
    echo "<p> Usuario ingresado: $usuario_input </p>";
    
    if(!array_key_exists($usuario_input, $usuarios)){
        echo "<p style='color=red;'> Usuario no encontrado </p>";
    } elseif(!$usuarios[$usuario_input]['activo']){
        echo "<p style='color=orange;'> Usuario desactivado </p>";
    }elseif($usuarios[$usuario_input]['password'] !== $password_input){ //comprobar contraseña !== significa diferente es decir ['password'] del array usuarios en la posicion usuario_input, si es diferente al password_input ingresado
        echo "<p style='color: red;'>❌ Contraseña incorrecta</p>";
    }else{
        $role = $usuarios[$usuario_input]['role'];
        echo "<p style='color: green;'>✅ Login exitoso</p>"; 

        switch($role){
            case 'administrador':
            echo "<p>Bienvenido Administrador. Tienes acceso completo al sistema.</p>";
            echo "<ul>";
            echo "<li>Gestión de usuarios</li>";
            echo "<li>Configuración del sistema</li>";
            echo "<li>Reportes avanzados</li>";
            echo "</ul>";
            break;

            case 'editor':
            echo "<p>Bienvenido Editor. Puedes crear y modificar contenido.</p>";
            echo "<ul>";
            echo "<li>Crear artículos</li>";
            echo "<li>Editar contenido</li>";
            echo "<li>Subir archivos</li>";
            echo "</ul>";
            break;
            
            case 'usuario':
            echo "<p>Bienvenido Usuario. Acceso básico al sistema.</p>";
            echo "<ul>";
            echo "<li>Ver contenido</li>";
            echo "<li>Comentar</li>";
            echo "<li>Descargar recursos</li>";
            echo "</ul>";
            break;
        default:
            echo "<p>Rol desconocido. Contacta al administrador.</p>";
        }
    }
    ?>
    </div>

    <div id="mmc">
        <form method="POST" >
            <p>Introduce tu peso</p>
            <input type="number" name="peso" step="0.1" required>
            <p>Introduce tu altura</p>
            <input type="number" name="altura" step="0.01" required>
            <button type="submit" name="imc">Enviar</button>
        </form>
    <?php
        if(isset($_POST['imc'])){
            //recoger y cvalidar
            $peso_ingresado = floatval($_POST['peso']);
            $altura_ingresada = floatval($_POST['altura']);
            
            
            echo "<h3> Cálculo del IMC </h3>";
            echo "<p>peso ingreado: $peso_ingresado </p>";
            echo "<p>altura ingresada: $altura_ingresada </p>";


            //calcular imc
            if($altura_ingresada && $peso_ingresado > 0){
                $imc = $peso_ingresado / ($altura_ingresada * $altura_ingresada);
                echo "<p><strong>tu IMC es: ". round($imc, 2) . "</strong></p>";

                //interpretar imc
                if($imc < 18.5){
                    echo "<p> Bajo peso </p>";
                } elseif ($imc < 24.9){
                    echo "<p> Peso normal </p>";
                } elseif ($imc < 29.9){
                    echo "<p> Sobrepeso </p>";
                } else {
                    echo "<p> Obesidad </p>";
                }
            }
            else{
                echo "<p style='color:red;'> Por favor ingresa valores válidos para peso y altura.</p>";
            }
        }
    ?>
    </div>
</body>
</html>