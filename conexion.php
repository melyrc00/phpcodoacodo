<?php


echo "estoy probando la conexion";

echo "<br>";


$conexion = mysqli_connect("localhost","id22387101_mrcpeliculas2024","Naruto07@","id22387101_peliculas2024");

if(mysqli_connect_errno()){

    echo "ERROR no se conecto: ". mysqli_connect_errno();

}else{
    echo "Se conecto de manera correcta";
}

echo "<br>";


$consultas = mysqli_query($conexion,"select * from directores");

// Verificar si la consulta fue exitosa
if ($consultas) {
    // Mostrar los resultados
    while ($fila = mysqli_fetch_assoc($consultas)) {
        print_r($fila);
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

echo "<br>";

// Mostrar información del objeto de resultado
var_dump($consultas);



?>