<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tpos de datos compuestos</title>
</head>
<body>

<?php
    //Tipos de datos compuestos

    // Es aquel que te permite almacenar más de un valor. Hay dos tipos:
    // Array: Colección ordenada de valores que se identifican por un índice o clave.
    // Objeto: Colección de valores que se identifican por un nombre (propiedad) y que pueden tener asociadas funciones (métodos).

    //Arrays
    
    // Array numérico:
    $modulos1 = array(0 => "Programación", 1 => "Bases de datos", 2 => "Lenguaje de marcas", 3 => "Entorno de desarrollo");

    //Array asociativo:
    $modulos2 = array("PR" => "Programación", "BD" => "Bases de datos", "LM" => "Lenguaje de marcas", "ED" => "Entorno de desarrollo");

    //Opciópn php 5.4
    $modulos3 = ["PR" => "Programación", "BD" => "Bases de datos", "LM" => "Lenguaje de marcas", "ED" => "Entorno de desarrollo"];


    //Para hacer referencia a elemntos almacenados en array:
    $modulos1[1]; // Bases de datos
    $modulos2["BD"]; // Bases de datos

    // Los arrays anteriores son vectores => Array unidimensionales.
    // Se pueden crear arrays multidimensionales (matrices) que son arrays que contienen otros arrays.

    $ciclos = array(
        "DAW" => array("PR" => "Programación", "BD" => "Bases de datos", "LM" => "Lenguaje de marcas", "ED" => "Entorno de desarrollo"),
        "DAM" => array("SI" => "Sistemas informáticos", "BD" => "Bases de datos", "FOL" => "Formación y orientación laboral", "EMP" => "Empresa e iniciativa emprendedora")
    );

    //En el formato php 5.4
    $ciclos = [
        "DAW" => ["PR" => "Programación", "BD" => "Bases de datos", "LM" => "Lenguaje de marcas", "ED" => "Entorno de desarrollo"],
        "DAM" => ["SI" => "Sistemas informáticos", "BD" => "Bases de datos", "FOL" => "Formación y orientación laboral", "EMP" => "Empresa e iniciativa emprendedora"]
    ];


    //Hacer referencia a elementos almacenados en arrays:
    // Array numérico:
    $modulos1[0] = "Programación";

    // Array asociativo:
    $modulos2["PR"] = "Programación";


    //No es necesario especificar el valor clave. SI lo omites, el array se irá llenando a partie de la última clave numérica existente, o de la posición 0 
    //si no existe ninguna:

    $modulos1[] = "Programación"; // índice 0
    $modulos1[] = "Bases de datos"; // índice 1
    $modulos1[7] = "Lenguaje de marcas"; // índice 7
    $modulos1[] = "Entorno de desarrollo"; // índice 8


    

    //Recorrer ARRAYS

    // Recorriendo solo los elementos
    foreach($modulos1 as $modulo){
        echo $modulo . "<br />";
    }

    // hay un buvle específico llamado foreach() de forma simultámnea
    foreach($modulos1 as $key => $value){
        echo "El código del módulo ".$value." es ".$key."<br />";
    }


/*
Ejercicio resuelto

Haz una página PHP que utilice foreach() para mostrar todos los valores del array "$_SERVER" en una tabla con dos columnas.
La primera columna debe contener el nombre de la variable, y la segunda su valor.
*/
    //Esto va como por fuera del bloque php es una tabla html y dentro del tbody va el foreach
/*
<table align="center" border="1" cellpadding="2" cellspacing="2">
    <thead style="background-color: grey; text-align: center; font-weight: bold;">
        <tr>
            <td>Clave</td>
            <td>Valor</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($_SERVER as $key => $value){
            echo "<tr>";
            echo "<td>$key</td>";
            echo "<td>$value</td>";
            echo "</tr>"; // Fixed: was <tr> instead of </tr>
        }
        ?>
    </tbody>
</table>
*/



// Recorrer arrays 2

//Hay otra forma de recorrer los valores de un array. cada array mantiene un puntero interno que se puede utilizar.

/*
reset() : Sitúa el puntero interno al comienzo del array. devuelven, al igual que current(), el valor del nuevo elemento en que se posiciona.
	
next() : Avanza el puntero interno una posición. devuelven, al igual que current(), el valor del nuevo elemento en que se posiciona.
	
prev() : Mueve el puntero interno una posición hacia atrás. devuelven, al igual que current(), el valor del nuevo elemento en que se posiciona.

end() : Sitúa el puntero interno al final del array. devuelven, al igual que current(), el valor del nuevo elemento en que se posiciona.

current() : Devuelve el elemento de la posición actual.

key() : Devuelve la clave de la posición actual.

each() : Devuelve un array con la clave y el elemento de la posición actual. Además, avanza el puntero interno una posición.
*/

foreach ($modulos1 as $key => $value) {
    echo "El código del módulo ".$value." es ".$key."<br />";
}



/*
Ejercicio resuelto
Haz una página PHP que utilice estas funciones para crear una tabla como la del ejercicio anterior.


<table align="center" border="1" cellpadding="2" cellspacing="2">
    <thead style="background-color: grey; text-align: center; font-weight: bold;">
        <tr>
            <td>Clave</td>
            <td>Valor</td>
        </tr>
    </thead>
    <tbody>
        <?php
        //resetear el puntero al inicio del array
        reset($modulos1);
        while($valor = current($modulos1)){
            $clave = key($modulos1);

            echo "<tr>";
            echo "<td>$clave</td>";
            echo "<td>$valor</td>";
            echo "</tr>";

            next ($modulos1); // avanzar el puntero
        }
        ?>
    </tbody>
</table>

*/



//Funciones relacionadas con los tipos de datos compuestos 4.3

//Asignando valores directamente, la función array() permite crear un array con una sola línea de código.

$a = array(); // array vacío

$modulos = array("PR" => "Programación", "BD" => "Bases de datos", "LM" => "Lenguaje de marcas", "ED" => "Entorno de desarrollo"); //array numérico


// tras haber definido el array, puedes añadir nuevos elementos y modiifcxar los existentes. También puedes se pueden eliminar elemmetos con la función unset()

unset ($modulos [0]); // elimina el elemento con índice 0
// EL primer elemento pasa a ser $modulos[1] que es "Bases de datos"


// array_values() : Devuelve un array con todos los valores de un array, pero sin las claves asociadas.

// is_array() : Devuelve true si encuentra el elelmto en el array y false en caso contrario.

$modulos = array("porgramación","Bases de datos","Lenguaje de marcas","Entorno de desarrollo");

$modulo = "Bases de datos";

if(in_array($modulo, $modulos)){
    echo "El módulo $modulo está en el array";
}else{
    echo "El módulo $modulo no está en el array";
}





?>

<table align="center" border="1" cellpadding="2" cellspacing="2">
    <thead style="background-color: grey; text-align: center; font-weight: bold;">
        <tr>
            <td>Clave</td>
            <td>Valor</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($_SERVER as $key => $value){
            echo "<tr>";
            echo "<td>$key</td>";
            echo "<td>$value</td>";
            echo "</tr>"; 
        }
        ?>
    </tbody>
</table>
</body>
</html>