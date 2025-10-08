<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estructuras de control 2</title>
</head>
<body>
    
<?php

//If else elseif
if($a < $b){
    echo "$a es menor que $b <br>";
} elseif ($a == $b){
    echo "$a es igual que $b <br>";
} else {
    echo "$a es mayor que $b <br>";
}


//Switch enlazar varias sentencias if comparando con una variable con distintos valores, cada valor es un case.
switch($a) {
    case 0:
        echo "a vale 0 <br>";
        break;
    case 1:
        echo "a vale 1 <br>";
        break;
    default:   
        echo "a no vale ni 1 ni 0 <br>";
        break;
}


//Ejercicio 1: Haz una página que en funcion de la variable $motor, que puede tomar valores 1(Gasolina), 2(Diesel), 3(Motocicleta), 4(Eléctrico) nos muestre 
//el tipo de motor, es decir si $motor=1 nos mostrará "el motor es de gasolina", Hazlo de dos formas, con bucles if y con switch.

$motor = 3;

//Con if
if($motor ==1){
    echo "El motor es de gasolina <br>";
}elseif($motor ==2){
    echo "El motor es diesel <br>";
}elseif($motor ==3){
    echo "El motor es de motocicleta <br>";
}elseif($motor ==4){
    echo "El motor es eléctrico <br>";
}

//Con switch
switch($motor) {
    case 1:
        echo "El motor es de gasolina <br>";
        break;
    case 2:
        echo "El motor es diesel <br>";
        break;
    case 3:
        echo "El motor es de motocicleta <br>";
        break;
    case 4:
        echo "El motor es eléctrico <br>";
        break;
    default:   
        echo "error, el motor no es correcto <br>";
        break;
}




//Bucles

//while defines un bucle que se ejecuta mientras se cumpla una expresión, esta se evaúa amestes de comenzar cada iteración.
$a = 1;
while($a < 8){
    $a +=3;
}
echo $a; //imprime 10



//do-while similar al while pero la expresión se evalúa después de cada iteración, por lo que el bucle se ejecuta al menos una vez.
$a = 5;
do{
    $a -=3;
}while($a > 10);
echo $a; //el bucle se ejecuta una vez y luego este, imprime 2


//for bucle con una variable de control que se inicializa, se evalúa y se incrementa o decrementa en cada iteración.
/*
for(expr1; expr2; expr3){
    //sentencia o conjunto de sentencias
}
*/
//expr1: se ejecuta solo una vez al comienzo del bucle.
//expr2: se evalúa antes de cada iteración y si es true se ejecuta el bucle, si es false termina el bucle.
//expr3: se ejecuta al final de cada iteración, normalmenete para incrementar o decremnentar la variable de control.
for($a =5; $a<10; $a+=3){
    echo $a; //se muestan los valores 5 y 8
    echo "<br />";
}

// Extra: puedes usar sentencias break y continue para controlar el flujo del bucle. break termina el bucle y continue salta a la siguiente iteración del bucle.


// foreach bucle especial para recorrer arrays y objetos. En cada iteración asigna el valor del elemento actual a una variable temporal.
$colores = array("rojo", "verde", "azul");
foreach($colores as $color){
    echo "$color <br>"; //muestra rojo, verde y azul
}


// Inclusión de ficheros externos
echo "Módulo $modulo del ciclo $ciclo <br /"; //Solo muestra "Modulo del ciclo"
include 'definiciones.php'; // si estuviera en otro directorio tendriamos que poner la ruta relativa
print "Módulo $modulo del ciclo $ciclo <br /"; // muestra "Módulo DWES del ciclo DAW"

// la doble extensión .inc.php para aquellos ficheros en lenguaje PHP cuyo destino
// es ser incluidos dentro de otros, y nunca han de ejecutarse por sí mismos.



//¿Puedes utilizar include o require para incluir el mismo encabezado HTML en varias páginas?
/*
Efectivamente. Como ya viste, el contenido de los ficheros externos se traba como HTML a no ser que figuren los delimitadores <?php y ?>.
 No es necesario incluir código PHP en un fichero externo para poder utilizar include o require con él.
*/


//Ejecucion y creación de funciones.

//llamar a funciones de php
phpinfo(); //muestra información de la configuración de PHP

// No es necesario que defina la función antes de utilizarla, exceptop cuando está condicionalmente definida,
// veamos dos ejemplos que hacen lo mismo:

$iva = true;
$precio = 10;
//precioConIva(); causa error ya que la función no está definida aún
if($iva){
    function precioConIva(){
        global $precio; //podemos usar también $precio = $GLOBALS["precio"];
        $precioIva = $precio * 1.18;
        echo "El precio con IVA es ".$precioIva;
    }
}
precioConIva(); //Aquí ya no da error




$iva = true;
$precio = 10;
if($iva){
    // podemos hacer uso de la función
    // Antes de implementarla
    precioConIva();
}
function precioConIva(){
    $precio = $GLOBALS["precio"];
    $precioIva = $precio * 1.18;
    echo "El precio con IVA es ".$precioIva;
}


// Cuando una función está definida de una forma condicional sus definiciones deben ser procesadas antes de ser llamadas.
// Por tanto, la definición de la función debe estar antes de cualquier llamada.


// Argumentos

// No es buena práctica usar variable sglobales, es mejor usar argumentos o parámetros al hacer la llamada. Además, en lugar de mostrar el resultado
// en pantalla o guardar el resultado en variabnle global, las funciones pueden devolver valor suando snetencia return

function precioConIva2($precio){
    return $precio * 1.18;
}
$precio = 10;
$precioIva = precioConIva2($precio);
echo "El precio con IVA es $precioIva <br>";



// Los argumentos se indican en la definición de la función entre paréntesis y separados por comas.
// Si no hay returnm devuelve null al finalizar su procesamiento.

function precioConIva3($precio, $iva = 0.18){
    return $precio * (1+ $iva);
}
$precio = 10;
$precioIva = precioConIva3($precio); //Al no especificar tomará el valor 0.18 , si pusier a 0.10 en vez de precio tomaria ese valor.
echo "El precio con IVA es $precioIva <br>";


function precioConIva4(&$precio, $iva=0.18){ //El & hace que se pase el argumento por referencia, es decir, se pasa la variable y no una copia de su valor.
    $precio *= (1+ $iva);
}
$precio = 10;
echo "El precio con IVA es $precio <br>"; //10

//IMPORTANTE :
/* esos argumentos, pues los opcionales ($iva) deben estar a la derecha de cualquier otro que no tenga valor por defecto ($aplicar_iva). 
function precio_final (&$precio, $iva=0.18, $aplicar_iva)
*/



//EJERCICIO
// Con la ayuda de las funciones que necesites, haz un programa que, dados dos número enteros positivos, inicio y cantidad,
// nos muestre cantidad de números primos a partir de inicio, si no pasamos ningún valor cantidad=10.

function es_primo($num){ 
    if($num < 2) return false; //los números menores que 2 no son primos
    for($i=2; $i <= sqrt($num); $i++){ //solo es necesario comprobar hasta la raíz cuadrada del número
        if($num % $i ==0) return false; //si es divisible por algún número no es primo
    }
    return true; //si no es divisible por ningún número es primo
}

function mostrarprimos($inicio,$cantidad = 10){
    $contador =0; //contador de números primos encontrados
    do{ //bucle que se ejecuta hasta encontrar la cantidad de números primos solicitada
        if(es_primo($inicio)){ //si es primo
            echo '<strong>'. ++$contador . '=></strong> '. $inicio. '<br>'; //muestra el número primo encontrado
        }
        $inicio++; //incrementa el número a comprobar
    }while($contador < $cantidad); //mientras no se hayan encontrado la cantidad de números primos solicitada 
}


?>





</body>
</html>