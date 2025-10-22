<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $ciclo ="DAW";
    $modulo ="DWES";
    print "<p>";
    printf("%s es un módulo de %d curso de %s", $modulo, 2, $ciclo);
    print "</p>";
    print "<br>";
    //la salida el número π se obtiene con signo y sólo con dos decimales
    printf("El numero PI vale %+.2f \n", pi());
    //print "<br><br>";
    //Existe una función similar a printf pero en vez de generar una salida con la cadena obtenida, permite guardarla en una variable: sprintf.
    $txt_pi=sprintf("El numero PI vale %+.2f  esto va en variable \$txt_pi", pi());
    print "$txt_pi";
    print "<br>";

    
    //Concatenacion
    $bo =$modulo . " es este modulo <br>";
    echo $bo ;

    //heredoc
    $cadema = <<<MICADENA
    Desarrollo de aplicaciones Web<br />
    Desarrollo Web en Entorno Servidor 
    MICADENA;
    print $cadema;
    print "<br>";
    //Así el texto se muestra como cadena de "", si no quieres ninguna sustitucion usa 'MICADENA' al principio y ya, abajo NO


    //Funciones con tipos de datos.
    $a = $b ="3.1416";
    settype($b, "float");
    print "\$a vale $a y es de tipo " . gettype($a) . "<br>"; //string
    print "\$b vale $b y es de tipo " . gettype($b) . "<br>"; //double

    //verificva si esta definida y no es null
    if(isset($a)){
        print "\$a esta definida <br>";
    } else {
        print "\$a no esta definida <br>";
    }
    unset ($a); //la elimina

    //Define una constante con define
    define("PI", 3.1416);




    //fechas
    echo "Hoy es " . date("d/m/Y") . "y son las " .date("H:i")."<br>";

    //Crear una fecha a partir de cualquier cadena.
    $fechaMySQL = "2024-06-20";
    $objetoDateTime = date_create_from_format("Y-m-d", $fechaMySQL);
    var_dump($objetoDateTime);
    echo "<br>";
    //o más rápido
    $fecha1 = new DateTime("$fechaMySQL");
    echo "<br>";
    var_dump($fecha1);

    echo "<br>";
    //Pasar la fecha al formato que queramos y sacar el "timestamp" (marca de tiempo a una fecha).
    $mifecha = new DateTime();
    $fecha=date_format($mifecha, "d/m/Y");
    echo "<br>";
    var_dump($fecha);
    //Sacar timestamp a un objeto DateTime
    $ahora = new DateTime();
    echo "<br> TimeStamp: " . date_timestamp_get($ahora);
    echo "<br>";

    //Multiples posibilidades
    //Actual
    $ahora = new DateTime();
    echo "<br>";
    var_dump($ahora);
    echo "<br>";
    echo "<p>Ayer</p>";
    //fecha de ayer
    $ayer = new DateTime('yesterday');
    var_dump($ayer);
    //El último lunes
    echo "<br><p>El último lunes</p>";
    $lunes = new DateTime('last Monday');
    var_dump($lunes);

    echo "<br>";
    
    




    ?>
</body>
</html>