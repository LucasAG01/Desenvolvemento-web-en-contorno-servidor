<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
</head>
<body>
    <?php

    //funciones nos permiten asociar una etiqueta  con un bloque de código

    //Inclusión de ficheros externos.
    //crear un fichero con funciones comunes y luego incluirlo en los ficheros que lo necesiten.

    //include : evalua el fichero especificado y lo incluye como parte del actual
    //include_once : lo mismo que include pero si ya se ha incluido no lo vuelve a hacer para evitar errores
    //require : lo mismo que include pero si no lo encuentra da un error fatal y detiene la ejecución del script
    //require_once : lo mismo que requiere pero si ya se ha incluido no lo velve a hacer para evitar errores.

    
    //INFO: Cuando se comienza a evaluar el contenido del fichero externo, se abandona de forma automática el modo PHP y se pasa al modo HTML
    // por lo que si el fichero externo contiene código PHP, es necesario que éste comience con la etiqueta de apertura <?php y termine con la etiqueta de cierre 
    
    
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

    



    
    
    ?>.
    


    ?>
</body>
</html>