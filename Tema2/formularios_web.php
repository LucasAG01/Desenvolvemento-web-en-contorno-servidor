<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios</title>
</head>
<body>
    
<?php

// Los formularios en html, van dentro de la etiqueta <form> </form>

// y dentro sobre lo que puede el usuario son las etiquetyas <input> , <select>, <textarea>, <button>...

// EL atributo action del etiqueta form inidica a la página a la que se envcía los datos del formulario. En mi caso script php

// el atributo method especifíca el método usado para neviar los datos, puede tener 2 valores:

    // get: los datos del formulario se agregan al URI(uniform resource identifier) utilizando un ? y se separan con &
    // post: los datos se incluyen en el cuerpo del formulario y se envían utilizando el protocolo HTML.


//    creación de formulario.
// Crea un formulario HTML para introducir el nombre del alumno y el módulo o los módulos que cursa,
// a escoger “Desarrollo Web en Entorno Servidor”, “Desarrollo Web en Entorno Cliente” o ambas.
// Envía el resultado a la página “procesa.php”, que será la encargada de procesar los datos. No es necesario, en este ejercicio, que hagas la página de procesar datos.

// COMENTADO EN EL ONE NOTE!!!

/*
<fieldset style="width:40%; margin:auto">
    <legend style="font-weight: bold;">Datos</legend>
    <form name="form1" action="procesa.php" method="post">
        <p>Nombre:&nbsp;<input type="text" name="nombre" placeholder="Nombre" required></p>
        <fieldset style="width: 50%;">
            <legend style="font-weight: bold;">Elige Módulos</legend>
            <p><input type="checkbox" name="modulo[]" value="DWESE" />&nbsp;Desarrollo Web en Entorno Servidor.</p>
            <p><input type="checkbox" name="modulo[]" value="DWEC" />&nbsp;Desarrollo Web en Entorno Cliente.</p>
        </fieldset>
        <div style ="text-align:center; margin-top: 5px;">
            <input type="submit" value="Enviar" name="enviar" />&nbsp;&nbsp;
            <input type="reset" value="Limpiar" />
        </div>
    </form>
</fieldset>
*/ 

//Una vez que has creado el forumlario, ahora hay que porecesar los datos, los datos se pueden recoger usando la variable $_POST por haber usado post

//Para mostrar los datos por pantalla, dependerá si hemos elegido post o gent en <form>

//si en method pusimos get
echo "Tu nombre es: {$_GET['nombre']}";
    $totalModulos = 0;
    //comprobamos si nos ha llegado algún módulo
    if (isset($_GET['modulo'])) {
        $totalModulos = count($_GET['modulo']); //los contamos
        echo "<br>Los módulos elegidos han sido: ";
        echo "<ol>";
        foreach ($_GET['modulo'] as $k => $v) { //los recorremos y mostramos
            echo "<li>$v</li>";
        }
       echo "</ol>";
    }
    echo "<br>Has elegido un total de: $totalModulos módulos";


//si en method pusimos post 
echo "Tu nombre es: {$_POST['nombre']}";
     $totalModulos = 0;
     //comprobamos si nos ha llegado algún módulo
     if (isset($_POST['modulo'])) {
        $totalModulos = count($_POST['modulo']); //los contamos
         echo "<br>Los módulos elegidos han sido: ";
         echo "<ol>";
        foreach ($_POST['modulo'] as $k => $v) { //los recorremos y mostramos
            echo "<li>$v</li>";
        }
        echo "</ol>";
    }
    echo "<br>Has elegido un total de: $totalModulos módulos";




//diferencias.

// al principio, en echo "Tu nombre es : {$_GET[]}" en GET y $_POST en post

// La visibilidad, con get, los datos aparecen en la URL miestras que en post van en la petición(no visibles)

// El tamaño, GET limitado por la longitud de la URL y POST depende sel servidor

// Seguridad. GET es menos seguro

// USOS: GET -> búsquedas, filtros, paginación...   POST ->Envio de formularios, datos sensibnles...


//Siempre que es posible, hay que validar los datos que se intruducen  antes de enviarlos, se hace con JS




// VALIDACIÓN DE FORMULARIOS

// Practicas recomendadas evitar carga iútil
/*
required en campos que no vayamos a permitir vacíos, no comprueba que por ejemplo enviemos solo espacios en blanco.
Especificar longitud de cadenas con atributos como el maxlength, max, min...
Poner en el type de los input, el tipo de datos que esperamos: mail, text, number, date ...
Especificar en los <input type='file'> el atributo accept para que el navegador de archivos nos muestre solo el tipo permitido (ejemplo accept=".pdf")
*/


//Ejercicio
/*
  Haremos un formulario con los campos nombre, apellidos, mail, edad (numérico tipo entero y mayor que 0),
  y checkboxs de módulos de los que nos matricularemos (de los que al menos uno será necesario).
  Validaremos con ayuda de HTML y con PHP, que todos los campos contengan algún dato y que hayamos elegido algún módulo.
  Si todo está bien mostraremos los datos y si no mostraremos los errores.
*/




?>

<fieldset style="width:40%; margin:auto">
    <legend style="font-weight: bold;">Datos</legend>
    <form name="form1" action="procesa.php" method="post">
        <p>Nombre:&nbsp;<input type="text" name="nombre" placeholder="Nombre" required></p>
        <fieldset style="width: 50%;">
            <legend style="font-weight: bold;">Elige Módulos</legend>
            <p><input type="checkbox" name="modulo[]" value="DWESE" />&nbsp;Desarrollo Web en Entorno Servidor.</p>
            <p><input type="checkbox" name="modulo[]" value="DWEC" />&nbsp;Desarrollo Web en Entorno Cliente.</p>
        </fieldset>
        <div style ="text-align:center; margin-top: 5px;">
            <input type="submit" value="Enviar" name="enviar" />&nbsp;&nbsp;
            <input type="reset" value="Limpiar" />
        </div>
    </form>
</fieldset>


</body>
</html>