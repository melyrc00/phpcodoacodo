<?php

$conexion = mysqli_connect("localhost", "id22387101_mrcpeliculas2024", "Naruto07@", "id22387101_peliculas2024");

if (mysqli_connect_errno()) {
    echo "ERROR no se conectó: " . mysqli_connect_error();
} else {
    echo "Se conectó de manera correcta";
}

echo "<br>";

// Consulta para mostrar los datos de usuarios
$consultas = mysqli_query($conexion, "SELECT * FROM usuarios");

// Verificar si la consulta fue exitosa
if ($consultas) {
    // Mostrar los resultados
    while ($lista = mysqli_fetch_assoc($consultas)) {
        print_r ($lista);
        echo "<br>";
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

echo "<br>";

// Mostrar información del objeto de resultado
var_dump($consultas);

// Cerrar conexión a la base de datos
mysqli_close($conexion);
?>
