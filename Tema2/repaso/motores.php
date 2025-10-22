<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Selecciona el tipo de motor</h1>

    <form method="POST" action="">
        <p>Elige una!</p>

        <input type="radio" id="motor1" name="motor" value="1"> 
        <label for="motor1">gasolina</label><br>

        <input type="radio" id="motor2" name="motor" value="2">
        <label for="motor2">Diesel</label><br>
        

        <input type="radio" id="motor3" name="motor" value="3"> 
        <label for="motor3">moto</label><br>
        

        <input type="radio" id="motor4" name="motor" value="4"> 
        <label for="motor4">elestrivco</label><br>
        

        <input type="submit" value="MOstrar tipo motor">

    </form>

    <div>
    <?php
    //verificar si se ha enviado el formulario
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Recoger el valor del motor seleccionado
        if(isset($_POST['motor'])){
            $motor = $_POST['motor'];

            //Con switch
            switch($motor) {
                case 1:
                    echo "<p>El motor es de gasolina</p>";
                    break;
                case 2:
                    echo "<p>El motor es diesel</p>";
                    break;
                case 3:
                    echo "<p>El motor es de motocicleta</p>";
                    break;
                case 4:
                    echo "<p>El motor es eléctrico</p>";
                    break;
                default:
                    echo "<p>Motor no reconocido</p>";
                    break;
            }
        } else {
            echo "<p>No has seleccionado ningún motor</p>";
        }
    }

    /*Resumen:

    name → Es lo que PHP recibe ($_POST['motor'])

    value → Es el valor específico de cada opción (lo que usas en el switch)

    id → Solo para HTML, no afecta a PHP

    Para múltiples formularios → Usa diferentes name en los campos o botones submit

    <!-- Formulario 1 -->
<form method="POST">
    <input type="radio" name="motor_coche" value="1"> Gasolina
    <input type="submit" name="form1" value="Enviar coche">
</form>

<!-- Formulario 2 -->
<form method="POST">
    <input type="radio" name="motor_moto" value="1"> 125cc
    <input type="submit" name="form2" value="Enviar moto">
</form>

<?php
if(isset($_POST['form1'])) {
    // Procesar formulario 1
    $motor = $_POST['motor_coche'];
}

if(isset($_POST['form2'])) {
    // Procesar formulario 2  
    $motor = $_POST['motor_moto'];
}
?>






<form method="POST">
    <input type="radio" name="motor" value="1"> Gasolina
    <input type="submit" name="enviar_coche" value="Enviar Coche">
</form>

<form method="POST">
    <input type="radio" name="motor" value="3"> 125cc  
    <input type="submit" name="enviar_moto" value="Enviar Moto">
</form>

<?php
if(isset($_POST['enviar_coche'])){
    echo "Se envió el formulario de COCHE";
    $motor = $_POST['motor'];
}

if(isset($_POST['enviar_moto'])){
    echo "Se envió el formulario de MOTO";
    $motor = $_POST['motor'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Múltiples Formularios</title>
</head>
<body>
    <h2>Formulario de Coches</h2>
    <form method="POST">
        <input type="radio" name="motor" value="1"> Gasolina<br>
        <input type="radio" name="motor" value="2"> Diesel<br>
        <input type="submit" name="formulario" value="coche">
    </form>

    <h2>Formulario de Motos</h2>
    <form method="POST">
        <input type="radio" name="motor" value="3"> 125cc<br>
        <input type="radio" name="motor" value="4"> 250cc<br>
        <input type="submit" name="formulario" value="moto">
    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formulario'])){
        $tipo_formulario = $_POST['formulario'];
        $motor = $_POST['motor'];
        
        if($tipo_formulario == "coche"){
            echo "<h3>Resultado para COCHE:</h3>";
            switch($motor){
                case 1: echo "Coche de gasolina"; break;
                case 2: echo "Coche diesel"; break;
            }
        }
        
        if($tipo_formulario == "moto"){
            echo "<h3>Resultado para MOTO:</h3>";
            switch($motor){
                case 3: echo "Moto de 125cc"; break;
                case 4: echo "Moto de 250cc"; break;
            }
        }
    }
    ?>
</body>
</html>


en el primer ejemplo, llamas a la variable tipo_forulario,
 pero donde almacenaste eso?,
  por que $tipo_formulario = $_POST['formulario'] esto llama al "value" del submit?

    $_POST['formulario'] contendrá el value del botón que se presionó

    $tipo_formulario = $_POST['formulario'] guarda ese valor en la variable
    */
    ?>  
    </div> 
</body>
</html>


