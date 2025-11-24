<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducción tema</title>
</head>
<body>
<?php

// Definir una clase  (molde)
class Persona{
    // Propiedades (características)
    public $nombre;
    public $edad;

    //Método Constructor
    public function __construct($nombre,$edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    // Métodos (acciones o comportamientos)
    public function saludar(){
        return "Hola, me llamo ". $this->nombre;
    }

    public function cumplirAnios(){
        $this->edad++;
        return "Ahora tengo ". $this->edad ." años.";
    }
}


//Crear objetos (instancias)
$persona1 = new Persona("Lucas",23);
$persona2 = new Persona("María",30);

//Usar los objetos
echo $persona1->saludar(); // Hola, me llamo Lucas
echo $persona1->cumplirAnios(); // Ahora tengo 24 años.








//Modificar acceso

class CuentaBancaria{

    // public: accesible desde cualquier lugar
    public $numeroCuenta;

    // private: solo accesible desde la misma clase
    private $saldo;

    // protected: accesible desde la misma clase y clases hijas
    protected $tipoCuenta;

    public function __construct($numeroCuenta, $saldoInicial)
    {
        $this->numeroCuenta = $numeroCuenta;
        $this->saldo = $saldoInicial;
    }

    // Métodos públicos para acceder a propiedades privadas
    public function getSaldo(){
        return $this->saldo;
    }

    public function depositar($cantidad){
        if($cantidad > 0){
            $this->saldo += $cantidad;
            return "Depósito existoso. Nuevo saldo: €". $this->saldo;
        }
        return "Cantidad inválida";
    }

    public function retirar($cantidad){
        if($cantidad > 0 && $cantidad <= $this->saldo){
            $this->saldo -= $cantidad;
            return "Retiro exitoso. Nuevo saldo: €". $this->saldo;
        }
        return "Fondos insuficientes o cantidad inválida";
    }

}

// Uso de la clase CuentaBancaria
$micuenta = new CuentaBancaria("ES123456789", 1000);
echo $micuenta->depositar(500); // Depósito exitoso. Nuevo saldo: €1500
echo $micuenta->getSaldo(); // 1500
echo $micuenta->retirar(2000); // Fondos insuficientes o cantidad inválida










// Herencia

class Animal{
    public $nombre;
    public $especie;

    public function __construct($nombre, $especie)
    {
        $this->nombre = $nombre;
        $this->especie = $especie;
    }

    public function comer(){
        return $this->nombre . " está comiendo.";
    }

    public function dormir(){
        return $this->nombre ." está durmiendo";
    }
    
}

class Perro extends Animal{
    public $raza;

    public function __construct($nombre, $raza){
        parent::__construct($nombre, "Perro");
        $this->raza = $raza;
    }


    // Método específico de la clase Perro
    public function ladrar(){
        return $this->nombre . " dice: ¡Guau Guau!";
    }


    //sobrescribir método de la clase padre 
    public function comer(){
        return $this->nombre . " está comiendo croquetas.";
    }

}

class Gato extends Animal{
    public function __construct($nombre){
        parent::__construct($nombre, "Gato");
    }

    public function maullar(){
        return $this->nombre . " dice: ¡Miau Miau!";
    }
}



//Usos
$miPerro = new Perro("Nago","Palleiro");
$miGato = new Gato("Lucky");

echo $miPerro->comer(); // Nago está comiendo croquetas.
echo $miPerro->ladrar(); // Nago dice: ¡Guau Guau!

echo $miGato->dormir(); // Lucky está durmiendo
echo $miGato->maullar(); // Lucky dice: ¡Miau Miau!















//Métodos estáticos
class Calculadora{
    // Método estático - no necesita crear objeto
    public static function sumar($a, $b){
        return $a + $b;
    }

    public static function restar($a, $b){
        return $a - $b;
    }

    public static function multiplicar($a, $b){
        return $a * $b;
    }
}

echo Calculadora::sumar(5, 3); // 8
echo Calculadora::restar(4,6); // -2
echo Calculadora::multiplicar(7,2); // 14










//Constantes en Clases
class Configuracion{
    const VERSION = "1.0";
    const MAX_USUARIOS = 100;

    public function getInfo(){
        return "Versión:". self::VERSION .", Máximo usuarios: " . self::MAX_USUARIOS; 
    }
}

echo Configuracion::VERSION; // 1.0

$config = new Configuracion();
echo $config->getInfo(); // Versión:1.0, Máximo usuarios: 100

/*
🎯 Resumen de Conceptos Clave:

    Clase: Molde para crear objetos

    Objeto: Instancia de una clase

    Propiedades: Variables dentro de una clase

    Métodos: Funciones dentro de una clase

    Constructor: Método especial que se ejecuta al crear un objeto

    $this: Referencia al objeto actual

    Herencia: Una clase puede heredar de otra

    public/private/protected: Controlan el acceso

    static: Pertenece a la clase, no a objetos específicos
*/ 











//Ejemplo Completo

class Producto{
    public $id;
    public $nombre;
    public $precio;
    public $stock;


    public function __construct($id, $nombre, $precio, $stock){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function mostrarInfo(){
        return "Producto: {$this->nombre} - Precio: {$this->precio}€ - Stock: {$this->stock}";
    }

    public function vender($cantidad){
        if($cantidad <= $this->stock){
            $this->stock -= $cantidad;
            return "Venta existosa. Stock restante: {$this->stock}";
        }
        return "Stock insuficiente";
    }

}



class Tienda{
    private $productos = [];

    public function agregarProducto(Producto $producto){
        $this->productos[] = $producto;
        return "Producto agregado: ". $producto->nombre;
    }

    public function listarProductos(){
        $lista = "Productos en la tienda:\n";
        foreach($this->productos as $producto){
            $lista .= $producto->mostrarInfo() . "\n";
        }
        return $lista;
    }


    public function buscarProducto($nombre){
        foreach($this->productos as $producto){
            if($producto->nombre === $nombre){
                return $producto;
            }
        }
        return null;
    }
}


// Uso del sistema
$tienda = new Tienda();

// Crear productos
$producto1 = new Producto(1, "Laptop", 1000, 5);
$producto2 = new Producto(2,"Mouse", 25, 20 );

// Agregar productos a la tienda
$tienda ->agregarProducto($producto1);
$tienda ->agregarProducto($producto2);

// Listar Productos
echo $tienda->listarProductos();

// Vender productos
$mouse = $tienda->buscarProducto("Mouse");
if($mouse){
    echo $mouse->vender(3); // Venta exitosa. Stock restante: 17
}



?>
    
</body>
</html>