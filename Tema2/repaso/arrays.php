<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>
<body>
    <div id="esPrimo">
        <?php
        function esPrimo($numero){
            if($numero < 2) return false; //números menores que 2 no son primos
            for($i = 2; $i <= sqrt($numero);$i++){ //solo necesitamos verificar hasta la raíz cuadrada
                if($numero % $i == 0){ //si es divisible por i
                    return false; //no es primo
                }
                return true; //es primo
            }
        }


        //Un factorial es el producto de todos los números enteros positivos desde 1 hasta n
        function factorial($n){
            if($n <= 1) return 1; //caso base
            return $n * factorial($n - 1); //llamada recursiva
        }


        //Palindromo es una palabra que se lee igual al derecho y al revés
        function esPalindromo($cadena){
            $cadena = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $cadena)); //normalizar la cadena
            $longitud = strlen($cadena);
        }
        ?>

    </div>
    <div id="masmostra">
        <?php
        // Cuando otra llamaos a otro php, hay que poner así
        //include 'nombreDoc.php'
        //y ya podemos llamr a las funciones
        function mostrarPrimos($inicio, $cantidad =10){
            $contador = 0;
            $numero = $inicio;

            echo "<h3>Primeros $cantidad números primos desde $inicio: </h3>";
            while($contador < $cantidad){
                if(esPrimo($numero)){
                    echo '<strong>'. ++$contador . ' =></strong>'. $numero . '<br>';
                }
                $numero++;
            }
        }

        mostrarPrimos(1, 15);

        echo "<h3>Factorial de 5:" . factorial(5) . "</h3>";

        $texto = "Anita lava la tina";

        echo "<h3>'$texto' es palíndromo: " . (esPalindromo($texto) ? "SI" : "NO") . "</h3>";
        ?>
    </div>

    <div id="arg">
        <?php

        function crearSaludo($nombre="Invitado", $formal = false){
            if($formal){
                return "Buenos días, estimado $nombre";
            } else {
                return "Hola $nombre";
            }
        }

        function sumar(...$numeros){
            return array_sum($numeros);
        }

        echo "<p>" . crearSaludo() . "</p>";
        echo "<p>" . crearSaludo("María") . "</p>";
        echo "<p>" . crearSaludo("Dr. García", true) . "</p>";

        echo "<p>Suma: " . sumar(1, 2, 3, 4, 5) . "</p>";
        echo "<p>Suma: " . sumar(10, 20, 30) . "</p>";

        ?>
    </div>

    <div id="recorreor">
        <?php

        $configuracion = [
            "nombre" => "Juan Pérez",
            "edad" => 25,
            "curso" => "DWES",
            "nota" => 8.5,
            "activo" => true,
            "modulos" => ["PHP", "MySQL", "JavaScript", "HTML"]
        ];

        echo "<h3>Recorrido con foreach: </h3>";

        foreach ($configuracion as $clave => $valor){
            if(is_array($valor)){
                echo "<p><strong>$clave:</strong> " . implode(", ", $valor) . "</p>";
                } else {
                echo "<p><strong>$clave:</strong> $valor</p>";
            }
        }
        
        echo "<h3>Recorrido con for (para arrays indexados):</h3>";
        $modulos = $configuracion['modulos'];
        for ($i = 0; $i < count($modulos); $i++) {
            echo ($i + 1) . ". " . $modulos[$i] . "<br>";
        }

        ?>
    </div>


    <div id="cosasArray">
        <?php

        //Genrera Array
        function generarArrayAleatorio($tamano, $min=1, $max=100){
            $array = [];
            for ($i=0; $i < $tamano ; $i++) { 
                $array[] = rand($min, $max);
            }
            return $array;
        }


        //Valor Máximo.
        function encontrarMaximo($maximo){
            if(empty($array)) return null;
            return max($array);
        }

        //valor mínimo.
        function encontrarMinimo($minimo){
            if(empty($array)) return null;
            return min($array);
        }


        //Promedio array numérico
        function calcularPromedio($array){
            if(empty($array)) return 0;
            return array_sum($array) / count($array);
        }


        //filtra pares de un array
        function filtrarPares($array){
            return array_filter($array, function($n){
                return $n % 2 ==0;
            });
        }

        //filtrar impares
        function filtrarImapres($array){
            return array_filter($array, function($n){
                return $n %2 !=0;
            });
        }


        //buisca valor y devuleve posicion
        function buscarvalor($array, $valor){
            $posicion = array_search($valor, $array);
            return $posicion !== false ? $posicion : "No encontrado";
        }

        //borrar duplicados
        ?>
    </div>

    <div id="cosastiles">
        <?php
        
        function verSiEsPrimo($num){
            if($num < 2) return false;
            for ($i =2 ; $i<sqrt($num) ; $i++) { 
                if ( $num % $i==0){
                    return false;
                }
                return true;
            }
        }

        function mostrarPrimoss($inicio, $cantidad = 10){
            $cont = 0;
            do{
                if(verSiEsPrimo($inicio)){
                    echo '<strong>' . ++$cont . '=></strong> '. $inicio. '<br>';
                }
                $inicio++;
            }while($cont < $cantidad);
        }
        ?>
    </div>

    <div id="ejfunciones">
        <h3>Calculadroa con funciones</h3>

        <form method="POST">
            <p><strong>Calcular operaciones</strong></p>
            <p>numero 1: <input type="number" name="num1" value="10"></p>
            <p>numero 2: <input type="number" name="num2" value="5"></p>
            <button type="submit" name="calcular">calcular</button>
        </form>


        <?php
        //funciones calcauladora
        function sumarNum($a, $b){
            return $a+$b;
        }

        function restarNum($a, $b){
            return $a-$b;
        }


        function multiNum($a, $b){
            return $a*$b;
        }

        function divNum($a, $b){
            if($b == 0) return "error, no se puede dicvidr por 0";
            return $a/$b;
        }

        if(isset($_POST['calcular'])){
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];


            echo "<h4> resultados</h4>";

            echo  "<p> $num1 + $num2 = ". sumarNum($num1,$num2) . "</p>";
            echo "<p> $num1 - $num2 = ". restarNum($num1,$num2) . "</p>";
            echo "<p> $num1 * $num2 = ". multiNum($num1, $num2). "</p>";
            echo "<p> $num1 / $num2 = ". divNum($num1, $num2). "</p>";
        }
        ?>

    </div>
    
</body>
</html>